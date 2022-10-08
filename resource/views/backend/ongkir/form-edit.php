<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("OngkirController@UpdateData", $data->id) ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">daerah</label>
                    <input type="text" name="daerah" class="form-control" value="<?= $data->daerah ?>">
                </div>

                <div class="form-group">
                    <label for="">harga</label>
                    <input type="text" name="harga" class="form-control" value="<?= $data->harga ?>">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>