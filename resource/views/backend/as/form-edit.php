<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("new@UpdateData", $data->id) ?>" method="POST" enctype="multipart/form-data">
        
                <div class="form-group">
                    <label for="">Label</label>
                    <input type="text" name="???" class="form-control" value="<?= $data->name ?>">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>