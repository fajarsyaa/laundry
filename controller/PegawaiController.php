<?php

function TambahData($request)
{
    global $host;
    $email       = strtolower($request->email);
    $username    = strtolower($request->nama);
    $password    = mysqli_real_escape_string($host, $request->password);

    $cek         = query()->table('users')->where('email', $email)->single();

    if ($cek->email) {
        view('backend/pegawai/data');
        alert('Gagal !!', 'Email ini sudah pernah di gunakan', 'danger');
        die();
    } else {
        query()->insert('users', [
            $username,
            $email,
            password_hash($password, PASSWORD_DEFAULT),
            $request->status_pekerjaan
        ]);
    }

    $file = files('foto');
    $tmp = tmp('foto');
    move($tmp, asset('uploads/karyawan/' . $file));

    query()->insert('pegawai', [
        $request->nama,
        $request->umur,
        $request->no_hp,
        $request->status_pekerjaan,
        $request->asal,
        $file,
        $request->ttl,
        $request->wilker
    ])->view('backend/pegawai/data', 'Berhasil!');
}

function EditData($request)
{

    $data = query()->table('pegawai')->where('id', $request->id)->single();

    view('backend/pegawai/form-edit', compact('data'));
}

function UpdateData($request)
{

    if (empty(files('foto'))) {
        $gambar = query()->table('layanan')->where('id', $request->id)->single();
        $file = $gambar->gambar;
    } else {
        $file = files('foto');
        $tmp = tmp('foto');
        move($tmp, asset('uploads/karyawan/' . $file));
    }

    query()->update('pegawai', [

        'nama' => $request->nama,
        'umur' => $request->umur,
        'nohp' => $request->no_hp,
        'status_pekerjaan' => $request->status_pekerjaan,
        'asal' => $request->asal,
        'foto' => $file,
        'ttl' => $request->ttl,
        'wilker' => $request->wilker,

    ], $request->id)->view('backend/pegawai/data', 'Berhasil!');
}

function HapusData($request)
{

    $id = $request->id_delete;

    for ($i = 0; $i < count($request->id_delete); $i++) {

        query()->table('pegawai')->where('id', $id[$i])->delete();
    }

    alert('Berhasil !', 'Data berhasil dihapus');
    view('backend/pegawai/data');
}

   /*
    |--------------------------------------------------------------------------
    | PandoraCode Phoenix
    |--------------------------------------------------------------------------
    |
    | Nama File   : PegawaiController
    | Dibuat pada : 07 Feb 2022 10:12
    | 
    */