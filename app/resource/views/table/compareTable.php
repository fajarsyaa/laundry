<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row p-t-40 p-b-90">
            <div class="col-6 text-white">
                <h4 class="">
                    Membandingkan Table <img src="<?= asset_setup('setup/table.png') ?>" style="max-width: 25px;" alt="">
                </h4>
                <p class="opacity-75 ">
                    Di halaman ini anda bisa membandingkan antara satu table dengan lainnya.
                </p>


            </div>
            <div class="col-4 mt-auto mb-auto text-white">
                <h5 class="">
                    Tambah table baru untuk dibandingkan
                </h5>
                <select name="" id="" class="form-control js-select2 nameTable">
                    <?php

                    $get_table = $host->query("SHOW TABLES FROM $DATABASE WHERE tables_in_$DATABASE != 'type_data'");
                    if (!empty($get_table)) :
                        $no = 1;
                        while ($see_table = mysqli_fetch_assoc($get_table)) :
                            $namaTable = $see_table["Tables_in_$DATABASE"];
                    ?>
                            <option value="<?php echo $namaTable ?>"><?php echo $namaTable ?></option>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- DATA TABLE -->
<div class="container-fluid pull-up data_table" >
    <div class="row tempat-drop">
        <?php
        if (empty($dataTable)) :
        // to('setup/table/data');

        else :
            $pecahTabel = explode(",", $dataTable);
            // die();
            for ($i = 0; $i < count($pecahTabel); $i++) :
                $namaTable = "$pecahTabel[$i]";
                $getColumn = query()->raw("DESC $namaTable");
                // check("DESC $namaTable");

        ?>
                <div class="col-md-<?= ($getColumn->num_rows + 1 <= 12) ? $getColumn->num_rows + 1 : "12"; ?> penghapusan">
                    <div class="card m-b-30" >
                        <div class="card-header drag-table bg-primary" style="cursor: move;">
                            <h4 class="card-title text-white"><?php echo $namaTable ?></h4>
                            <div class="card-controls text-white">
                                <i class="mdi mdi-close delete-table" tip title="Hapus table" style="cursor: pointer;"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-lg- m-b-30 table-responsive">
                                <table class="table table-striped datatable-compare table-sm" >
                                    <thead>
                                        <tr>
                                            <?php
                                            while ($seeColumn = mysqli_fetch_object($getColumn)) :
                                                $name = $seeColumn->Field;
                                                $nameCustom = explode("_", $name);
                                            ?>
                                                <th tip title="Klik untuk menghapus kolom ini" style="text-transform: none;">
                                                    <b class="text-info"><?= implode('_<br>', $nameCustom) ?></b>
                                                </th>
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
                                                    <td><?php echo substr($seeData->$name, 0, 10)  ?></td>
                                                <?php endwhile; ?>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            endfor;
        endif;
        ?>
    </div>
</div>

<?php content("script") ?>
<script>
    $(".admin-pin-sidebar").click();

    $('.datatable-compare').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 20, 50],
        "bInfo": false
    });

    $(".tempat-drop").sortable({
        handle : '.drag-table'
    });
    // $(".penghapusan").draggable({
    //     handle : '.drag-table',
    //     grid: [ 40, 30 ],
    //     refreshPositions: true,
    //     containment: 'document'
    // });
    
    $(".datatable-compare").on("click", "th", function(){
        $(this).tooltip("hide");
        var index = $(this).index();
        $(this).closest('table').find(' tbody tr td:nth-child('+index+')').each(function() {
            $(this).remove();
        });
        $(this).remove();
    });



    $(".refresh-table").click(function(){
        alert("hai");
    });

    $(".view_table").on("click", function(){
        $(".view_table").toggle();
        $(".data_table").toggle();
        $(".detail_table").toggle();
        $(".penghapusan").show();    
    });

    $(".delete-table").on("click", function(){
        $(this).tooltip("hide");
        $(this).parents(".penghapusan").hide();    
    });
</script>
<?php endContent("script") ?>