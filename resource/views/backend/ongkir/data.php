<div class="card">
    <div class="card-header">
        <h3 class="card-title name-file">
            Judul
        </h3>
        <a href="<?php url("backend/ongkir/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("OngkirController@HapusData") ?>" method="POST">
                <table class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                               <th>Daerah</th>
                           <th>Harga</th>
                         <th><input type="checkbox" class="ml-2" id="check-all" style="width: 18px;height: 18px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach( query()->table("ongkir")->get() AS $item ){ ?>

                            <tr>
                                <td> <?= $no++ ?> </td>
    							<td> <?= $item["daerah"] ?> </td>
							<td> <?= $item["harga"] ?> </td>

                                <td>
                                    <div class="d-flex px-2">

                                        <!-- Tombol Hapus -->
                                        <input type="checkbox" class="mr-3 mt-1 check-item" value="<?php echo $item["id"] ?>" name="id_delete[]" style="width: 23px;height: 23px;">

                                        <!-- Tombol Edit -->
                                        <a href="<?php controller("OngkirController@EditData", $item["id"]) ?>" class="btn btn-primary btn-sm shadow">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3"></th>
                            <th>
                                <?= buttonDelete("ongkir"); ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div><!-- /.card-body -->
</div>