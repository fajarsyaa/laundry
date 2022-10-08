<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Data Layanan
        </h3>
        <a href="<?php url("backend/layanan/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <table class="table table-striped data-table-noexcel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nama</th>
                        <th>gambar</th>
                        <th>description</th>
                        <td>harga</td>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach (query()->table("layanan")->get() as $item) { ?>

                        <tr>
                            <td> <?= $no++ ?> </td>
                            <td> <?= $item["nama"] ?> </td>
                            <td>
                                <img src="<?= asset('uploads/layanan/' . $item["gambar"]) ?>" alt="" style="width: 100px;">
                            </td>
                            <td> <?= $item["description"] ?> </td>
                            <td> <?= $item["harga"] ?> </td>
                            <td>
                                <!-- Tombol Hapus -->
                                <a href="<?php controller("LayananController@HapusData", $item["id"]) ?>" class="btn btn-danger btn-sm shadow">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <!-- Tombol Edit -->
                                <a href="<?php controller("LayananController@EditData", $item["id"]) ?>" class="btn btn-primary btn-sm shadow">
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