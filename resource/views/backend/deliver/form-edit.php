<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Serah terima
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("OrdersController@done", $dataOrder->odr_id) ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $dataOrder->nama_pemesan ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="kode">kode</label>
                    <input type="text" name="kode" class="form-control" value="<?= $dataOrder->code_order ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="pembayaran">status pembayaran</label>
                    <input type="text" name="pembayaran" class="form-control" value="<?= $dataOrder->status ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="total_bayar">total yang harus dibayar</label>
                    <input type="text" name="total_bayar" class="form-control" value="Rp.<?= number_format($dataOrder->total_harga) ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="pembayaran">pembayaran</label>
                    <input type="text" name="pembayaran" class="form-control" value="<?= $dataOrder->amount ?>" placeholder="Masukkan Nominal Pembayaran" required>
                    <input type="hidden" name="payment_id" value="<?= $dataOrder->pay_id ?>">
                </div>
                <div class="form-group">
                    <label for="layanan">layanan</label>
                    <input type="text" name="layanan" class="form-control" value="<?= $dataOrder->nama ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tgl_pesan">tgl_pesan</label>
                    <input type="date" name="tgl_pesan" class="form-control" value="<?= $dataOrder->tgl_pesan ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Barang Pelanggan</label>
                    <textarea name="deskripsi" id="" cols="100" rows="10" class="form-control" readonly><?= $dataOrder->deskripsi ?></textarea>
                </div>

                <input type="submit" name="submit" value="Selesai" class="btn btn-success">

            </form>
        </div>
    </div><!-- /.card-body -->
</div>