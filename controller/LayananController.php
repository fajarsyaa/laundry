<?php

function TambahData($request)
{
    $file = files('gambar');
    $tmp = tmp('gambar');

    move($tmp, asset('uploads/layanan/' . $file));

    query()->insert('layanan', [

        $request->nama,
        $file,
        $request->description,
        $request->harga

    ])->view('backend/layanan/data', 'Layanan Baru Telah Di tambahakan');
}

function EditData($request)
{

    $layanan = query()->table('layanan')->where('id', $request->id)->single();

    view('backend/layanan/form-edit', compact('layanan'));
}

function UpdateData($request)
{
    if (empty(files('gambar_update'))) {
        $old = query()->table('layanan')->where('id', $request->id)->single();
        $file = $old->gambar;
    } else {
        $file = files('gambar_update');
        $tmp = tmp('gambar_update');
        move($tmp, asset('uploads/layanan/' . $file));
    }


    query()->update('layanan', [
        'nama' => $request->nama,
        'gambar' => $file,
        'description' => $request->description,
        'harga' => $request->harga

    ], $request->id)->view('backend/layanan/data', 'Layanan Telah Di Update');
}

function HapusData($request)
{

    query()->table('layanan')->where('id', $request->id)->delete();

    view('backend/layanan/data');
}

    /*[PandoraCode - Phoenix - Controller]*/
