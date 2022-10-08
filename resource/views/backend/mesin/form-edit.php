<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tambah Mesin Cuci
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("MesinController@UpdateData", $data->id) ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="type_mesin">type_mesin</label>
                    <input type="text" name="type_mesin" class="form-control" value="<?= $data->type_mesin ?>">
                </div>
                <div class="form-group">
                    <label for="kapasitas">kapasitas</label>
                    <input type="text" name="kapasitas" class="form-control" value="<?= $data->kapasitas ?>">
                </div>
                <div class="form-group">
                    <label for="jam_kerja_perhari">Max penggunaan per hari</label>
                    <input type="text" name="jam_kerja_perhari" class="form-control" value="<?= $data->jam_kerja_perhari ?>">
                </div>
                <div class="form-group">
                    <label for="kondisi_mesin">kondisi_mesin</label>
                    <input type="text" name="kondisi_mesin" class="form-control" value="<?= $data->kondisi_mesin ?>">
                </div>


                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>