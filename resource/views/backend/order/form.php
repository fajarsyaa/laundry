<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Form Order
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("OrdersController@TambahData") ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="user_id">user_id</label>
                    <input type="text" name="user_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="layanan_id">layanan_id</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="layanan_id">
                        <?php foreach (query()->table('layanan')->get() as $layanan) { ?>
                            <option value="<?= $layanan['id'] ?>"><?= $layanan['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pembayaran_id">pembayaran_id</label>
                    <input type="text" name="pembayaran_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tgl_pesan">tgl_pesan</label>
                    <input type="date" name="tgl_pesan" class="form-control">
                </div>
                <div class="form-group">
                    <label for="total_harga">total_harga</label>
                    <input type="text" name="total_harga" class="form-control">
                </div>
                <div class="form-group">
                    <label for="status_laundry">status_laundry</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status_laundry">
                        <option value="Order Confirm">Order Confirm</option>
                        <option value="pick up">pick up</option>
                        <option value="Proses Pencucian">Proses Pencucian</option>
                        <option value="Proses Pengeringan">Proses Pengeringan</option>
                        <option value="Proses Strika">Proses Strika</option>
                        <option value="Proses Pengemasan">Proses Pengemasan</option>
                        <option value="Deliver">Deliver</option>
                        <option value="Di Terima">Di Terima</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pickup_by">pickup_by</label>
                    <input type="text" name="pickup_by" class="form-control">
                </div>
                <div class="form-group">
                    <label for="jam_pickup">jam_pickup</label>
                    <input type="time" name="jam_pickup" class="form-control">
                </div>
                <div class="form-group">
                    <label for="deliver_by">deliver_by</label>
                    <input type="text" name="deliver_by" class="form-control">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>