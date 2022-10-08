<?php

function TambahData($request)
{

    query()->insert('ongkir', [

        $request->nama,
        $request->harga

    ])->view('backend/ongkir/data', 'Berhasil!');
}

function EditData($request)
{

    $data = query()->table('ongkir')->where('id', $request->id)->single();

    view('backend/ongkir/form-edit', compact('data'));
}

function UpdateData($request)
{

    query()->update('ongkir', [

        'daerah' => $request->daerah,
        'harga' => $request->harga

    ], $request->id)->view('backend/ongkir/data', 'Berhasil!');
}

function HapusData($request)
{

    $id = $request->id_delete;

    for ($i = 0; $i < count($request->id_delete); $i++) {

        query()->table('ongkir')->where('id', $id[$i])->delete();
    }

    alert('Berhasil !', 'Data berhasil dihapus');
    view('backend/ongkir/data');
}

   /*
    |--------------------------------------------------------------------------
    | PandoraCode Phoenix
    |--------------------------------------------------------------------------
    |
    | Nama File   : OngkirController
    | Dibuat pada : 16 Jan 2022 11:43
    | 
    */