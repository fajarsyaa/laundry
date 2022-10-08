<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo mb-35">
                                <a href="index.html"><img src="<?= asset('img/logo/logo.png') ?>" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Memberikan solusi untuk para orang orang sibuk dalam urusan membersihkan pakaian. Dengan menggunakan layanan yang kami sediakan</p>
                                </div>
                            </div>
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Layanan </h4>
                            <ul>
                                <li><a href="#">- cuci bersih</a></li>
                                <li><a href="#">- cuci cuci dan setrika</a></li>
                                <li><a href="#">- cuci sepatu dan tas</a></li>
                                <li><a href="#">- cuci boneka kecil dan sedang</a></li>
                                <li><a href="#">- cuci boneka besar</a></li>
                                <li><a href="#">- setrika rapi</a></li>
                                <li><a href="#">- cuci gorden dan selimut</a></li>
                                <li><a href="#">- cuci khusus jeans</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Info Kontak</h4>
                            <ul>
                                <li class="number"><a href="https://wa.me/0895341248153">(+62) 895341248153</a></li>
                                <li><a href="https://gmail.com">starWash@gmail.com</a></li>
                                <li><a href="#">6/2 kaligoro MJK-IDN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area section-bg2" data-background="<?= asset('img/gallery/footer-bg.png') ?>">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-12 ">
                        <div class="footer-copy-right text-center">
                            <p>
                                STARWASH LAUNDRY
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="<?= asset('js/vendor/modernizr-3.5.0.min.js') ?>"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= asset('js/vendor/jquery-1.12.4.min.js') ?>"></script>
<script src="<?= asset('js/popper.min.js') ?>"></script>
<script src="<?= asset('js/bootstrap.min.js') ?>"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= asset('js/jquery.slicknav.min.js') ?>"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= asset('js/owl.carousel.min.js') ?>"></script>
<script src="<?= asset('js/slick.min.js') ?>"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?= asset('js/wow.min.js') ?>"></script>
<script src="<?= asset('js/animated.headline.js') ?>"></script>
<script src="<?= asset('js/jquery.magnific-popup.js') ?>"></script>

<!-- Date Picker -->
<script src="<?= asset('js/gijgo.min.js') ?>"></script>
<!-- Nice-select, sticky -->
<script src="<?= asset('js/jquery.nice-select.min.js') ?>"></script>
<script src="<?= asset('js/jquery.sticky.js') ?>"></script>
<!-- Progress -->
<script src="<?= asset('js/jquery.barfiller.js') ?>"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="<?= asset('js/jquery.counterup.min.js') ?>"></script>
<script src="<?= asset('js/waypoints.min.js') ?>"></script>
<script src="<?= asset('js/jquery.countdown.min.js') ?>"></script>
<script src="<?= asset('js/hover-direction-snake.min.js') ?>"></script>

<!-- contact js -->
<script src="<?= asset('js/contact.js') ?>"></script>
<script src="<?= asset('js/jquery.form.js') ?>"></script>
<script src="<?= asset('js/jquery.validate.min.js') ?>"></script>
<script src="<?= asset('js/mail-script.js') ?>"></script>
<script src="<?= asset('js/jquery.ajaxchimp.min.js') ?>"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= asset('js/plugins.js') ?>"></script>
<script src="<?= asset('js/main.js') ?>"></script>

<!-- sweet alert -->
<script src="<?= asset('plugins/sweetalert2@11') ?>"></script>
<script>
    <?php
    if (isset($_SESSION["title_alert"])) {

        $title      = $_SESSION["title_alert"];
        $alert      = $_SESSION["message_alert"];
        $type_alert = $_SESSION["type_alert"];

    ?>

        Swal.fire(
            '<?= $title ?>',
            '<?= $alert ?>',
            '<?= $type_alert ?>'
        );

    <?php
    }
    unset($_SESSION["title_alert"]);
    unset($_SESSION["message_alert"]);
    unset($_SESSION["type_alert"]);
    ?>
</script>

</body>

</html>