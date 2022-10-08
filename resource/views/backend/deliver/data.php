<div class="card">
    <div class="card-header">
        <h3 class="card-title name-file">
            Judul
        </h3>
        <a href="<?php url("backend/deliver/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("OrdersController@HapusData") ?>" method="POST">
                <table class="table table-striped data-table-noexcel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama pemesan</th>
                            <th>Layanan</th>
                            <th>Payment</th>
                            <th>Total harga</th>
                            <th>Status laundry</th>
                            <th>Alamat</th>
                            <th>Jam deliver</th>
                            <th>Kode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $waktu = '';
                        date_default_timezone_set('Asia/Jakarta');
                        $jam =  date('H');
                        if ($jam > 06 && $jam <= 10) {
                            $waktu = "pagi";
                        } elseif ($jam > 10 && $jam <= 14) {
                            $waktu = "siang";
                        } elseif ($jam >= 14 && $jam <= 17) {
                            $waktu = "sore";
                        }

                        $data = query()->table("orders")
                            ->select('orders.*,layanan.*,process.*,payment.*,orders.id as odr_id,payment.status as status_pembayaran')
                            ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
                            ->leftJoin('process', 'orders.id = process.order_id')
                            ->leftJoin('payment', 'orders.payment_id = payment.id')
                            ->where('status_laundry', 'Barang anda akan segera di kirim')
                            ->andWhere('jam_deliver', $waktu)
                            ->get();

                        foreach ($data as $item) { ?>

                            <tr>
                                <td> <?= $no++ ?> </td>
                                <td> <?= $item["nama_pemesan"] ?> </td>
                                <td> <?= $item["nama"] ?> </td>
                                <td> <?= $item["status_pembayaran"] ?> </td>
                                <td> <?= $item["total_harga"] ?> </td>
                                <td> <?= $item["status_laundry"] ?> </td>
                                <td> <?= $item["alamat"] ?> </td>
                                <td> <?= $item["jam_deliver"] ?> </td>
                                <td> <?= $item["code_order"] ?> </td>
                                <td>
                                    <a href="<?php controller('OrdersController@deliver', $item['odr_id']) ?>" class="btn btn-success">Antar</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div><!-- /.card-body -->
</div>