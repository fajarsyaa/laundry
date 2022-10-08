<?php

function TambahData($request)
{

    query()->insert('mesin', [

        $request->type_mesin,
        $request->kapasitas,
        $request->jam_kerja_perhari,
        $request->kondisi_mesin


    ])->view('backend/mesin/data', 'Berhasil!');
}

function EditData($request)
{

    $data = query()->table('mesin')->where('id', $request->id)->single();

    view('backend/mesin/form-edit', compact('data'));
}

function UpdateData($request)
{

    query()->update('mesin', [

        'type_mesin'    => $request->type_mesin,
        'kapasitas'     => $request->kapasitas,
        'max_work'      => $request->jam_kerja_perhari,
        'kondisi_mesin' => $request->kondisi_mesin

    ], $request->id)->view('backend/mesin/data', 'Berhasil!');
}

function HapusData($request)
{

    $id = $request->id_delete;

    for ($i = 0; $i < count($request->id_delete); $i++) {

        query()->table('mesin')->where('id', $id[$i])->delete();
    }

    alert('Berhasil !', 'Data berhasil dihapus');
    view('backend/mesin/data');
}

   /*
    |--------------------------------------------------------------------------
    | PandoraCode Phoenix
    |--------------------------------------------------------------------------
    |
    | Nama File   : MesinController
    | Dibuat pada : 04 Jan 2022 20:08
    | 
    */
