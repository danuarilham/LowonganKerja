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

$id = $_GET["id"];

$info = query("SELECT
	info_pekerjaan.id_pekerjaan, 
	info_pekerjaan.judul, 
	perusahaan.nama_perusahaan, 
	perusahaan.tentang, 
	perusahaan.website_perusahaan, 
	perusahaan.email_perusahaan, 
	perusahaan.logo_perusahaan, 
	lokasi_pekerjaan.nama_lokasi, 
	kategori_pekerjaan.nama_kategori, 
	info_pekerjaan.tipe, 
	info_pekerjaan.gaji, 
	info_pekerjaan.pendidikan, 
	info_pekerjaan.deskripsi
FROM
	info_pekerjaan
	INNER JOIN
	kategori_pekerjaan
	ON 
		info_pekerjaan.id_kategori = kategori_pekerjaan.id_kategori
	INNER JOIN
	perusahaan
	ON 
		info_pekerjaan.id_perusahaan = perusahaan.id_perusahaan
	INNER JOIN
	lokasi_pekerjaan
	ON 
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi WHERE id_pekerjaan = $id")[0];

// tombol cari ditekan
// if (isset($_POST["cari"])) {
//     $info_pekerjaan = cari($_POST["keyword"]);
// }
?>

<?php $title = "Lowongan Kerja " . $info['judul'] . " " . $info['nama_perusahaan'] ;?>
<?php include 'navbar.php'?>
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>UI/UX Designer</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="assets/img/logo/<?= $info['logo_perusahaan'] ?>" alt="" width="100px"></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4><?= $info['judul'] ?></h4>
                                    </a>
                                    <ul>
                                        <li><?= $info['nama_perusahaan'] ?></li>
                                        <li><i class="fas fa-money-bill-alt"></i>Rp. <?= $info['gaji'] ?></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i><?= $info['nama_lokasi'] ?></li>
                                        <li><i class="fas fa-university"></i><?= $info['pendidikan'] ?></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Deskripsi Pekerjaan</h4>
                                </div>
                                <p><?= $info['deskripsi'] ?></p>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                                <ul>
                                    <li>System Software Development</li>
                                    <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                                    <li>Research and code , libraries, APIs and frameworks</li>
                                    <li>Strong knowledge on software development life cycle</li>
                                    <li>Strong problem solving and debugging skills</li>
                                </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                                <ul>
                                    <li>3 or more years of professional design experience</li>
                                    <li>Direct response email experience</li>
                                    <li>Ecommerce website design experience</li>
                                    <li>Familiarity with mobile and web apps preferred</li>
                                    <li>Experience using Invision a plus</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Overview</h4>
                            </div>
                            <ul>
                                <li>Kategori Pekerjaan : <span><?= $info['nama_kategori'] ?></span></li>
                                <li>Tingkat Pendidikan : <span><?= $info['pendidikan'] ?></span></li>
                                <li>Lokasi : <span><?= $info['nama_lokasi'] ?></span></li>
                                <!-- <li>Vacancy : <span>02</span></li> -->
                                <li>Status Kerja : <span><?= $info['tipe'] ?></span></li>
                                <li>Besaran Gaji : <span>Rp. <?= $info['gaji'] ?></span></li>
                                <!-- <li>Application date : <span>12 Sep 2020</span></li> -->
                            </ul>
                            <div class="apply-btn2">
                                <a href="#" class="btn">Apply Now</a>
                            </div>
                        </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Informasi Perusahaan</h4>
                            </div>
                            <span><?= $info['nama_perusahaan'] ?></span>
                            <p><?= $info['tentang'] ?></p>
                            <ul>
                                <li>Name: <span><?= $info['nama_perusahaan'] ?> </span></li>
                                <li>Web : <span><?= $info['website_perusahaan'] ?></span></li>
                                <li>Email: <span><?= $info['email_perusahaan'] ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>

    <?php include 'footer.php'?>