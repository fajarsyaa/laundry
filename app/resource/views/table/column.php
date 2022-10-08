
<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Kolom Tabel <img src="<?= asset_setup('setup/table.png') ?>" style="max-width: 25px;" alt="">
                </h4>
                <p class="opacity-75 ">
                    Di halaman ini anda bisa mengolah kolom - kolom table untuk sistem anda.
                </p>


            </div>
        </div>
    </div>
</div>

<div class="container  pull-up">
    <?php $table = $tableName; ?>
    <div class="row">
        <div class="col-lg-12 m-b-30">
            <div class="card m-b-30">
                <form action="<?= controllerSetup('SetupTable@updateTable') ?>" method="POST">
                    <div class="card-header">
                        <!-- <div class="float-left">
                            <button type="button" class="btn btn-info btn-sm add-column">+</button>
                        </div> -->
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group" tip title="Nama Table">
                                    <input type="text" name="nama_table" class="form-control form-control-sm table-name" value="<?= $table; ?>" tip title="Nama Table">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="input-group " tip title="Total Kolom">
                                    <input type="text" class="form-control form-control-sm total-table" disabled>
                                </div>
                            </div>
                            <div class="col-md-1 ml-auto">
                                <button class="btn float-right add-column btn-primary btn-sm" type="button" tip title="Tambah Kolom">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table table-valign-middle table-bordered">
                            <thead>
                                <tr>
                                    <th width="30%">Nama Kolom <span class="text-danger">*</span></th>
                                    <th width="20%">Jenis <span class="text-danger">*</span></th>
                                    <th width="20%">Panjang / Nilai</th>
                                    <th>
                                        <center tip data-placement="top" title="Auto Increment">A_I</center>
                                    </th>
                                    <th>
                                        <center>Primary</center>
                                    </th>
                                    <th>
                                        <center>Null</center>
                                    </th>
                                    <th>
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $host->query("DESC " . $table);
                                

                                $no = 1;

                                $db_primary_key = "";
                                $db_auto_increment = "";
                                $db_null = null;
                                $check = 0;
                                while ($see = mysqli_fetch_assoc($query)) {
                                    $check++;
                                    $primary_key = ($see["Key"] == "PRI") ? "checked value='".$see["Field"]."'" : "";
                                    if ($see["Key"] == "PRI") {
                                        $db_primary_key = $see["Field"];
                                    }
                                    if ($see["Extra"] == "auto_increment") {
                                        $db_auto_increment = $see["Field"];
                                    }

                                    $check_null = ($see["Null"] == "YES")? "on":"no";
                                    $db_null[] = $see["Field"]."-".$check_null;

                                    $tipe     = explode("(", $see["Type"]);
                                    $dataType = $tipe[0];
                                    @$jumlah  = explode(")", $tipe[1]);
                                ?>
                                    <input type="hidden" value="<?= $table ?>" name="table">
                                    <tr>
                                        <td><input name="name_column[]" tabindex="1" required type="text" class="form-control input-table name_column <?php echo ($see["Key"] == "PRI") ? "old_primary" : ""; ?> <?php echo ($see["Extra"] == "auto_increment") ? "old_auto_increment" : ""; ?>" value="<?php echo $see["Field"]; ?>" ></td>
                                        
                                        <td>
                                            <select name="type_data[]" tabindex="3" id="" class="form-control js-select2 input-table select-type">
                                                <?php
                                                    $type_data = $host->query("SELECT * FROM type_data");
                                                    while ($listTypeData = mysqli_fetch_assoc($type_data)) {
                                                ?>
                                                    <option <?php echo ($listTypeData['name_data'] == strtoupper($dataType)) ? "selected" : "";?> value="<?= $listTypeData['type_data'] ?>-<?= $listTypeData['name_data'] ?>"><?= $listTypeData['name_data'] ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>

                                        </td>
                                        <td><input name="length[]" tabindex="5" required type="number" class="form-control input-table" value="<?php echo $jumlah[0]; ?>"></td>
                                        <td>
                                            <center>
                                                <input class="input-table input-ai" tabindex="6" <?php echo ($see["Extra"] == "auto_increment") ? "checked value='".$see["Field"]."'" : ""; ?> name="auto_increment" type="radio">
                                                <span style="display: none;" class="cant-ai text-danger mx-auto mb-0" tip title="Tipe data tidak cocok"><i class="mdi mdi-window-close"></i></span>
                                            </center>
                                        </td>
                                        <td>
                                            <center><input class="input-table input-pri" tabindex="7" <?php echo ($see["Key"] == "PRI") ? "checked value='".$see["Field"]."'" : ""; ?> name="primary_key" type="radio"></center>
                                        </td>
                                        <td>
                                            <center><input class="input-table input-null" tabindex="7" <?php echo ($see["Null"] == "YES") ? "checked value='on'" : "value='no'"; ?> name="is_null[]" type="checkbox"></center>
                                        </td>
                                        <td>
                                            <center><a class="btn btn-danger btn-sm delete-column text-white" tip title="Hapus Kolom"><i class="mdi mdi-window-close"></i></a></center>
                                        </td>
                                        <input name="deleted[]" type="hidden" class="deleted" value="">
                                        <input name="total_column[]" type="hidden" value="">
                                        <input name="primary" type="hidden" value="">
                                    </tr>
                                    <input name="new_data[]" type="hidden" value="no">
                                    <?php 
                                        } 
                                        $db_null = implode(',', $db_null);
                                    ?>
                                    <input name="null_new" class="null-new" type="hidden" <?php echo (!empty($db_null)) ? "value='$db_null'" : ""; ?>>
                                    <input name="null_old" type="hidden" <?php echo (!empty($db_null)) ? "value='$db_null'" : ""; ?>>
                                    <input name="primary_old" type="hidden" <?php echo (!empty($db_primary_key)) ? "value='$db_primary_key'" : ""; ?>>
                                    <input name="auto_increment_old" type="hidden" <?php echo (!empty($db_auto_increment)) ? "value='$db_auto_increment'" : ""; ?>>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="float-right mb-2">
                            <button tabindex="8" type="submit" class="btn btn-primary btn-sm" name="send">
                                Simpan
                            </button>
                            <?php
                            
                            if (!empty($status)) {
                            ?>
                                <a href="<?= controllerSetup('SetupTable@canceTable', $table) ?>" class="btn btn-danger btn-sm">
                                    Batal
                                </a>
                            <?php
                            } else {
                            ?>
                                <a href="<?= url('setup/table/data') ?>" class="btn btn-warning btn-sm">
                                    Kembali
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php content('script') ?>
<script>
    $('.add-column').click(function() {

            var row = null;

            row += `<tr>`;
                row += `<td><input tabindex="2" type="text" name="name_column[]" required class="input-table name_column form-control" placeholder="Nama kolom"></td>`;
                row += `<td>
                            <select tabindex="4" name="type_data[]" id="" class="js-select2 input-table form-control select-type">
                                <?php
                                    $type_data = query()->raw("SELECT * FROM type_data");
                                    while ($listTypeData = mysqli_fetch_assoc($type_data)) {
                                ?>
                                    <option value="<?= $listTypeData['type_data'] ?>-<?= $listTypeData['name_data'] ?>"><?= $listTypeData['name_data'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>`;
                row += `<td><input tabindex="5" name="length[]" required type="text" class="input-table form-control" placeholder="panjang kolom"></td>`;
                row += `<td>
                            <center>
                                <input tabindex="6" class="input-ai input-table" name="auto_increment" type="radio">
                                <span style="display: none;" class="cant-ai text-danger mx-auto mb-0" tip title="Tipe data tidak cocok"><i class="mdi mdi-window-close"></i></span>
                            </center>
                        </td>`;
                row += `<td><center><input tabindex="7" class="input-pri input-table" name="primary_key" type="radio"></center></td>`;
                row += `<td><center><input tabindex="7" class="input-null input-table" name="is_null[]" type="checkbox" checked value="on"></center></td>`;
                row += `<td>
                            <center><a class="btn btn-danger btn-sm delete-column text-white" tip title="Hapus Kolom"><i class="mdi mdi-window-close"></i></a></center>
                        </td>`;
                row += `<input name="total_column[]" type="hidden" value="">`;
                row += `<input name="new_data[]" type="hidden" value="yes">`;
            row += `</tr>`;

            $('tbody').append(row);

            $(".js-select2").select2();
        });
        $('table > tbody > tr').each(function(key, val){

    let row         = $(val).find('td');
    let type        = row.eq(1).find(".input-table").val().split("-");
    let typeData    = type[0]; 
    let nameData    = type[1]; 

    // CHECK NILAI
    if(nameData == "TEXT" || typeData == "numeric" || typeData == "date" || nameData == "LONGTEXT"){
        if(typeData == "date" || nameData == "TEXT" || nameData == "LONGTEXT"){
            row.eq(2).find(".input-table").attr("readonly","");
            row.eq(2).find(".input-table").attr("placeholder","Tidak perlu diisi");
            row.eq(2).find(".input-table").removeAttr("required");
        }else{
            row.eq(2).find(".input-table").show();
            row.eq(2).find(".input-table").removeAttr("readonly","");
            row.eq(2).find(".input-table").removeAttr("required");
            row.eq(2).find(".input-table").attr("placeholder","Panjang Kolom");
        }
    }else{
        row.eq(2).find(".input-table").attr("required","");
    }

    // CHECK AI
    if(typeData != "numeric"){
        row.eq(3).find(".input-table").hide();
        row.eq(3).find(".cant-ai").show();
    }else{
        row.eq(3).find(".cant-ai").hide();
        row.eq(3).find(".input-table").show();
    }
    });
</script>
<?php endContent('script') ?>