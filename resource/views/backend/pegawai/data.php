<div class="card">
    <div class="card-header">
        <h3 class="card-title name-file">
            Data Pegawai
        </h3>
        <a href="<?php url("backend/pegawai/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("PegawaiController@HapusData") ?>" method="POST">
                <table class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Asal</th>
                            <th>Nohp</th>
                            <th>Status pekerjaan</th>
                            <th>Wilker</th>
                            <th>Foto</th>
                            <th><input type="checkbox" class="ml-2" id="check-all" style="width: 18px;height: 18px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach (query()->table("pegawai")->get() as $item) { ?>

                            <tr>
                                <td> <?= $no++ ?> </td>
                                <td> <?= $item["nama"] ?> </td>
                                <td> <?= $item["umur"] ?> </td>
                                <td> <?= $item["asal"] ?> </td>
                                <td> <?= $item["nohp"] ?> </td>
                                <td> <?= $item["status_pekerjaan"] ?> </td>
                                <td> <?= $item["wilker"] ?> </td>
                                <td>
                                    <img src="<?= asset('uploads/karyawan/' . $item['foto']) ?>" alt="gambar user" width="50" height="50" id="gambar_user">
                                </td>

                                <td>
                                    <div class="d-flex px-2">

                                        <!-- Tombol Hapus -->
                                        <input type="checkbox" class="mr-3 mt-1 check-item" value="<?php echo $item["id"] ?>" name="id_delete[]" style="width: 23px;height: 23px;">

                                        <!-- Tombol Edit -->
                                        <a href="<?php controller("PegawaiController@EditData", $item["id"]) ?>" class="btn btn-primary btn-sm shadow">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7"></th>
                            <th>
                                <?= buttonDelete("pegawai"); ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div><!-- /.card-body -->
</div>