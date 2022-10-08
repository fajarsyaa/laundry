<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wash</title>

    <link rel="stylesheet" href="<?= asset('dist/css/bootstrap.min.css') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS here -->
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/slicknav.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/progressbar_barfiller.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/gijgo.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/animated-headline.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/fontawesome-all.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/slick.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>

<body>
    <!-- ? Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= asset('img/preloader.png') ?>" alt="" width="200px">
                    <h1 class="text-center">PreloadeR</h1>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <!-- Logo -->
                <div class="header-left">
                    <div class="logo">
                        <a href="home"><img src="<?= asset('img/logo/logo.png') ?>" alt=""></a>
                    </div>
                    <div class="menu-wrapper  d-flex align-items-center">
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li class="<?= activeClass('home') ?>">
                                        <a href="<?= url('home') ?>">Home</a>
                                    </li>

                                    <li class="<?= activeClass('services') ?>">
                                        <a href="<?= url('services') ?>">Layanan</a>
                                    </li>

                                    <!-- <li class="<?= activeClass('about') ?>">
                                        <a href="<?= url('about') ?>">Tentang</a>
                                    </li> -->

                                    <!-- <li class="<?= activeClass('contact') ?>">
                                        <a href="<?= url('contact') ?>">Kontak</a>
                                    </li> -->

                                    <li class="<?= activeClass('cucianku') ?>">
                                        <a href="<?= url('cucianku') ?>">Keranjang</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="header-right d-none d-lg-block">
                    <?php if (auth()->id()) { ?>
                        <a href="<?= url('logout') ?>" class="btn hero-btn">logout</a>
                    <?php } else { ?>
                        <a href="<?= url('login') ?>" class="btn hero-btn">login / register</a>
                    <?php } ?>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>