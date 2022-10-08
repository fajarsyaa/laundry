<section class="admin-content">
    <div class=" bg-dark m-b-30 ">
        <div class="container">
            <div class="row">
                <div class="col-8 m-auto text-white p-t-40 p-b-90">

                    <h1 class="fw-300 text-center">Apa yang dapat kami bantu?
                    </h1>
                    <p class="p-t-30 form-dark">
                        <input type="search" placeholder="Cari sesuatu" class=" form-control form-control-lg">
                    </p>

                </div>
            </div>
        </div>

    </div>
    <div class="container pull-up">
        <div class="row m-b-90">
            
            <?php foreach ($guide as $key => $value) { ?>

            <div class="col-lg-3 col-md-6">
                <a href="<?= controllerSetup('SetupGuide@edit', $value['id']) ?>" class="card shadow-lg guide-item m-b-30  <?= $value['box_class'] ?>">
                    <div class="card-body text-white">

                        <h4 class=" p-t-20 "><?= $value['judul'] ?></h4>
                        <p>
                            Baca Selengkapnya ...
                        </p>

                    </div>
                    <div class="text-center">
                        <img class="card-img" src="<?= asset_setup($value['url_thumbnail']) ?>" alt="">
                    </div>
                </a>
            </div>

            <?php } ?>

        </div>
    </div>

</section>