<h3 class="card-title name-file">
    Kemas dan Deliver
</h3>
<a href="<?php url("backend/process/form") ?>" class="btn btn-sm btn-primary shadow float-right">
    <i class="fa fa-plus"></i>
</a>
</div><!-- /.card-header -->
<div class="card-body">
    <div class="tab-content p-0">
        <form action="<?php controller("ProcessController@HapusData") ?>" method="POST">
            <table class="table table-striped data-table-noexcel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>kode</th>
                        <th>Layanan</th>
                        <th>Batas Waktu Pengembalian</th>
                        <th>Proses</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $data = query()->table("orders")
                        ->select('orders.*,layanan.*,process.*,orders.id as odr_id')
                        ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
                        ->leftJoin('process', 'orders.id = process.order_id')
                        ->where('status_laundry', 'Proses Pencucian')
                        ->get();

                    foreach ($data as $item) { ?>

                        <tr>
                            <td> <?= $no++ ?> </td>
                            <td> <?= $item['nama_pemesan'] ?> </td>
                            <td> <?= $item['code_order'] ?></td>
                            <td> <?= $item['nama'] ?> </td>
                            <td> <?= $item['selesai'] ?> </td>
                            <td>
                                <a href="<?php controller('OrdersController@EditData', $item['odr_id']) ?>" class="btn btn-success">Deliver</a>
                            </td>
                        </tr>


                    <?php } ?>

                </tbody>
            </table>
        </form>
    </div>
</div><!-- /.card-body -->
</div>