<main>
    <div class="container">

        <div class="row mt-5">
            <div class="col-md">
                <div class="list-group mt-3">
                    <p class="list-group-item list-group-item-action active" aria-current="true">
                        detail cucian
                    </p>
                    <?php
                    $data = query()->table('orders')
                        ->select('orders.*,process.*,layanan.*,orders.id as odr_id')
                        ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
                        ->leftJoin('process', 'orders.id = process.order_id')
                        ->where('user_id', auth()->id())->andWhere('status_laundry', '!=', 'done')
                        ->get();
                    foreach ($data as $key => $value) {
                    ?>
                        <div class="card card-body mt-2">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">cucian : <?= $value['code_order'] ?> | <?= $value['tgl_pesan'] ?></li>
                                <li class="list-group-item">
                                    Waktu pengerjaan : <span style="color:royalblue;"><?php if ($value['mulai'] == null) {
                                                                                            echo "akan muncul saat order anda di konfirmasi";
                                                                                        } else {
                                                                                            echo $value['mulai'] . '</span> sampai <span style="color:royalblue;">' . $value['selesai'] . '</span>';
                                                                                        } ?>
                                </li>
                                <li class="list-group-item">pengambilan cucian oleh kurir : <strong> <?= $value['jam_pickup'] ?></strong> </li>
                                <li class="list-group-item">pengembalian cucian oleh kurir : <strong> <?= $value['jam_deliver'] ?></strong> </li>
                                <li class="list-group-item">Ongkir: <strong> <?= $value[''] ?></strong> </li>
                                <li class="list-group-item">
                                    Total yang harus di bayar :<?php if ($value['total_harga'] < $value['harga'] || $value['total_harga'] == $value['harga']) {
                                                                    echo '<span style="color:royalblue;"> akan muncul saat kurir telah menimbang cucian anda</span>';
                                                                } else {
                                                                    echo $value['total_harga'] . $value['harga'];
                                                                }  ?>
                                </li>
                                <li class="list-group-item">
                                    status : <strong>
                                        <?php
                                        if ($value['konfirmasi'] == 1) {
                                            echo "unconfirm";
                                        } elseif ($value['konfirmasi'] == 2) {
                                            if ($value['status_laundry'] == "unconfirm") {
                                                echo "confirm";
                                            } else {
                                                echo $value['status_laundry'];
                                            }
                                        }
                                        ?>
                                    </strong>
                                </li>

                                <li class="list-group-item">layanan : <?= $value['nama'] ?> | Rp.<?= number_format($value['harga']) ?>/kg </li>
                                <li class="list-group-item">detail : <br>
                                    <?= $value['deskripsi'] ?>
                                </li>
                                <?php if ($value['konfirmasi'] == 1) { ?>
                                    <li class="list-group-item">
                                        <a href="<?php controller('OrdersController@batalOrder', $value['odr_id']) ?>" class="btn-lg btn-danger">batalkan order</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?php controller('OrdersController@kon', $value['odr_id']) ?>" class="btn-lg btn-success">konfirmasi order</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-md">
                <div class="list-group mt-3">
                    <p class="list-group-item list-group-item-action active" aria-current="true">
                        histori data cucian
                    </p>
                    <?php
                    $data = query()->table('orders')
                        ->select('orders.*,process.*,layanan.*,orders.id as odr_id')
                        ->leftJoin('layanan', 'orders.layanan_id = layanan.id')
                        ->leftJoin('process', 'orders.id = process.order_id')
                        ->where('user_id', auth()->id())->andWhere('status_laundry', 'done')
                        ->get();
                    foreach ($data as $key => $value) {
                    ?>

                        <button type="button" class="btn-lg bg-secondary mt-2" data-toggle="modal" data-target="#exampleModal<?= $value['odr_id'] ?>">
                            history <?= $value['tgl_pesan'] ?>
                        </button>

                        <div class="modal fade" id="exampleModal<?= $value['odr_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Histori Cucian <?= $value['tgl_pesan'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">cucian : <?= $value['code_order'] ?> | <?= $value['tgl_pesan'] ?></li>
                                            <li class="list-group-item">Waktu pengerjaan : <span style="color:royalblue;"><?= $value['mulai'] . "sampai" . $value['selesai'] ?></span>
                                            <li class="list-group-item">pengambilan cucian oleh kurir : <strong> <?= $value['jam_pickup'] ?></strong> </li>
                                            <li class="list-group-item">pengembalian cucian oleh kurir : <strong> <?= $value['jam_deliver'] ?></strong> </li>
                                            <li class="list-group-item">Total yang harus di bayar : <?= $value['total_harga'] ?></li>
                                            <li class="list-group-item">status : <strong> <?= $value['status_laundry'] ?></strong> </li>
                                            <li class="list-group-item">layanan : <?= $value['nama'] ?> | Rp.<?= number_format($value['harga']) ?>/kg </li>
                                            <li class="list-group-item">detail : <br>
                                                <?= $value['deskripsi'] ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-md btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php } ?>

                </div>
            </div>


        </div>


    </div>
</main>