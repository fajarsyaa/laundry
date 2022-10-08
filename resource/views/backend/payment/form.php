<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Form Payment
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("PaymentController@TambahData") ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="user_id">user_id</label>
                    <input type="text" name="user_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" name="status" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tanggal">tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>