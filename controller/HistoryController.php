<?php

function TambahData($request)
{

    query()->insert('history', [

        $request->user_id,
        $request->order_id

    ])->view('backend/history/data', 'Berhasil!');
}

function EditData($request)
{

    $data = query()->table('history')->where('id', $request->id)->single();

    view('backend/history/form-edit', compact('data'));
}

function UpdateData($request)
{

    query()->update('history', [

        'user_id'  => $request->user_id,
        'order_id' => $request->order_id

    ], $request->id)->view('backend/history/data', 'Berhasil!');
}

function HapusData($request)
{

    $id = $request->id_delete;

    for ($i = 0; $i < count($request->id_delete); $i++) {

        query()->table('history')->where('id', $id[$i])->delete();
    }

    alert('Berhasil !', 'Data berhasil dihapus');
    view('backend/history/data');
}

   /*
    |--------------------------------------------------------------------------
    | PandoraCode Phoenix
    |--------------------------------------------------------------------------
    |
    | Nama File   : HistoryController
    | Dibuat pada : 05 Jan 2022 14:16
    | 
    */
