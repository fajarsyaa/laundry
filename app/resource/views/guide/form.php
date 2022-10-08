<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Create Data Guide
                </h4>
                <p class="opacity-75 ">
                    Create guide.
                </p>


            </div>
        </div>
    </div>
</div>

<div class="container  pull-up">

    <div class="row">


        <div class="col-lg-12 m-b-30">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title m-b-0">Create Data</h5>

                    <div class="card-controls">

                        <a href="#" class="js-card-fullscreen icon"></a>

                    </div>
                </div>
                <div class="card-body">

                    <form action="<?= controllerSetup('SetupGuide@store') ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control form-control-sm" name="judul" type="text"
                                                value="" placeholder="Judul">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control form-control-sm" name="kategori" type="text"
                                                value="" placeholder="Kategori">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">URL Thumbnail</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control form-control-sm" name="url_thumbnail" type="text"
                                                value="img/guides/random-06.svg" placeholder="URL">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Box Class</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="box_class" id="" class="form-control js-select2">
                                                <option value="bg-primary">Primary</option>
                                                <option value="bg-info">Info</option>
                                                <option value="bg-danger">Danger</option>
                                                <option value="bg-success">Success</option>
                                                <option value="bg-warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" id="summernote" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered mt-5 datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>URL Thumbnail</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (query()->table('guide')->get() as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['judul'] ?></td>
                                    <td><?= $value['kategori'] ?></td>
                                    <td><?= $value['url_thumbnail'] ?></td>
                                    <td><?= $value['deskripsi'] ?></td>
                                    <td>
                                        <a data-content="<?= $value['judul'] ?>" href="" data-url="<?= controllerSetup('guideController@destroy', $value['id']) ?>" class="btn btn-danger btn-sm shadow alert-delete">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


</div>