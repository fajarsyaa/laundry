<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
        <a href="<?php url("backend/a/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("new@HapusData") ?>" method="POST">
                <table class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                             <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach( query()->table("aing")->get() AS $item ){ ?>

                            <tr>
                                <td> <?= $no++ ?> </td>
    
                                <td>

                                    <!-- Tombol Hapus -->
                                    <input type="checkbox" value="<?php echo $item["id"] ?>" name="id_delete[]" style="width: 20px;height: 20px;">

                                    <!-- Tombol Edit -->
                                    <a href="<?php controller("new@EditData", $item["id"]) ?>" class="btn btn-primary btn-sm shadow">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="1"></th>
                            <th>
                                <button type="submit" class="btn btn-danger btn-sm shadow">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div><!-- /.card-body -->
</div>