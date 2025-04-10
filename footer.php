<?php
$jumlahLoker = query("SELECT count(*) FROM info_pekerjaan")[0];
$jumlahPelamar = query("SELECT count(*) FROM pelamar")[0];
$jumlahPerusahaan = query("SELECT count(*) FROM perusahaan")[0];

?>

<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-bg footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-6 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>Tentang Kami</h4>
                                <div class="footer-pera">
                                    <p>Kami adalah platform yang bertujuan untuk memudahkan pencarian pekerjaan di Solo Raya. Dengan visi kami untuk menciptakan kesempatan kerja yang lebih baik bagi masyarakat, kami menyediakan berbagai lowongan pekerjaan menarik dari perusahaan-perusahaan terkemuka di Solo Raya dan sekitarnya.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Info Kontak</h4>
                            <ul>
                                <li>
                                    <p>Alamat : Jl. Adi Sucipto No.38, Kerten, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57143 - Indonesia</p>
                                </li>
                                <li><a href="tel:+6287760536345">Telepon : +62 87760536345</a></li>
                                <li><a href="kurnyawandanuar@gmail.com">Email : kurnyawandanuar@gmail.com</a></li>
                                <li><a href="https://www.instagram.com/danuarilham/?hl=id">Instagram : danuarilham</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row footer-wejed justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                        <a href="index.php"><img src="assets/img/logo/logo3.png" alt="" width="200" class="rounded"></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span><?= $jumlahLoker['count(*)'] - 1 ?>+</span>
                        <p>Lowongan Pekerjaan</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span><?= $jumlahPelamar['count(*)'] ?></span>
                        <p>Pencari Kerja Terdaftar</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span><?= $jumlahPerusahaan['count(*)'] ?></span>
                        <p>Perusahaan Terdaftar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="footer-copy-right">
                            <p>
                                Developed by <a href="https://github.com/danuarilham" target="_blank">@danuarilham</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="footer-social f-right">
                            <a href="https://www.facebook.com/danuar.kurnyawan"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://x.com/yohanes_1945"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/price_rangs.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

</body>

</html>