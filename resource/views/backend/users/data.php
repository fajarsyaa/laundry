<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Data Users
        </h3>
        <a href="<?php url("backend/users/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <table class="table table-striped data-table-noexcel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach (query()->table("users")->get() as $item) { ?>

                        <tr>
                            <td> <?= $no++ ?> </td>
                            <td> <?= $item["username"] ?> </td>
                            <td> <?= $item["email"] ?> </td>
                            <td> <?= $item["alamat"] ?> </td>
                            <td> <?= $item["telepon"] ?> </td>
                            <td> <?= $item["level"] ?> </td>
                            <td>
                                <!-- Tombol Hapus -->
                                <a href="<?php controller("UsersController@HapusData", $item["id"]) ?>" class="btn btn-danger btn-sm shadow">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <!-- Tombol Edit -->
                                <a href="<?php controller("UsersController@EditData", $item["id"]) ?>" class="btn btn-primary btn-sm shadow">
                                    <i class="fa fa-edit"></i>
                                </a>

                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>