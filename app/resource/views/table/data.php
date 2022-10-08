<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row p-t-40 p-b-90 text-white">
            <div class="col-5">

                <h4 class="">
                    Table <img src="<?= asset_setup('setup/table.png') ?>" style="max-width: 25px;" alt="">
                </h4>
                <p class="opacity-75 ">
                    Di halaman ini anda bisa mengolah table - table untuk sistem anda.
                </p>


            </div>
            <div class="col-3">
                <h4 class="">
                    Table baru
                </h4>
                <form action="<?= controllerSetup('SetupTable@createTable', "tambah") ?>" method="POST" class="form-inline">
                    <div class="form-group">
                        <input type="text" required name="name_table" class="form-control form-control-sm mr-1" required placeholder="Nama table baru..." autofocus>
                        <button class="btn btn-info btn-sm" tip title="Tambah Table"><i class="mdi mdi-plus"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-4 text-right">
                <!-- <h4 class="">
                    All data table
                </h4> -->
                <form target="_blank" action="<?= controllerSetup("SetupTable@compareTable") ?>" method="POST">
                    <div class="btn-group ">
                        <a target="_blank" href="<?= url("setup/table/datadetailtable") ?>" class="btn btn-light btn-sm " tip title="Lihat data detail table"><i class="mdi mdi-details"></i></a>
                        <div class="pesanCompare btn-group" style="display: inline-block; " tip title="Maaf anda harus memilih lebih dari 1 table dahulu">
                            <button class="btn btn-pink btn-sm btnCompare disable"><i class="mdi mdi-compare"></i></button>
                        </div>
                        <!-- <a target="_blank" href="<?= url("setup/table/datadetailtable") ?>" class="btn btn-light " tip title="Lihat data detail table"><i class="mdi mdi-nut mdi-spin"></i></a> -->
                    </div>
                    <input type="hidden" class="dataCompare" name="data_compare">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container  pull-up">
    <div class="row">
        <div class="col-lg-12 m-b-30">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered datatable-table table-sm ">
                                <thead>
                                    <tr>
                                        <th width="20">No</th>
                                        <th>Nama Table</th>
                                        <th width="50" class="text-center">Data</th>
                                        <th width="50" class="text-center">Do It</th>
                                        <th width="50" class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_table = $host->query("SHOW TABLES FROM $DATABASE WHERE tables_in_$DATABASE != 'type_data'");
                                    if (!empty($get_table)) :
                                        $no = 1;
                                        while ($see_table = mysqli_fetch_assoc($get_table)) :
                                            $namaTable = $see_table["Tables_in_$DATABASE"];
                                    ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td class="namaTable"><?= $namaTable ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_of_table<?= $namaTable ?>" tip title="Detail Table"><i class="mdi mdi-table-settings"></i></button>
                                                        <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#data_of_table<?= $namaTable ?>" tip title="Data Table"><i class="mdi mdi-table-search"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-purple btn-sm" data-toggle="modal" data-target="#export_table<?= $namaTable ?>" tip title="Export Data Table"><i class="mdi mdi-file-export"></i></button>
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#import_table<?= $namaTable ?>" tip title="Import Data Table"><i class="mdi mdi-import"></i></button>
                                                        <a target="_blank" href="http://localhost/phpmyadmin/sql.php?server=1&db=<?= $DATABASE ?>&table=<?= $namaTable ?>&pos=0" class="btn btn-success btn-sm" tip title="Buka di phpmyadmin"><i class="mdi mdi-arrow-top-right"></i></a>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="<?= controllerSetup('SetupTable@editTable', $namaTable) ?>" class="btn btn-warning btn-sm" tip title="Edit Table"><i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a data-content="<?= $namaTable ?>" href="#" data-url="<?= controllerSetup('SetupTable@deleteTable', $namaTable) ?>" class="btn btn-danger btn-sm alert-delete" tip title="Delete Table"><i class="mdi mdi-window-close"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$get_table = $host->query("SHOW TABLES FROM $DATABASE WHERE tables_in_$DATABASE != 'type_data'");
if (!empty($get_table)) :
    while ($see_table = mysqli_fetch_assoc($get_table)) :
        $namaTable = $see_table["Tables_in_$DATABASE"];
