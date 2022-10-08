<div class="card">
    <div class="card-header">
        <h3 class="card-title name-file">
            Judul
        </h3>
        <!-- <a href="<?php url("backend/ordermasuk/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a> -->
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("OrdersController@HapusData") ?>" method="POST">
                <table class="table table-striped data-table-noexcel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>tanggal order</th>
                            <th>kode</th>
                            <th>layanan</th>
                            <th>konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $data = query()->table("orders")
                            ->select('orders.*,layanan.*,process.*,orders.id as odr_id')
                            ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
                            ->leftJoin('process', 'orders.id = process.order_id')
                            ->where('status_laundry', 'Menuju Ke Gudang Pencucian')->get();
                        // query()->table("orders")->where('status_laundry', 'Menuju Ke Gudang Pencucian')->get();
                        foreach ($data as $item) { ?>

                            <tr>
                                <td> <?= $no++ ?> </td>
                                <td> <?= $item["nama_pemesan"] ?> </td>
                                <td> <?= $item["tgl_pesan"] ?> </td>
                                <td> <?= $item["code_order"] ?> </td>
                                <td> <?= $item["nama"] ?> </td>

                                <td>
                                    <a href="<?php controller('OrdersController@konfirmasi', $item['odr_id']) ?>" class="btn-sm btn-success">konfirmasi</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div><!-- /.card-body -->
</div>