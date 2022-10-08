<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Request <img src="<?= asset_setup('setup/paper-plane.png') ?>"
                        style="max-width: 30px;margin-top:-10px" alt="">
                </h4>
                <p class="opacity-75 ">
                    Di halaman ini anda bisa request ke controller anda.
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
                    <h5 class="card-title m-b-0">Prepare Request</h5>

                    <div class="card-controls">

                        <a href="#" class="js-card-fullscreen icon"></a>

                    </div>
                </div>
                <div class="card-body">


                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Controller </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4">

                                        <select style="width: 100%;" name="controller" id=""
                                            class="form-control js-select2 controller">
                                            <option value="" selected disabled>-Pilih Controller-</option>

                                            <?php

                                                    foreach (glob(dir_project()."/controller/*") as $key => $see) {

                                                        $see = explode('/', $see);

                                                        if ($see[5] == "Auth") { }else{ ?>
                                            <option value="<?= $see[5] ?>"><?= $see[5] ?></option>
                                            <?php } ?>
                                            <?php } ?>

                                        </select>
                                        <small id="emailHelp" class="form-text text-muted">Buat file anda tersambung
                                            dengan controller.</small>

                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="function_controller" class="form-control function">
                                        <small id="emailHelp" class="form-text text-muted">Function
                                            controller.</small>
                                    </div>
                                    <div class="col">
                                        <button tip title="Run" type="button" class="btn run btn-sm btn-success">
                                            <i class="mdi mdi-play"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <ul class="nav nav-tabs tab-line" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#line-home" role="tab"
                                    aria-controls="home" aria-selected="true">Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#line-profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Response</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="line-home" role="tabpanel"
                                aria-labelledby="home-tab">

                                <button type="button" class="btn btn-success btn-sm shadow mb-3 mt-3 add-request">
                                    <i class="mdi mdi-plus"></i>
                                </button>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Key</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody class="data-request">
                                        <form class="cobbb" action="<?= controllerSetup('SetupAuth@store') ?>"
                                            method="POST" enctype="multipart/form-data">
                                            <tr>
                                                <td>
                                                    <input name="key[]" type="text" class="form-control form-control-sm">
                                                </td>
                                                <td>
                                                    <input name="value[]" type="text"
                                                        class="form-control form-control-sm">
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade response-data mt-2" id="line-profile" role="tabpanel" aria-labelledby="profile-tab">

                                <div style="background-color: #353b48;padding:5px">

                                    <span style="color:white;border-bottom:1px solid orange">Body</span>

                                    <div class="status-response float-right pull-right"></div>
                                    
                                </div>

                                <table style="background-color: #f6f6f6; color:#2f3542;padding:5px;border-radius:4px;width:100%;">
                                    <thead class="table-response">

                                    </thead>
                                </table>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>

</div>


</div>