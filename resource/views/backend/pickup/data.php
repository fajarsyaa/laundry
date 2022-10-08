<div class="card">
    <div class="card-header">
        <h3 class="card-title name-file">
            Pickup Cucian
        </h3>
        <a href="<?php url("backend/pickup/form") ?>" class="btn btn-sm btn-primary shadow float-right">
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
                            <th>nama</th>
                            <th>alamat</th>
                            <th>waktu pengambilan</th>
                            <th>kode</th>
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


                        foreach (query()->table("orders")->where('jam_pickup', $waktu)->andWhere('status_laundry', 'unconfirm')->get() as $item) {
                        ?>

                            <tr>
                                <td> <?= $no++ ?> </td>
                                <td> <?= $item["nama_pemesan"] ?> </td>
                                <td> <?= $item["alamat"] ?> </td>
                                <td> <?= $item["jam_pickup"] ?> </td>
                                <td> <?= $item["code_order"] ?> </td>

                                <td>
                                    <a href="<?php controller('OrdersController@pickup', $item['id']) ?>" class="btn-sm btn-success">ambil cucian</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div><!-- /.card-body -->
</div>