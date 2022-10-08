<div >
    <div class="container-fluid mb-1">
        <div class="row p-t-20 p-b-20">
            <div class="col-6">
                <h3 tip title="Nama Database"><?php echo $DATABASE ?></h3>
            </div>
            <div class="col-6 text-white text-right">
                <button class="btn btn-info plus-detail" tip title="Tambah ukuran table"><i class="mdi mdi-plus"></i></button>
                <button class="btn btn-info minus-detail" tip title="Kurangi ukuran table"><i class="mdi mdi-minus"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- DETAIL TABLE -->
<div class="container-fluid detail_table" style="height: 100%;min-height:100vh">
    <div class="row tempat-drop">
        <?php
            $get_table = $host->query("SHOW TABLES FROM $DATABASE WHERE tables_in_$DATABASE != 'type_data'");
            if(!empty($get_table)):
                while ($see_table = mysqli_fetch_assoc($get_table)) :
                    $namaTable = $see_table["Tables_in_$DATABASE"];
                    $getColumn = $host->query("DESCRIBE $namaTable" );

        ?>
                <div class="detail-item ml-1">
                    <div class="card m-b-30">
                        <div class="card-header drag-table bg-primary" style="cursor:move">
                            <h4 class="card-title text-white detail-head">
                                <span class="opacity-50"></span><?php echo $namaTable ?>
                            </h4>
                        </div>
                        <div class="card-body p-1">
                            <div class="table-responsive">
                            <table class="table table-striped table-sm detail-body">
                                <tbody>
                                    <?php  
                                        while ($seeColumn = mysqli_fetch_object($getColumn)) :
                                            $name = $seeColumn->Field;
                                            $type = explode("(",$seeColumn->Type);
                                            $getNametype = strtoupper($type[0]);
                                            $type = @explode(")",$type[1]);
                                            $getLengthtype = $type[0];
                                            $null = $seeColumn->Null;
                                            $key = $seeColumn->Key;
                                            $ai = $seeColumn->Extra;

                                            $cekType = query()->table("type_data")
                                                    ->select("type_data")
                                                    ->where("name_data", $getNametype)
                                                    ->single()
                                                    ;
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ($seeColumn->Key == "PRI")? "<i class='mdi mdi-key-variant' style='color : #ffa502'></i>" : "" ; ?>
                                                <?= ($cekType->type_data == "numeric" && $seeColumn->Key != "PRI")? "<i class='mdi mdi-border-color mdi-rotate-315' style='color : #1e90ff'></i>" : "" ; ?>
                                                <?= ($cekType->type_data == "string")? "<i class='mdi mdi-format-color-text' style='color : #ced6e0'></i>" : "" ; ?>
                                                <?= ($cekType->type_data == "date")? "<i class='mdi mdi-timer' style='color : #ced6e0'></i> " : "" ; ?>
                                            </td>
                                            <td><?= $name ?></td>
                                            <td><?= (!empty($getLengthtype))? $getNametype."(".$getLengthtype.")" : $getNametype ?></td>
                                            <!-- <td><?= $null ?></td>
                                            <td><?= $key ?></td>
                                            <td><?= $ai ?></td> -->
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
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

    // $(".tempat-drop").draggable({
    //     handle : '.drag-table'
    // });
    $(".detail-item").draggable({
        handle : '.drag-table',
        // grid: [ 20, 20 ],
        refreshPositions: true,
        zIndex: 100,
        "ui-draggable": "highlight",
        containment: ".detail_table"
        // containment: 'document'
    });
    
    $(".datatable-compare").on("click", "th", function(){
        $(this).tooltip("hide");
        var index = $(this).index();
        $(this).closest('table').find(' tbody tr td:nth-child('+index+')').each(function() {
            $(this).remove();
        });
        $(this).remove();
    });

    $(".minus-detail").on("click", function(){
        $(".detail-head").css("font-size", parseInt($(".detail-head").css("font-size")) - 1+"px");
        $(".detail-body").css("font-size", parseInt($(".detail-body").css("font-size")) - 1+"px")
    });
    
    $(".plus-detail").on("click", function(){
        $(".detail-head").css("font-size", parseInt($(".detail-head").css("font-size")) + 1+"px");
        $(".detail-body").css("font-size", parseInt($(".detail-body").css("font-size")) + 1+"px")
    });

</script>
<?php endContent("script") ?>