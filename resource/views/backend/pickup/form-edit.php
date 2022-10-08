<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Data Cucian Pelanggan
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("OrdersController@createOrder", $dataOrder->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">jumlah barang (kg)</label>
                    <input type="text" name="jumlah_barang" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" placeholder="isi dengan jenis/type/nama barang customer"></textarea>
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>