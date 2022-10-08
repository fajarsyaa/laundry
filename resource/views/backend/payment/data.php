<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Data Pembayaran
        </h3>
        <a href="<?php url("backend/payment/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->

    <div class="container mt-4">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                <input type="date" name="tanggalMulai" class="">
                <button type="submit" name="tanggal" class="btn btn-primary">Submit</button>
            </div>

            <input type="submit" name="harian" class="btn btn-primary" value="Laporan Harian">
            <input type="submit" name="mingguan" class="btn btn-primary" value="Laporan Mingguan">
            <input type="submit" name="bulanan" class="btn btn-primary" value="Laporan Bulanan">
        </form>
    </div>

    <?php

    if (isset($_POST['tanggal'])) {
        $order = query()->table('orders')
            ->select('orders.*,users.*,layanan.*,payment.*,orders.id as odr_id')
            ->leftJoin('users', 'orders.user_id = users.id')
            ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
            ->leftJoin('payment', 'orders.payment_id = payment.id')
            ->where('status_laundry', 'done')
            ->andWhere('tanggal', $_POST['tanggalMulai'])
            ->get();
    } elseif (isset($_POST['harian'])) {
        $order = query()->table('orders')
            ->select('orders.*,users.*,layanan.*,payment.*,orders.id as odr_id,payment.tanggal as tgl_pay')
            ->leftJoin('users', 'orders.user_id = users.id')
            ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
            ->leftJoin('payment', 'orders.payment_id = payment.id')
            ->where('status_laundry', 'done')
            ->andWhere('tanggal', date('d-m-Y'))
            ->get();
    } elseif (isset($_POST['mingguan'])) {
        $order = query()->raw("SELECT payment.*, users.* FROM payment LEFT JOIN users ON users.id = payment.user_id WHERE YEARWEEK(tanggal)=YEARWEEK(NOW()) AND status='lunas'");
    } elseif (isset($_POST['bulanan'])) {
        $order = query()->raw("SELECT payment.*, users.* FROM payment LEFT JOIN users ON users.id = payment.user_id WHERE MONTH(tanggal) = MONTH(CURRENT_DATE()) AND status='lunas'");
    }



    // check($order);
    ?>


    <div class="card-body">
        <div class="tab-content p-0">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>user</th>
                        <th>status</th>
                        <th>tanggal</th>
                        <th>jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order as $item) { ?>

                        <tr>
                            <td> <?= $no++ ?> </td>
                            <td> <?= $item["username"] ?> </td>
                            <td> <?= $item["status"] ?> </td>
                            <td> <?= $item["tanggal"] ?> </td>
                            <td>Rp. <?= number_format($item["amount"]) ?> </td>
                            <td></td>
                        </tr>

                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3"></th>
                        <th>Total :</th>
                        <?php
                        $total = '';
                        foreach ($order as $key => $value) {
                            $total += $value['amount'];
                        } ?>
                        <th>
                            <?= 'Rp.' . number_format($total) ?>
                        </th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>