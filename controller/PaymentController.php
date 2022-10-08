<?php

function TambahData($request)
{
    $amount = 10000;
    query()->insert('payment', [

        $request->user_id,
        $request->status,
        $request->tanggal,
        $request->amount

    ])->view('backend/payment/data', 'Pembayaran Berhasil Di Buat');
}

function EditData($request)
{

    $payment = query()->table('payment')->where('id', $request->id)->single();

    view('backend/payment/form-edit', compact('payment'));
}

function UpdateData($request)
{
    $amount = 10000;
    query()->update('payment', [

        'user_id' => $request->user_id,
        'status' => $request->status,
        'tanggal' => $request->tanggal,
        $request->amount

    ], $request->id)->view('backend/payment/data', 'Berhasil Update');
}

function HapusData($request)
{

    query()->table('payment')->where('id', $request->id)->delete();

    view('backend/payment/data');
}


function printPdf($request)
{
    check($request);
}

    /*[PandoraCode - Phoenix - Controller]*/
