<div class="card">
    <div class="card-header">
        <h3 class="card-title name-file">
            Data Mesin Cuci
        </h3>
        <a href="<?php url("backend/mesin/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("MesinController@HapusData") ?>" method="POST">
                <table class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Type mesin</th>
                            <th>Kapasitas</th>
                            <th>Jam kerja perhari</th>
                            <th>Kondisi mesin</th>
                            <th><input type="checkbox" class="ml-2" id="check-all" style="width: 18px;height: 18px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach (query()->table("mesin")->get() as $item) { ?>

                            <tr>
                                <td> <?= $no++ ?> </td>
                                <td> <?= $item["type_mesin"] ?> </td>
                                <td> <?= $item["kapasitas"] ?> kg </td>
                                <td> <?= $item["max_work"] ?> kali/hari </td>
                                <td> <?= $item["kondisi_mesin"] ?> </td>

                                <td>
                                    <div class="d-flex px-2">

                                        <!-- Tombol Hapus -->
                                        <input type="checkbox" class="mr-3 mt-1 check-item" value="<?php echo $item["id"] ?>" name="id_delete[]" style="width: 23px;height: 23px;">

                                        <!-- Tombol Edit -->
                                        <a href="<?php controller("MesinController@EditData", $item["id"]) ?>" class="btn btn-primary btn-sm shadow">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5"></th>
                            <th>
                                <?= buttonDelete("mesin"); ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div><!-- /.card-body -->
</div>