<main>
    <!--? Hero Start -->
    <div class="slider-area2 section-bg2 hero-overly" data-background="<?= asset('img/hero/hero2.png') ?>">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2">
                            <h2>Layanan kami</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!--? Offer-services Start  -->
    <section class="offer-services pb-bottom2 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <span class="element">Pelayanan</span>
                        <h2>Pelayanan Yang Kami Tawarkan</h2>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <?php foreach (query()->table('layanan')->get() as $layanan) { ?>
                    <div class="col-lg-3 col-md-3">
                        <div class="card m-1" style="border-radius: 10px;">
                            <img class="card-img-top" src="<?= asset('uploads/layanan/' . $layanan['gambar']) ?>" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title text-center mt-3 mb-30">
                                    <?= $layanan['nama'] ?>
                                </h3>
                                <?php if (auth()->id()) { ?>
                                    <center><a href="<?php url('detail-layanan/' . $layanan['id']) ?>" class="btn-lg btn-primary">order / cek detail</a></center>
                                <?php } else { ?>
                                    <a href="<?= url('login') ?>" class="btn-lg btn-primary">login dulu</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Offer-services End  -->

    <!--? Services Area Start -->
    <section class="services-area pt-top border-bottom pb-20 mb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <span class="element">PROSES LAUNDRY</span>
                        <h2>Cara Kamai Melayani Anda</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src="<?= asset('img/icon/services-icon1.svg') ?>" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Kami Mengambil Pakaian Anda</a></h5>
                            <p>Pengambilan di lakukan segera seusai anda melakukan konfirmasi pemesanan / pembayaran sesuai dengan waktu yang telah di tentukan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src=" <?= asset('img/icon/services-icon2.svg') ?>" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Kami Mencuci Pakaian Anda</a></h5>
                            <p>Pengerjaan segera setelah pakaian anda sampai di tempat pencucuian, setelah pakaian anda keluar dari mesin. Hasilnya adalah pakaian yang berkilau </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src=" <?= asset('img/icon/services-icon3.svg') ?>" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Kami Mengantar Pakaian Anda</a></h5>
                            <p>Segera setelah semua proses selesai susuai dengan layanan yang anda pilih. Kami mengantar kembali pakaian anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->

</main>