<main>

    <div class="container mt-5">
        <nav aria-label="breadcrumb" class="float-right">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= url('home') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= url('services') ?>">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Layanan</li>
            </ol>
        </nav>
        <a href="<?= url('services') ?>" class="btn-lg btn-primary">kembali</a>
    </div>

    <div class="container mt-50">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= asset('uploads/layanan/' . $data->gambar) ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Detail Layanan / <?= $nama_layanan = $data->nama ?></h5>
                        <p class="card-text">
                            harga : Rp.<?= number_format($data->harga) ?><?php if ($nama_layanan == "bed cover" || $nama_layanan == "topi tas sepatu") {
                                                                                echo "/Pcs";
                                                                            } else {
                                                                                echo "/kg";
                                                                            } ?>
                        </p>

                        <div class="card card-body">
                            description =>
                            <p>
                                <?= $data->description ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <h1 class="card-header">Form Pemesanan</h1>
            <div class="card-body d-flex justify-content-lg-center">
                <!-- <form action="<?php controller('OrdersController@orderStart') ?>" method="post" class="">

                    <div class="form-group justify-content-center">
                        <label for="nama_pemesan" style="font-size: 20px;">Nama pemesan</label>
                        <input type="text" id="nama_pemesan" class="" style="font-size: 20px;" name="nama_pemesan" value="<?= auth()->username() ?>" required>
                    </div>

                    <br>

                    <div class="row form-group justify-content-center">
                        <label style="font-size: 20px;"> Alamat</label>
                        <select name="ongkir" class="mt-2 mx-3">
                            <option selected>Pilih kecamatan</option>
                            <?php foreach ($ongkir as $value) { ?>
                                <option value="<?= $value['harga'] . "," . $value['daerah'] ?>"><?= $value['daerah'] ?></option>
                            <?php } ?>
                        </select>
                        <textarea name="alamat" placeholder="Masukkan Alamat desa,dusun,rt / rw" id="" cols="33" rows="2"></textarea>
                    </div>
                    <br>

                    <label for="jam_pickup " style="font-size: 20px;">Pilih waktu pengambilan cucian</label>
                    <div class="form-group flex-row">
                        <select name="jam_pickup" id="jam_pickup" aria-describedby="321k">
                            <option selected>pilih waktu luang anda</option>
                            <option value="pagi">Pagi 08:00-10:00</option>
                            <option value="siang">Siang 12:30-15:00</option>
                            <option value="sore">sore 15:00-17:00</option>
                        </select>
                        <div id="321k" class="form-text">
                            <h4 style="color: red;">jika anda memilih waktu yang telah berlalu maka cucian anda akan di ambil besok</h4>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <label for="jam_deliver" style="font-size: 20px;">Pilih waktu mengantar cucian</label><br>
                        <select name="jam_deliver" id="jam_deliver" aria-describedby="123k">
                            <option selected>pilih waktu luang anda</option>
                            <option value="pagi">Pagi 08:00-10:00</option>
                            <option value="siang">Siang 12:30-15:00</option>
                            <option value="sore">sore 15:00-17:00</option>
                        </select>
                        <div id="123k" class="form-text">
                            <h4 style="color: red;">disini anda memilih waktu untuk kami mengantar kembali cucian anda nantinya</h4>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="<?= auth()->id() ?>">
                    <input type="hidden" name="harga_layanan" value="<?= $data->harga ?>">
                    <input type="hidden" name="layanan_id" value="<?= $data->id ?>">
                    <input type="hidden" name="payment_id" value="<?= auth()->id() ?>">
                    <input type="hidden" name="time" value="<?= date('H:i') ?>">
                    <br>

                    <div class="form-group">
                        <?php if (auth()->id()) { ?>
                            <input type="submit" class="btn-lg btn-success" value="buat pesanan">
                        <?php } else { ?>
                            <a href="<?= url('login') ?>" class="btn-lg btn-primary">login / register</a>
                        <?php } ?>
                    </div>

                </form> -->
                <form action="<?php controller('OrdersController@orderStart') ?>" method="post" id="contactForm" class="form-contact contact_form">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <textarea class="form-control w-100" name="message" id="message" cols="20" rows="5" placeholder=" Enter Message" disabled>
                            !!! PERHATIAN !!!
                            <div class="form-group">

                                kami hanya menerima pembayaran secara langsung atau Cash On Delivry (cod)
                            </textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="nama_pemesan" id="subject" type="text" placeholder="Masukkan Nama anda" value="<?= auth()->username() ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="ongkir" id="" class="form-control" style="width: 200px !important;">
                                    <option value="" disabled selected>pilih kecamatan</option>
                                    <?php foreach ($ongkir as $value) { ?>
                                        <option value="<?= $value['harga'] . "," . $value['daerah'] ?>"><?= $value['daerah'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="alamat" id="message" cols="2" rows="5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Alamat Detail Anda"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="jam_pickup" id="" class="form-control" style="width: 200px !important;">
                                    <option value="" selected>Pilih waktu mengambil cucian</option>
                                    <option value="pagi">Pagi 08:00-10:00</option>
                                    <option value="siang">Siang 12:30-15:00</option>
                                    <option value="sore">sore 15:00-17:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="jam_deliver" id="" class="form-control" style="width: 200px !important;">
                                    <option value="" selected>Pilih waktu mengantar cucian</option>
                                    <option value="pagi">Pagi 08:00-10:00</option>
                                    <option value="siang">Siang 12:30-15:00</option>
                                    <option value="sore">sore 15:00-17:00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?= auth()->id() ?>">
                    <input type="hidden" name="harga_layanan" value="<?= $data->harga ?>">
                    <input type="hidden" name="layanan_id" value="<?= $data->id ?>">
                    <input type="hidden" name="payment_id" value="<?= auth()->id() ?>">
                    <input type="hidden" name="time" value="<?= date('H:i') ?>">

                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary " value="kirim">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="mx-5 my-5">
            <h3 class="bg-info text-center text-white py-2">Informasi Orderan anda</h3>
            <ul class="list-group">
                <li class="list-group-item">1. lihat keranjang</li>
                <li class="list-group-item">2. anda bisa melihat detail transaksi disana</li>
                <li class="list-group-item">3. dan anda juga bisa membatalkan transaksi di sana</li>
                <li class="list-group-item">3. Untuk type harga perkilo dan permeter, harga akan di tentukan setelah kurir melakukan penimbangan berat / pengukuran panjang di tempat anda</li>
            </ul>
            <h3 class="bg-danger text-center mt-3 text-white py-2">PENTING !</h3>
            <ul class="list-group">
                <li class="list-group-item">kami hanya menerima pembayaran secara langsung atau Cash On Delivry (cod)</li>
        </div>
    </div>
</main>