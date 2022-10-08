<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tambah Data Layanan
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("LayananController@TambahData") ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="gambar">gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <textarea type="text" name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="harga">harga</label>
                    <input type="text" name="harga" class="form-control">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>