<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Cek Barang Costumer
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("OrdersController@prosesKemas", $dataOrder->odr_id) ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $dataOrder->nama_pemesan ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="layanan">layanan</label>
                    <input type="text" name="layanan" class="form-control" value="<?= $dataOrder->nama ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="pembayaran">kode</label>
                    <input type="text" name="kode" class="form-control" value="<?= $dataOrder->code_order ?>">
                </div>
                <div class="form-group">
                    <label for="tgl_pesan">tgl_pesan</label>
                    <input type="date" name="tgl_pesan" class="form-control" value="<?= $dataOrder->tgl_pesan ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Barang Pelanggan</label>
                    <textarea name="deskripsi" id="" cols="100" rows="10" class="form-control" readonly><?= $dataOrder->deskripsi ?></textarea>
                </div>

                <input type="submit" name="submit" value="Data Telah Sesusai" class="btn btn-success">

            </form>
        </div>
    </div><!-- /.card-body -->
</div>