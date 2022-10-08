<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>Login Register</title>

    <link rel="stylesheet" href="<?php echo asset_setup("vendor/pace/pace.css") ?> ">
    <script src="<?php echo asset_setup("vendor/pace/pace.min.js") ?> "></script>
    <!--vendors-->
    <link rel="stylesheet" type="text/css" href="<?php echo asset_setup("vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_setup("vendor/jquery-scrollbar/jquery.scrollbar.css") ?>">
    <link rel="stylesheet" href="<?php echo asset_setup("vendor/select2/css/select2.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset_setup("vendor/jquery-ui/jquery-ui.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset_setup("vendor/daterangepicker/daterangepicker.css") ?>">
    <link rel="stylesheet" href="<?php echo asset_setup("vendor/timepicker/bootstrap-timepicker.min.css") ?>">
    <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset_setup("fonts/jost/jost.css") ?>">
    <!--Material Icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo asset_setup("fonts/materialdesignicons/materialdesignicons.min.css") ?>">
    <!--Bootstrap + atmos Admin CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo asset_setup("css/atmos.min.css") ?>">
    <!-- Additional library for page -->

</head>
<style>
    .bg-login {
        background-image: url("<?= asset("img/wallpaperflare.com_wallpaper.jpg") ?>");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body class="jumbo-page  bg-login">

    <main class="admin-main mt-5">

        <div class="container mt-5">
            <div class="card mx-auto" style=" width: 300px;top:150px;">
                <h5 class="card-header text-center mb-2">LOGIN</h5>
                <div class="card-body">
                    <?php

                    if (@$error_login) {
                    ?>

                        <div class="alert alert-border-danger  alert-dismissible fade show" role="alert">
                            <div class="d-flex">
                                <div class="icon">
                                    <i class="icon mdi mdi-alert-circle-outline"></i>
                                </div>
                                <div class="content">
                                    <strong>Error !</strong> <?= $error_login ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>

                        </div>

                    <?php }
                    session_destroy(); ?>

                    <form class="needs-validation" action="<?= controller("Auth/AuthController@login") ?>" method="POST">
                        <div class="form-row">
                            <div class="form-group floating-label col-md-12">
                                <label>Email</label>
                                <input name="email" type="email" required class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group floating-label col-md-12">
                                <label>Password</label>
                                <input name="password" autocomplete="new-password" type="password" required class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>

                    </form>
                    <p class="text-right p-t-10">
                        Belum punya akun? <a href="<?= url("backend/auth/register") ?>" class="text-underline">Daftar</a>
                    </p>
                </div>
            </div>
        </div>

    </main>


    <script src="<?php echo asset_setup("vendor/jquery/jquery.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/jquery-ui/jquery-ui.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/popper/popper.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/bootstrap/js/bootstrap.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/select2/js/select2.full.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/jquery-scrollbar/jquery.scrollbar.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/listjs/listjs.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/moment/moment.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/daterangepicker/daterangepicker.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/bootstrap-notify/bootstrap-notify.min.js") ?>"></script>
    <script src="<?php echo asset_setup("js/atmos.min.js") ?>"></script>
    <script src="<?php echo asset_setup("vendor/jquery.validate/jquery.validate.min.js") ?>"></script>
    <script src="<?php echo asset_setup("js/form-validate.js") ?>"></script>
    <!--page specific scripts for demo-->

</body>

</html>