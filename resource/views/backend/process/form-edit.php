<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("ProcessController@UpdateData", $data->id) ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="order_id">order_id</label>
                    <input type="text" name="order_id" class="form-control" value="<?= $data->order_id ?>">
                </div>
                <div class="form-group">
                    <label for="mesin_id">mesin_id</label>
                    <input type="text" name="mesin_id" class="form-control" value="<?= $data->mesin_id ?>">
                </div>
                <div class="form-group">
                    <label for="mulai">mulai</label>
                    <input type="date" name="mulai" class="form-control" value="<?= $data->mulai ?>">
                </div>
                <div class="form-group">
                    <label for="selesai">selesai</label>
                    <input type="date" name="selesai" class="form-control" value="<?= $data->selesai ?>">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>