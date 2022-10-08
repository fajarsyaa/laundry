<div class=" bg-dark m-b-30 bg-stars">
    <div class="container">
        <div class="row">
            <div class="col-8 m-auto text-white p-t-40 p-b-90">

                <h1 class="fw-300 text-center">
                    Detail Guide
                </h1>

            </div>
        </div>
    </div>

</div>
<div class="container pull-up">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <div class="card shadow-lg">

                <div class="card-body">
                    <h2 class="m-b-0"><?= $data->judul ?></h2>
                    <div class="row">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-b-0 bg-transparent">
                                - <b><?= $data->kategori ?></b>
                            </ol>
                        </nav>
                    </div>
                    <?= $data->deskripsi ?>

                    <a href="data" class="btn btn-sm btn-primary shadow float-right mt-3">Kembali</a>

                </div>


            </div>
        </div>
    </div>
</div>
</section>