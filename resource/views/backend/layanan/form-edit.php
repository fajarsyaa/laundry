<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("LayananController@UpdateData", $layanan->id) ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $layanan->nama ?>">
                    <input type="hidden" name="id" class="form-control" value="<?= $layanan->id ?>">
                </div>
                <div class="form-group">
                    <label for="gambar_update">gambar update</label>
                    <input type="file" name="gambar_update" class="form-control" value="<?= $layanan->gambar ?>">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <textarea type="text" name="description" class="form-control"><?= $layanan->description ?></textarea>
                </div>
                <div class="form-group">
                    <label for="harga">harga</label>
                    <input type="text" name="harga" class="form-control" value="<?= $layanan->harga ?>">
                </div>
                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>