<?php
session_start();

if (isset($_SESSION["login_pelamar"])) {
    header("Location: user/index.php");
    exit;
} else if (isset($_SESSION["login_perusahaan"])) {
    header("Location: perusahaan/index.php");
    exit;
}

require 'functions.php';

$info_lokasi = query('SELECT * FROM lokasi_pekerjaan');

?>

<?php $title = 'Home'; ?>
<?php include 'navbar.php' ?>

<main>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height pt align-items-center" data-background="assets/img/hero/hero.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-10 mt-120">
                            <div class="hero__caption">
                                <h1>Info Lowongan Kerja Bandung</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action="job_listing.php" method="get" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Posisi atau Perusahaan" name="keyword" autocomplete="off">
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select name="lokasi" id="select1">
                                            <option value="" hidden disabled selected>Pilih Lokasi</option>
                                            <?php foreach ($info_lokasi as $row) { ?>
                                                <option value="<?= $row['id_lokasi'] ?>"><?= $row['nama_lokasi'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-form">
                                    <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <div class="container mb-5">
        <div class="section-top-border">
            <h1 class="mb-30">Pencari Kerja</h1>
            <div class="row">
                <div class="col-md-8 mt-sm-20">
                    <h3>Temukan Pekerjaan yang akan Anda Sukai</h3>
                    <ul class="unordered-list mt-4">
                        <li>
                            <h5>Cari Pekerjaan dengan Mudah</h5>
                            <p>Eksplorasi banyak lowongan pekerjaan menarik, sesuai dengan keahlian dan minat Anda, dengan kemudahan pencarian dan aplikasi online yang cepat dan mudah.</p>
                            <p>
                        </li>
                        <li>
                            <h5>Hanya Perlu Perbarui Profil dan Unggah CV</h5>
                            <p>
                                Website kami hadir untuk memudahkanmu menemukan pekerjaan impian di Bandung. Segera perbarui profilmu, unggah CV, dan temukan peluang karir yang sesuai dengan minat dan keahlianmu
                            </p>
                        </li>
                    </ul>
                    <div class="pl-4 mt-4">
                        <button class="genric-btn primary circle e-large"><a href="register-pelamar.php">Register Pencari Kerja</a></button>
                        &nbsp;
                        <button class="genric-btn info circle e-large"><a href="job_listing.php">Cari Lowongan Kerja</a></button>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="assets/img/hero/source-candidates.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="section-top-border">
            <h1 class="mb-30">Perusahaan</h1>
            <div class="row">
                <div class="col-md-4">
                    <img src="assets/img/hero/see-better-applicants.jpg" alt="" class="img-fluid">
                </div>

                <div class="col-md-8">
                    <h3>Temukan Kandidat Berkualitas</h3>
                    <ul class="unordered-list mt-4">
                        <li>
                            <h5>Posting Pekerjaan dengan Mudah</h5>
                            <p>Posting lowongan pekerjaan dengan mudah dan temukan talenta berkualitas. Lihat profil pelamar yang melamar untuk memilih karyawan yang sesuai dengan kebutuhan perusahaan Anda.</p>
                            <p>
                        </li>
                        <li>
                            <h5>Manajemen Pelamar</h5>
                            <p>
                                Nikmati kemudahan dalam melihat dan memilih pelamar yang melamar. Temukan calon karyawan yang sesuai dengan visi dan kebutuhan perusahaan Anda.
                            </p>
                        </li>
                    </ul>
                    <div class="pl-4 mt-4">
                        <button class="genric-btn primary circle e-large"><a href="register-perusahaan.php">Register Perusahaan</a></button>
                        &nbsp;
                        <button class="genric-btn info circle e-large"><a href="login-perusahaan.php">Pasang Lowongan Kerja</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>