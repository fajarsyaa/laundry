<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller('OrdersController@orderStart') ?>" method="post" class="">

                <div class="form-group">
                    <label for="nama_pemesan">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control">
                </div>

                <div class="form-group">
                    <label for="layanan_id">Layanan</label>
                    <select name="layanan_id" id="" class="form-control">
                        <option value="" readonly>-Pilih Layanan-</option>
                        <?php
                        $data = query()->table('layanan')->get();
                        foreach ($data as $value) {
                        ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <select name="ongkir" id="" class="form-control">
                        <option value="" readonly>-Pilih Kecamatan-</option>
                        <?php
                        $ongkir = query()->table('ongkir')->get();
                        foreach ($ongkir as $value) {
                        ?>
                            <option value="<?= $value['harga'] . "," . $value['daerah'] ?>"><?= $value['daerah'] ?></option>
                        <?php } ?>
                    </select>
                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control" placeholder="masukkan detail alamat"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Waktu Pengambilan Cucian</label>
                    <select class="form-control" name="jam_pickup" id="">
                        <option selected>pilih waktu luang anda</option>
                        <option value="pagi">Pagi 08:00-10:00</option>
                        <option value="siang">Siang 12:30-15:00</option>
                        <option value="sore">sore 15:00-17:00</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Waktu Pengembalian Cucian</label>
                    <select class="form-control" name="jam_deliver" id="">
                        <option selected>pilih waktu luang anda</option>
                        <option value="pagi">Pagi 08:00-10:00</option>
                        <option value="siang">Siang 12:30-15:00</option>
                        <option value="sore">sore 15:00-17:00</option>
                    </select>
                </div>

                <input type="hidden" name="user_id" value="<?= auth()->id() ?>">
                <input type="hidden" name="time" value="<?= date('H:i') ?>">
                <br>

                <div class="form-group">
                    <input type="submit" class="btn-lg btn-success" value="buat pesanan">
                </div>

            </form>
        </div>
    </div><!-- /.card-body -->
</div>