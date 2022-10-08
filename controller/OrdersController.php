<?php

function TambahData($request)
{
    // check($request);
    query()->insert('orders', [

        $request->user_id,
        $request->layanan_id,
        $request->pembayaran_id,
        $request->tgl_pesan,
        $request->total_harga,
        $request->status_laundry,
        $request->alamat,
        $request->pickup_by,
        $request->jam_pickup,
        $request->deliver_by,
        'pagi',
        'controllernya belum gua set'

    ])->view('backend/order/data', 'order berhasil di buat');
}

function EditData($request)
{
    $dataOrder = query()->table("orders")
        ->select('orders.*,layanan.*,process.*,orders.id as odr_id')
        ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
        ->leftJoin('process', 'orders.id = process.order_id')
        ->where('orders.id', $request->id)->single();

    view('backend/order/form-edit', compact('dataOrder'));
}

function UpdateData($request)
{

    query()->update('orders', [

        'user_id' => $request->user_id,
        'layanan_id' => $request->layanan_id,
        'pembayaran_id' => $request->pembayaran_id,
        'tgl_pesan' => $request->tgl_pesan,
        'total_harga' => $request->total_harga,
        'status_laundry' => $request->status_laundry,
        'alamat' => $request->alamat,
        'pickup_by' => $request->pickup_by,
        'jam_pickup' => $request->jam_pickup,
        'deliver_by' => $request->deliver_by,
        'jam_deliver' => $request->jam_pickup,
        'nama_pengguna' => 'controllernya belum gua set'

    ], $request->id)->view('backend/order/data', 'order update berhasil');
}

function HapusData($request)
{

    query()->table('orders')->where('id', $request->id)->delete();

    view('backend/order/data');
}

// ================================================================================

function toPage($layanan)
{
    $data = query()->table('layanan')->where('id', $layanan->id)->single();
    $ongkir = query()->table('ongkir')->get();

    // check($ongkir);

    loadView('frontend/detailLayanan', compact('data', 'ongkir'));
}


function orderStart($request)
{
    $today = date('Y-m-d');
    $ongkir = explode(',', $request->ongkir);
    $harga = $ongkir[0];
    $alamat = $ongkir[1] . ',' . $request->alamat;
    $driver = '';
    $code = '';
    for ($i = 0; $i < 6; $i++) {
        $char = "1234567890ABCDFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0987654321";
        $rand = $char[rand(0, strlen($char) - 1)];
        $code .= strtoupper($rand);
    }

    query()->insert('payment', [
        'user_id' => $request->user_id,
        'status' => 'belum dibayar',
        'tanggal' => $today,
        'amount'  => 0
    ]);

    $payment = getId();

    query()->insert('orders', [
        $request->user_id,
        $request->layanan_id,
        $payment,
        $today,
        $harga,
        'unconfirm',
        $alamat,
        $driver,
        $request->jam_pickup,
        $driver,
        $request->jam_deliver,
        $request->nama_pemesan,
        'null',
        'null',
        $code,
        1
    ]);

    alert('order berhasil');
    view('cucianku');
}

function konfirmasi($request)
{
    query()->update('orders', [
        'status_laundry' => 'terkonfirmasi'
    ], $request->id)->view('backend/ordermasuk/data', 'order konfirmasi berhasil');
}

function pickup($request)
{
    query()->update('orders', [
        'pickup_by' => auth()->username(),
        'deliver_by' => auth()->username(),
        'status_laundry' => 'kurir akan mengambil cucian anda'
    ], $request->id);

    $dataOrder = query()->table('orders')->where('id', $request->id)->single();

    view('backend/pickup/form-edit', compact('dataOrder'));
}

function createOrder($request)
{

    $data = query()->table('orders')
        ->select('orders.*,layanan.*,orders.id as id_odr')
        ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
        ->where('orders.id', $request->id)
        ->single();


    $hargaSemenetara = $data->total_harga;
    $hargaLayanan = $data->harga;
    $harga = $hargaSemenetara + $hargaLayanan * $request->jumlah_barang;


    $today = date('Y-m-d');
    $jumlah_barang_penaggan = query()->table('orders')->where('tgl_pesan', $today)->get();
    $jumlahOrderToday = 0;
    foreach ($jumlah_barang_penaggan as $key => $value) {
        $jumlahOrderToday += $value['jumlah_barang'];
    }

    $mesin = query()->table('mesin')->get();
    $jumlahMaxOrder = 0;
    foreach ($mesin as $key => $value) {
        $jumlahMaxOrder += $value['kapasitas'] * $value['max_work'];
    }

    $hitung = $jumlahMaxOrder - $jumlahOrderToday;
    if ($hitung <= 0) {
        $start = date("Y-m-d", strtotime("+1 day"));
        $end = date("Y-m-d", strtotime("+4 day"));
    } else {
        $start = date('Y-m-d');
        $end = date("Y-m-d", strtotime("+2 day"));
    }

    query()->insert('process', [
        'order_id' => $request->id,
        'mulai'    => $start,
        'selesai'  => $end
    ]);

    query()->update('orders', [
        'total_harga' => $harga,
        'status_laundry' => 'Menuju Ke Gudang Pencucian',
        'deskripsi' => $request->deskripsi,
        'jumlah_barang' => $request->jumlah_barang,

    ], $request->id)->view('backend/pickup/data', 'order update berhasil');
}

function prosesCuci($request)
{
    query()->update('orders', [

        'status_laundry' => 'Proses Pencucian'

    ], $request->id)->view('backend/process/proses', 'Barang Di Cuci');
}

function prosesKemas($request)
{
    query()->update('orders', [

        'status_laundry' => 'Barang anda akan segera di kirim'

    ], $request->id)->view('backend/process/selesai', 'Barang Sesuai');
}

function deliver($request)
{

    query()->update('orders', [
        'status_laundry' => 'kurir akan mengantar barang anda'
    ], $request->id);

    $dataOrder = query()->table("orders")
        ->select('orders.*,layanan.*,process.*,payment.*,orders.id as odr_id,payment.id as pay_id')
        ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
        ->leftJoin('process', 'orders.id = process.order_id')
        ->leftJoin('payment', 'orders.payment_id = payment.id')
        ->where('orders.id', $request->id)->single();

    view('backend/deliver/form-edit', compact('dataOrder'));
}

function done($request)
{
    $bayar = $request->total_bayar;
    $bayar = str_replace("Rp.", "", $bayar);
    $bayar = str_replace(",", "", $bayar);
    $uang  = $request->pembayaran;
    $check = $bayar - $uang;

    if ($check == 0) {
        $data  = query()->table('orders')
            ->select('orders.*,layanan.*,orders.id as odr_id')
            ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
            ->where('orders.id', $request->id)->single();

        query()->update('payment', [
            'status' => 'lunas',
            'amount' => $bayar
        ], $request->payment_id);

        query()->update('orders', [
            'status_laundry' => 'done'
        ], $request->id);

        view('backend/deliver/cetak', compact('data'));
    } else {
        query()->update('orders', [
            'status_laundry' => 'Barang anda akan segera di kirim'
        ], $request->id);
        view('backend/deliver/data', 'Pembayaran Gagal');
    }
}

function batalOrder($request)
{
    query()->table('orders')->where('id', $request->id)->delete();
    view('cucianku');
}
function kon($request)
{
    query()->update('orders', [
        'konfirmasi' => 2
    ], $request->id);
    view('cucianku');
}
