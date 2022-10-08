<?php

function TambahData($request)
{

    $password = password_hash($request->password, PASSWORD_DEFAULT);
    query()->insert('users', [

        $request->username,
        $request->email,
        $password,
        $request->level

    ])->view('backend/users/data', 'User Baru Hadir');
}

function EditData($request)
{

    $user = query()->table('users')->where('id', $request->id)->single();

    view('backend/users/form-edit', compact('user'));
}

function UpdateData($request)
{

    query()->update('users', [

        'username' => $request->username,
        'email' => $request->email,
        'password' => $request->password,
        'level' => $request->level,

        /*
            *column adalah nama kolom table anda
            *kemudian name_input adalah atribut name dari elemen input/select dll...
            */

    ], $request->id)->view('backend/users/data', 'pesan jika berhasil');
}

function HapusData($request)
{

    query()->table('users')->where('id', $request->id)->delete();

    view('backend/users/data');
}

    /*[PandoraCode - Phoenix - Controller]*/
