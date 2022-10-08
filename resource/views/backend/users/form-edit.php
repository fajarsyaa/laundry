<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("UsersController@UpdateData", $user->id) ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" class="form-control" value="<?= $user->username ?>">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control" value="<?= $user->password ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $user->alamat ?>">
                </div>
                <div class="form-group">
                    <label for="telepon">telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?= $user->telepon ?>">
                </div>
                <div class="form-group">
                    <label for="level">level</label>
                    <input type="text" name="level" class="form-control" value="<?= $user->level ?>">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>