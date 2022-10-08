<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Data Order
        </h3>
        <a href="<?php url("backend/order/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">

        <div class="tab-content p-0">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>user</th>
                        <th>layanan</th>
                        <th>status pembayaran</th>
                        <th>tgl pesan</th>
                        <th>total harga</th>
                        <th>status laundry</th>
                        <th>alamat</th>
                        <!--    <th>pickup_by</th>
                        <th>jam_pickup</th>
                        <th>deliver_by</th> -->
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- $order => app/global/gbobalVariabel.php -->
                    <?php
                    $order = query()->table('orders')
                        ->select('orders.*,users.*,layanan.*,payment.*,orders.id as odr_id')
                        ->leftJoin('users', 'orders.user_id = users.id')
                        ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
                        ->leftJoin('payment', 'orders.payment_id = payment.id')
                        ->where('status_laundry', 'done')
                        ->get();
                    ?>
                    <?php foreach ($order as $item) { ?>
                        <tr>
                            <td> <?= $no++ ?> </td>
                            <td><?= $item["username"] ?></td>
                            <td><?= $item["nama"] ?></td>
                            <td><?= $item["status"] ?></td>
                            <td><?= $item["tgl_pesan"] ?></td>
                            <td><?= $item["total_harga"] ?></td>
                            <td><?= $item["status_laundry"] ?></td>
                            <td><?= $item["alamat"] ?></td>
                            <!-- <td><?= $item["pickup_by"] ?></td>
                            <td><?= $item["jam_pickup"] ?></td>
                            <td><?= $item["deliver_by"] ?></td> -->
                            <td>
                                <!-- Tombol Hapus -->
                                <a href="<?php controller("OrdersController@HapusData", $item["odr_id"]) ?>" class="btn btn-danger btn-sm shadow">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <!-- Tombol Edit -->
                                <a href="<?php controller("OrdersController@EditData", $item["odr_id"]) ?>" class="btn btn-primary btn-sm shadow">
                                    <i class="fa fa-edit"></i>
                                </a>

                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>