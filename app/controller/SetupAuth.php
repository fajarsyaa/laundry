<?php

    function store($request)
    {

        /* Remove AuthController.php with folder Auth */

        unlink(dir_project()."/controller/Auth/AuthController.php");
        rmdir(dir_project()."/controller/Auth");

        /* Remove all file Auth in backend views */

        foreach (glob(dir_project()."/resource/views/backend/Auth/*") as $key => $file) {

            unlink($file);

        }

        /* Remove folder Auth in backend views */

        rmdir(dir_project()."/resource/views/backend/Auth");


        if ($request->status == "true") {

            $cekTable = query()->table('users')->get();

            if (!$cekTable) {

                query()->raw("CREATE TABLE users (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, level VARCHAR(20) NULL)");

            }

            if ($request->auto_function) {

                controllerWithFunction($request);

            }else{

                controllerWithoutFunction($request);

            }

            $createConfigFile  = fopen(dir_project()."/app/config.php", "w") or die("Unable to open file!");

            $content = "<?php

    /* 
    * File ini untuk config auth & helper
    * ganti isi variable '$'helperName dengan nama helper anda, 
    * kemudian buat file helper anda di dalam folder app/core/(taruh disini)
    * pastikan nama helper anda bukan helper.php, karena kami sudah memakai nama itu
    */

    '$'helperName = '';

    /* untuk auth */

    '$'auth     = true; 

    '$'redirectAuth = '$request->redirect';
            ";

            $content = str_replace("'$'",'$',$content);

            fwrite($createConfigFile, $content);
            fclose($createConfigFile);

        }else{

            $createConfigFile  = fopen(dir_project()."/app/config.php", "w") or die("Unable to open file!");

            $content = "<?php

    /* 
    * File ini untuk config auth & helper
    * ganti isi variable '$'helperName dengan nama helper anda, 
    * kemudian buat file helper anda di dalam folder app/core/(taruh disini)
    * pastikan nama helper anda bukan helper.php, karena kami sudah memakai nama itu
    */

    '$'helperName = '';

    /* untuk auth */
    
    '$'auth     = false; 

    '$'redirectAuth = '$request->redirect';
            ";

            $content = str_replace("'$'",'$',$content);

            fwrite($createConfigFile, $content);
            fclose($createConfigFile);

            back();
            alertSetup('Berhasil','Berhasil diupdate!');

        }

        

    }

    function controllerWithFunction($request)
    {
        $contentControllerAuth = "<?php

    function register('$'request)
    {

        global '$'host;

        '$'email       = strtolower('$'request->email);
        '$'username    = strtolower('$'request->username);
        '$'password    = mysqli_real_escape_string('$'host, '$'request->password);

        '$'cek         = query()->table('users')->where('email', '$'email)->single();

        if ('$'cek->email) {

            '$'error_register = 'Email sudah ada, gunakkan email lain!';
            view('backend/auth/register.php', compact('error_register'));

        }else{

            session_start();

            query()->insert('users',[

                '$'username,
                '$'email,
                password_hash('$'password, PASSWORD_DEFAULT),
                'null'
    
            ]);

            '$'dataUsers = query()->table('users')->where('email', '$'email)->get();

            '$'dataUsers = assoc('$'dataUsers);

            sessionAuth('$'dataUsers);

            view('$request->redirect');

        }

    }

    function login('$'request)
    {

        session_start();

        '$'email    = '$'request->email;
        '$'password = '$'request->password;
        
        '$'cek = query()->table('users')->where('email', '$'email)->get();
    
        if (rows('$'cek) === 1) {

            '$'dataUsers = assoc('$'cek);

            if (password_verify('$'password, '$'dataUsers['password'])) {

                sessionAuth('$'dataUsers);

                view('$request->redirect');

            }else{

                '$'error_login = 'Sepertinya ada yang salah, pastikan email & password sudah benar';
                view('backend/auth/login', compact('error_login'));    

            }

        }else{

            '$'error_login = 'Sepertinya ada yang salah, pastikan email & password sudah benar';
            view('backend/auth/login', compact('error_login'));

        }
        
    }

    function logout()
    {
        unset('$'_SESSION['auth']);
        unset('$'_SESSION['auth_id']);
        unset('$'_SESSION['auth_email']);
        unset('$'_SESSION['auth_username']);
        unset('$'_SESSION['auth_level']);
        view('backend/auth/login');
    }

    function sessionAuth('$'dataUsers)
    {
        '$'_SESSION['auth']          = true;
        '$'_SESSION['auth_id']       = '$'dataUsers['id'];
        '$'_SESSION['auth_username'] = '$'dataUsers['username'];
        '$'_SESSION['auth_level']    = '$'dataUsers['level'];
        '$'_SESSION['auth_email']    = '$'dataUsers['email'];
    }

    /*[PandoraCode - Phoenix - Controller]*/
";

        $contentControllerAuth = str_replace("'$'",'$',$contentControllerAuth);

        $controllerName = "AuthController";

        /* Create folder & file auth in controller */
        mkdir(dir_project().'/controller/Auth');

        $fileController  = fopen(dir_project()."/controller/Auth/$controllerName.php", "w") or die("Unable to open file!");
        fwrite($fileController, $contentControllerAuth);
        fclose($fileController);

        /* Create folder & file auth in views */
        mkdir(dir_project().'/resource/views/backend/Auth');
        
        if (!empty($request->include_register)) {
            
            /* View register */
            $fileViewsRegister  = fopen(dir_project()."/resource/views/backend/Auth/register.php", "w") or die("Unable to open file!");
            fwrite($fileViewsRegister, viewRegister());
            fclose($fileViewsRegister);   
            
            /* View login */
            $fileViewsLogin  = fopen(dir_project()."/resource/views/backend/Auth/login.php", "w") or die("Unable to open file!");
            fwrite($fileViewsLogin, viewLogin());
            fclose($fileViewsLogin);

        }else{

            /* View login */
            $fileViewsLogin  = fopen(dir_project()."/resource/views/backend/Auth/login.php", "w") or die("Unable to open file!");
            fwrite($fileViewsLogin,  viewLoginWithoutRegister());
            fclose($fileViewsLogin);

        }


        alertSetup('Berhasil','berhasil diupdate!');

        back();
    }

    function controllerWithoutFunction($request)
    {
        $contentControllerAuth = "<?php";

        $controllerName = "AuthController";

        mkdir(dir_project().'/controller/Auth');

        $fileController  = fopen(dir_project()."/controller/Auth/$controllerName.php", "w") or die("Unable to open file!");

        fwrite($fileController, $contentControllerAuth);
        fclose($fileController);

        alertSetup('Berhasil','berhasil diupdate!');

        back();
    }

    function viewRegister()
    {
        $viewRegister = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-touch-fullscreen" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="default">
            <title>Pandoracode | Auth</title>
            <link rel="icon" type="image/x-icon" href="<?php echo asset_setup("img/logo.png") ?>" />
            <link rel="icon" href="<?php echo asset_setup("img/logo.png") ?>" type="image/png" sizes="16x16">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/pace/pace.css") ?> ">
            <script src="<?php echo asset_setup("vendor/pace/pace.min.js") ?> "></script>
            <!--vendors-->
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css") ?>">
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("vendor/jquery-scrollbar/jquery.scrollbar.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/select2/css/select2.min.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/jquery-ui/jquery-ui.min.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/daterangepicker/daterangepicker.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/timepicker/bootstrap-timepicker.min.css") ?>">
            <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
            <link rel="stylesheet" href="<?php echo asset_setup("fonts/jost/jost.css") ?>">
            <!--Material Icons-->
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("fonts/materialdesignicons/materialdesignicons.min.css") ?>">
            <!--Bootstrap + atmos Admin CSS-->
            <link rel="stylesheet" type="text/css" href="<?php echo asset_setup("css/atmos.min.css") ?>">
            <!-- Additional library for page -->
        
        </head>
        <style>
            .bg-register{
                background-image: url("<?= asset_setup("img/auth.svg") ?>");
            }
        </style>
        <body class="jumbo-page">
        
        <main class="admin-main  ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-4  bg-white">
                        <div class="row align-items-center m-h-100">
                            <div class="mx-auto col-md-8">
                                <form class="needs-validation" action="<?= controller("Auth/AuthController@register") ?>" method="POST">
                                    <h3 class="text-center p-b-20 fw-400">Register</h3>

                                    <?php

                                        if (@$error_register) {
                                    ?>

                                        <div class="alert alert-border-danger  alert-dismissible fade show" role="alert">
                                            <div class="d-flex">
                                                <div class="icon">
                                                    <i class="icon mdi mdi-alert-circle-outline"></i>
                                                </div>
                                                <div class="content">
                                                    <strong>Error !</strong> <?= $error_register ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    <?php } session_destroy(); ?>
        
                                    <div class="form-row">
        
                                        <div class="form-group floating-label col-md-12">
                                            <label>Username</label>
                                            <input type="text" name="username" required class="form-control" placeholder="Username">
                                        </div>
        
                                        <div class="form-group floating-label col-md-12">
                                            <label>Email</label>
                                            <input type="email" name="email" required class="form-control" placeholder="Email">
                                        </div>
        
                                        <div class="form-group floating-label col-md-12">
                                            <label>Password</label>
                                            <input name="password" autocomplete="new-password" type="password" required class="form-control" placeholder="Password" id="password">
                                        </div>
        
                                    </div>
                                    <p class="">
                                        <label class="cstm-switch">
                                            <input type="checkbox" checked name="option" value="1" class="cstm-switch-input">
                                            <span class="cstm-switch-indicator "></span>
                                            <span class="cstm-switch-description">  I agree to the Terms and Privacy. </span>
                                        </label>
                                    </p>
        
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Create Account</button>
        
                                </form>
                                <p class="text-right p-t-10">
                                    Sudah punya akun? <a href="<?= url("backend/auth/login") ?>" class="text-underline">masuk</a>
                                </p>
                            </div>
        
                        </div>
                    </div>';

        $viewRegister .= "<div class='col-lg-8 d-none d-md-block bg-cover bg-register'>

        </div>";

        $viewRegister .= '</div>
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
    </html>';

        return $viewRegister;
    }

    function viewLogin()
    {
        $viewLogin = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-touch-fullscreen" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="default">
            <title>Pandoracode | Auth</title>
            <link rel="icon" type="image/x-icon" href="<?php echo asset_setup("img/logo.png") ?>" />
            <link rel="icon" href="<?php echo asset_setup("img/logo.png") ?>" type="image/png" sizes="16x16">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/pace/pace.css") ?> ">
            <script src="<?php echo asset_setup("vendor/pace/pace.min.js") ?> "></script>
            <!--vendors-->
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css") ?>">
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("vendor/jquery-scrollbar/jquery.scrollbar.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/select2/css/select2.min.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/jquery-ui/jquery-ui.min.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/daterangepicker/daterangepicker.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/timepicker/bootstrap-timepicker.min.css") ?>">
            <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
            <link rel="stylesheet" href="<?php echo asset_setup("fonts/jost/jost.css") ?>">
            <!--Material Icons-->
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("fonts/materialdesignicons/materialdesignicons.min.css") ?>">
            <!--Bootstrap + atmos Admin CSS-->
            <link rel="stylesheet" type="text/css" href="<?php echo asset_setup("css/atmos.min.css") ?>">
            <!-- Additional library for page -->
        
        </head>
        <style>
            .bg-login{
                background-image: url("<?= asset_setup("img/login.svg") ?>");
            }
        </style>
        <body class="jumbo-page">
        
        <main class="admin-main  ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-4  bg-white">
                        <div class="row align-items-center m-h-100">
                            <div class="mx-auto col-md-8">
                                <h3 class="text-center p-b-20 fw-400">Login</h3>

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

                                <?php } session_destroy(); ?>

                                <form class="needs-validation" action="<?= controller("Auth/AuthController@login") ?>" method="POST">
                                    <div class="form-row">
                                        <div class="form-group floating-label col-md-12">
                                            <label>Email</label>
                                            <input name="email" type="email" required class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group floating-label col-md-12">
                                            <label>Password</label>
                                            <input name="password" autocomplete="new-password" type="password" required class="form-control" placeholder="Password" >
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
                    <div class="col-lg-8 d-none d-md-block bg-cover bg-login">

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
    </html>';

    return $viewLogin;

    }

    function viewLoginWithoutRegister()
    {
        $viewLogin = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-touch-fullscreen" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="default">
            <title>Pandoracode | Auth</title>
            <link rel="icon" type="image/x-icon" href="<?php echo asset_setup("img/logo.png") ?>" />
            <link rel="icon" href="<?php echo asset_setup("img/logo.png") ?>" type="image/png" sizes="16x16">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/pace/pace.css") ?> ">
            <script src="<?php echo asset_setup("vendor/pace/pace.min.js") ?> "></script>
            <!--vendors-->
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css") ?>">
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("vendor/jquery-scrollbar/jquery.scrollbar.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/select2/css/select2.min.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/jquery-ui/jquery-ui.min.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/daterangepicker/daterangepicker.css") ?>">
            <link rel="stylesheet" href="<?php echo asset_setup("vendor/timepicker/bootstrap-timepicker.min.css") ?>">
            <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
            <link rel="stylesheet" href="<?php echo asset_setup("fonts/jost/jost.css") ?>">
            <!--Material Icons-->
            <link rel="stylesheet" type="text/css"
                href="<?php echo asset_setup("fonts/materialdesignicons/materialdesignicons.min.css") ?>">
            <!--Bootstrap + atmos Admin CSS-->
            <link rel="stylesheet" type="text/css" href="<?php echo asset_setup("css/atmos.min.css") ?>">
            <!-- Additional library for page -->
        
        </head>
        <style>
            .bg-login{
                background-image: url("<?= asset_setup("img/login.svg") ?>");
            }
        </style>
        <body class="jumbo-page">
        
        <main class="admin-main  ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-4  bg-white">
                        <div class="row align-items-center m-h-100">
                            <div class="mx-auto col-md-8">
                                <h3 class="text-center p-b-20 fw-400">Login</h3>

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

                                <?php } session_destroy(); ?>

                                <form class="needs-validation" action="<?= controller("Auth/AuthController@login") ?>" method="POST">
                                    <div class="form-row">
                                        <div class="form-group floating-label col-md-12">
                                            <label>Email</label>
                                            <input name="email" type="email" required class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group floating-label col-md-12">
                                            <label>Password</label>
                                            <input name="password" autocomplete="new-password" type="password" required class="form-control" placeholder="Password" >
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>

                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-md-block bg-cover bg-login">

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
    </html>';

    return $viewLogin;

    }