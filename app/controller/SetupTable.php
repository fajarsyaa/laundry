<?php

    function createTable($request)
    {

        $check = hitung(query()->raw("SELECT id FROM type_data"));
        if($check != 37){
            query()->raw("CREATE TABLE type_data (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, type_data VARCHAR(30) NOT NULL, name_data VARCHAR(30) NOT NULL)");

            // numeric
            query()->insert('type_data',["numeric","INT"]);
            query()->insert('type_data',["numeric","TINYINT"]);
            query()->insert('type_data',["numeric","SMALLINT"]);
            query()->insert('type_data',["numeric","MEDIUMINT"]);
            query()->insert('type_data',["numeric","BIGINT"]);
            query()->insert('type_data',["numeric","DECIMAL"]);
            query()->insert('type_data',["numeric","FLOAT"]);
            query()->insert('type_data',["numeric","DOUBLE"]);
            query()->insert('type_data',["numeric","BIT"]);
            query()->insert('type_data',["numeric","BOOLEAN"]);

            // string
            query()->insert('type_data',["string","VARCHAR"]);
            query()->insert('type_data',["string","TEXT"]);
            query()->insert('type_data',["string","CHAR"]);
            query()->insert('type_data',["string","BINARY"]);
            query()->insert('type_data',["string","VARBINARY"]);
            query()->insert('type_data',["string","TINYBLOB"]);
            query()->insert('type_data',["string","BLOB"]);
            query()->insert('type_data',["string","MEDIUMBLOB"]);
            query()->insert('type_data',["string","LONGBLOB"]);
            query()->insert('type_data',["string","TINYTEXT"]);
            query()->insert('type_data',["string","MEDIUMTEXT"]);
            query()->insert('type_data',["string","LONGTEXT"]);
            query()->insert('type_data',["string","ENUM"]);
            query()->insert('type_data',["string","SET"]);

            // date
            query()->insert('type_data',["date","DATE"]);
            query()->insert('type_data',["date","TIME"]);
            query()->insert('type_data',["date","DATETIME"]);
            query()->insert('type_data',["date","TIMESTAMP"]);
            query()->insert('type_data',["date","YEAR"]);
            
            // spatial
            query()->insert('type_data',["spatial","GEOMETRY"]);
            query()->insert('type_data',["spatial","POINT"]);
            query()->insert('type_data',["spatial","LINESTRING"]);
            query()->insert('type_data',["spatial","POLYGON"]);
            query()->insert('type_data',["spatial","GEOMETRYCOLLECTION"]);
            query()->insert('type_data',["spatial","MULTILINESTRING"]);
            query()->insert('type_data',["spatial","MULTIPOINT"]);
            query()->insert('type_data',["spatial","MULTIPOLYGON"]);
        }

        $query = "CREATE TABLE $request->name_table (id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,PRIMARY KEY(id))";
        var_dump($query);
        var_dump(query()->raw($query));

        $tableName = $request->name_table;
        $status = "create";
        view('setup/table/column', compact('tableName','status'));
    }
    
    function editTable($request)
    {
        $tableName = $request->id;
        view('setup/table/column', compact('tableName'));
    }

    function updateTable($request)
    {
        global $host;
        echo "<pre>";
        $table              = $request->table;
        $table_new          = $request->nama_table;
        $desc_table         = $host->query("DESC $table");
        
        //COLUMN
        $name_column        = $request->name_column;
        $length             = $request->length;
        $status_delete      = $request->deleted;
        $data_type_data     = $request->type_data;
        $type_column        = $request->new_data;
        
        // PRIMARY
        $old_primary        = $request->primary_old;
        $new_primary        = $request->primary_key;
        
        // AUTO INCREMENT
        $old_auto_increment = $request->auto_increment_old;
        $new_auto_increment = $request->auto_increment;

        // IS_NULL
        $new_null            = explode(",",$request->null_new);
        $old_null            = explode(",",$request->null_old);
        
        $sql_table = "";

        // RENAME TABLE
        if ($table != $table_new) {
            $sql_table .= "RENAME TABLE $table TO $table_new;";
        }

        for ($i=0; $i < count($request->total_column); $i++) { 
            $pecah_type_data       = explode("-",$data_type_data[$i]);
            $type_data             = $pecah_type_data[0];
            $nama_type_data        = $pecah_type_data[1];

            $see_field             = mysqli_fetch_array($desc_table);
            
            $pecah_old_type_data   = explode("(", $see_field[1]);
            $old_name_type_data    = strtoupper($pecah_old_type_data[0]);
            @$old_length_type_data = explode(")", $pecah_old_type_data[1]);
            
            // NULL NEW
            $get_old_null = explode("-",$old_null[$i]);
            $name_old_null = $get_old_null[0];
            $status_old_null = ($get_old_null[1] == "on") ? "NULL" : "NOT NULL";
            // NULL OLD
            $get_new_null = explode("-",$new_null[$i]);
            $name_new_null = $get_new_null[0];
            $status_new_null = ($get_new_null[1] == "on") ? "NULL" : "NOT NULL";

            $data_change_null = ($status_old_null != $status_new_null)? $status_new_null : $status_old_null;

            // ADD FIELD
            if (!empty($name_column[$i]) && !empty($nama_type_data) && $type_column[$i] == "yes") {
                if($type_data == "date" || $nama_type_data == "TEXT" || $nama_type_data == "LONGTEXT"){
                    $sql_table .= "ALTER TABLE $table ADD COLUMN ".$name_column[$i]." ".$nama_type_data." $data_change_null;";
                }else{
                    $sql_table .= "ALTER TABLE $table ADD COLUMN ".$name_column[$i]." ".$nama_type_data."(".$length[$i].") $data_change_null;";
                }
            }

            

            // EDIT FIELD
            if ($type_column[$i] == "no") {
                if ($see_field[0] != $name_column[$i] || $old_name_type_data != $nama_type_data || $old_length_type_data[0] != $length[$i] || $status_old_null != $status_new_null) {
                    if ($name_column[$i] == $old_auto_increment) {
                        if($type_data == "date" || $nama_type_data == "TEXT" || $nama_type_data == "LONGTEXT"){
                            $sql_table .= "ALTER TABLE $table CHANGE ".$see_field[0]." ".$name_column[$i]." ".$nama_type_data." $data_change_null AUTO_INCREMENT;";
                        }else{
                            $sql_table .= "ALTER TABLE $table CHANGE ".$see_field[0]." ".$name_column[$i]." ".$nama_type_data."(".$length[$i].") $data_change_null AUTO_INCREMENT;";
                        }
                    }else{
                        if($type_data == "date" || $nama_type_data == "TEXT" || $nama_type_data == "LONGTEXT"){
                            $sql_table .= "ALTER TABLE $table CHANGE ".$see_field[0]." ".$name_column[$i]." ".$nama_type_data." $data_change_null;";
                        }else{
                            $sql_table .= "ALTER TABLE $table CHANGE ".$see_field[0]." ".$name_column[$i]." ".$nama_type_data."(".$length[$i].") $data_change_null;";
                        }
                    }
                }
            }
                
            // DELETE FIELD
            if (!empty($status_delete[$i])) {
                $sql_table .= "ALTER TABLE $table DROP COLUMN ".$name_column[$i].";";
            }

            // CHANGE PRIMARY
            if ($new_primary == $name_column[$i] && !empty($new_primary) && $old_primary != $new_primary){
                if ($old_primary == $old_auto_increment) {
                    $sql_table .= "ALTER TABLE $table CHANGE $old_auto_increment $old_auto_increment ".$nama_type_data."(".$length[$i].");";
                }
                $sql_table .= "ALTER TABLE $table DROP PRIMARY KEY;";
                
                $sql_table .= "ALTER TABLE $table ADD PRIMARY KEY ($new_primary);";
            }
            
            // CHANGE AUTO INCREMENT
            if ($new_auto_increment == $name_column[$i] && !empty($new_auto_increment)  && $old_auto_increment != $new_auto_increment) {
                
                $sql_table .= "ALTER TABLE $table CHANGE $old_auto_increment $old_auto_increment ".$nama_type_data."(".$length[$i].");";
                $sql_table .= "ALTER TABLE $table DROP PRIMARY KEY;";
                        
                $sql_table .= "ALTER TABLE $table ADD PRIMARY KEY ($new_auto_increment);";
                $sql_table .= "ALTER TABLE $table CHANGE $new_auto_increment $new_auto_increment ".$nama_type_data."(".$length[$i].") AUTO_INCREMENT;";

                if ($type_data != "numeric") {
                    $sql_table = "";
                }
            }
        }

        // var_dump($sql_table);
        // die();

        $all_sql = explode(";", $sql_table);
        // var_dump($all_sql);
        // die();
        for ($i=0; $i < count($all_sql); $i++) { 
            if (!empty($all_sql[$i])) {
                $check = $host->query($all_sql[$i].";");
            }
        }
        
        alertSetup("Berhasil", "mengupdate table", "success");
        view('setup/table/data');
    }
    
    function deleteTable($request)
    {
        global $host;   
        if (query()->raw("DROP TABLE $request->id")) {
            alertSetup('Berhasil','menghapus table '.$request->id);
        }else{
            alertSetup('Gagal','menghapus table '.$request->id.'<br> Type file harus .sql / .xls','error');
        }
        
        view('setup/table/data');
    }

    function canceTable($request)
    {
        global $host;   
        query()->raw("DROP TABLE $request->id");
        
        view('setup/table/data');
    }
    
    function compareTable($request)
    {
        $dataTable = $request->data_compare;

        $dataTable = $dataTable;
        
        view('setup/table/compareTable', compact('dataTable'));
    }

    function import_data_table($request)
    {
        if (type_files('file_import') == "sql") {
            $data = file(tmp('file_import'));
            $sql = "";
            foreach ($data as $line) {
                if(substr($line, 0, 1) == "(" || substr($line, 0, 6) == "INSERT"){
                    $pecah_line = explode("(", $line);
                    if(count($pecah_line) == 2 && !empty($pecah_line[0])){
                        if($pecah_line[0] == "INSERT INTO `$request->id` "){
                            $sql .= $line;
                        }else{
                            break;
                        }
                    }
                    $sql .= $line;
                }
            }

            if (query()->raw($sql)) {
                alertSetup('Berhasil','import table '.$request->id,'success');
            }else{
                alertSetup('Gagal','import table '.$request->id.'<br>Sepertinya ada yang salah','error');
            }
            view('setup/table/data');
        // }
        // elseif (type_files('file_import') == "xls") {
        //     include dir_project()."app/resource/assets/vendor/excelreader/excelreader.php";

        //     $nama_file = files('file_import');
        //     $tmp_file = tmp('file_import');
            
        //     chmod($nama_file, 0777);

        //     $data = new Spreadsheet_Excel_Reader($nama_file, false);
            
        //     $jumlah_baris = $data->rowcount($sheet_index=0);
        //     pre($jumlah_baris);


            // view('setup/table/data');
        }else{
            alertSetup('Gagal','import table '.$request->id.'<br>Type file harus .sql / .xls','error');
            view('setup/table/data');
        }
    }
    function export_data_table($request)
    {
        $nama_table = $request->id;
        if ($request->type_export == "sql") {
            $data_kolom   = query()->raw("DESC $nama_table");
            $kolom        = null;
            $backupColumn = null;
            foreach ($data_kolom as $see) {

                $kolom[]        = "'".$see["Field"]."'";
                $backupColumn[] = "";

            }

            $sql_table  = 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";'."\n"
            ."START TRANSACTION;"."\n"
            .'SET time_zone = "+00:00";'."\n\n"
            ."INSERT INTO '$nama_table' (".implode(", ", $kolom).") VALUES \n";
            $values     = null;
            $data_table = query()->table($nama_table)->get();
            if(!empty($data_table)){
                // data file
                foreach ($data_table as $see) {
                    $cek_data = "('";
                    $cek_data .= implode("', '",$see);
                    $cek_data .= "')";
                    $values[] = $cek_data;
                }

                if(empty($data_table->num_rows)){
                    $sql_table .= "('".implode("', '",$backupColumn)."');";
                }else{
                    $sql_table .= implode(", \n",$values);
                    $sql_table .= ";";
                }

                // pembuatan file sql
                $file = $request->id."_".date("d-m-Y").".sql";
                mkdir(dir_project("database/data/").$nama_table);
                $txt = fopen(dir_project("database/data/$nama_table/").$file, "w") or die("Unable to open file!");
                fwrite($txt, $sql_table);
                fclose($txt);
                header('Content-Description: File Transfer');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                header("Content-Type: text/plain");
                readfile($file);
            }
        }
        elseif ($request->type_export == "excel") {
            $file = $request->id."_".date("d-m-Y").".xls";
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            header("Content-Type: text/plain");
            // readfile($file);
            $data_kolom   = query()->raw("DESC $nama_table");

            echo "<body style='border: 0.1pt solid #ccc'>";
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($data_kolom as $see) {
                echo "<td>".$see["Field"]."</td>";
            }
            echo "</tr>";
            
            $data_table = query()->table($nama_table)->get();
            if(!empty($data_table)){
                // data file
                foreach ($data_table as $see) {
                    echo "<tr>";
                    echo "<td>";
                    echo implode("</td><td>",$see);
                    echo "</td>";
                    echo "</tr>";
                }
                
                // pembuatan file sql
            }
            echo "</table>";
            echo "</body>";
        }else{
            alertSetup('Gagal','export table '.$nama_table.'<br>Jenis export harus sql/excel/pdf','error');
            view('setup/table/data');
        }
    }
