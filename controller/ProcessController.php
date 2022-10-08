<?php

function TambahData($request)
{

    query()->insert('process', [

        $request->order_id,
        $request->mesin_id,
        $request->mulai,
        $request->selesai

    ])->view('backend/process/data', 'Berhasil!');
}

function EditData($request)
{

    $data = query()->table('process')->where('id', $request->id)->single();

    view('backend/process/form-edit', compact('data'));
}

function UpdateData($request)
{

    query()->update('process', [

        'order_id' => $request->order_id,
        'mesin_id' => $request->mesin_id,
        'mulai'    => $request->mulai,
        'selesai'  => $request->selesai

    ], $request->id)->view('backend/process/data', 'Berhasil!');
}

function HapusData($request)
{

    $id = $request->id_delete;

    for ($i = 0; $i < count($request->id_delete); $i++) {

        query()->table('process')->where('id', $id[$i])->delete();
    }

    alert('Berhasil !', 'Data berhasil dihapus');
    view('backend/process/data');
}


   /*
    |--------------------------------------------------------------------------
    | PandoraCode Phoenix
    |--------------------------------------------------------------------------
    |
    | Nama File   : ProcessController
    | Dibuat pada : 04 Jan 2022 20:27
    | 
    */