?>
        <div class="modal fade" id="detail_of_table<?= $namaTable ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail table <span class="text-info"><?= $namaTable ?></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table class="table table-striped table-sm">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Nama Column</th>
                                    <th>Tipe Column</th>
                                    <th>Panjang Column</th>
                                    <th>Null</th>
                                    <th>Key</th>
                                    <th>AI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $getColumn = $host->query("DESCRIBE $namaTable");
                                while ($seeColumn = mysqli_fetch_object($getColumn)) :
                                    $name = $seeColumn->Field;
                                    $type = explode("(", $seeColumn->Type);
                                    $getNametype = $type[0];
                                    $type = @explode(")", $type[1]);
                                    $getLengthtype = $type[0];
                                    $null = $seeColumn->Null;
                                    $key = $seeColumn->Key;
                                    $ai = $seeColumn->Extra;
                                ?>
                                    <tr>
                                        <td><?= $name ?></td>
                                        <td><?= $getNametype ?></td>
                                        <td><?= $getLengthtype ?></td>
                                        <td><?= $null ?></td>
                                        <td><?= $key ?></td>
                                        <td><?= $ai ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="data_of_table<?= $namaTable ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data di table <span class="text-info"><?= $namaTable ?></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table class="table table-striped datatable table-sm">
                            <thead>
                                <tr>
                                    <?php
                                    $getColumn = $host->query("DESCRIBE $namaTable");
                                    while ($seeColumn = mysqli_fetch_object($getColumn)) :
                                        $name = $seeColumn->Field;
                                    ?>
                                        <th><?= $name ?></th>
                                    <?php endwhile; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $countText = 0;
                                $getData = $host->query("SELECT * FROM $namaTable");
                                while ($seeData = mysqli_fetch_object($getData)) :
                                ?>
                                    <tr>
                                        <?php
                                        $getColumn = $host->query("DESCRIBE $namaTable");
                                        while ($seeColumn = mysqli_fetch_object($getColumn)) :
                                            $name = $seeColumn->Field;
                                            if ($countText < strlen($seeData->$name)) {
                                                $countText = strlen($seeData->$name);
                                            }
                                        ?>
                                            <th><?= $seeData->$name ?></th>
                                        <?php endwhile; ?>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <span class="count-text" data-count="<?= $countText ?>"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="import_table<?= $namaTable ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import data ke table <span class="text-info"><?= $namaTable ?></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= controllerSetup('SetupTable@import_data_table', $namaTable) ?>" enctype="multipart/form-data" method="POST">
                        <div class="modal-body ">
                            <input type="file" class="form-control-file" name="file_import" accept=".sql,.xls">
                            <p class="text-danger">* file yang digunakan harus berekstensi .sql</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="export_table<?= $namaTable ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Export dari table <span class="text-info"><?= $namaTable ?></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= controllerSetup('SetupTable@export_data_table', $namaTable) ?>" enctype="multipart/form-data" method="POST">
                        <div class="modal-body ">
                            <p class="text-info">Pilih type file export</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type_export" value="sql" checked>
                                <label class="form-check-label">
                                    SQL
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type_export" value="excel">
                                <label class="form-check-label">
                                    EXCEL
                                </label>
                            </div>
                            <!-- <div class="form-check">
                                <input class="form-check-input" type="radio" name="type_export" value="pdf">
                                <label class="form-check-label">
                                    PDF
                                </label>
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm">Export</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
content("script");
?>
<script>
    $(document).ready(function() {
        var table = $('.datatable-table').DataTable({
            select: {
                style: 'multi',
                selector: 'td.namaTable'
            }
        });

        $(".datatable-table").on('click', 'tr', function() {
            $(this).toggleClass('selected');
            if (table.rows('.selected').count() > 1) {
                var dataTable = table.rows('.selected');
                var dataBaris = table.rows('.selected').data();

                var dataCompare = [];
                for (let i = 0; i < dataTable.count(); i++) {
                    dataCompare[i] = dataBaris[i][1];
                }
                $(".btnCompare").removeClass('disable');
                // $(".pesanCompare").attr('title', 'Anda sudah bisa membandingkan table');
                $(".pesanCompare").attr('data-original-title', 'Anda sudah bisa membandingkan table');
                $(".pesanCompare").tooltip('show');
                $(".dataCompare").val(dataCompare.join(","));
            } else {
                $(".pesanCompare").tooltip('hide');
                // $(".pesanCompare").attr('title', 'Maaf anda harus memilih lebih dari 1 table dahulu');
                $(".pesanCompare").attr('data-original-title', 'Maaf anda harus memilih lebih dari 1 table dahulu');
                $(".btnCompare").addClass('disable');
            }
        });

    })
</script>
<?php endContent("script") ?>