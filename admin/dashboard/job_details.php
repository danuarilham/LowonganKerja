<?php
session_start();

if (!isset($_SESSION["login_users"])) {
    header("Location: ../index.php");
    exit;
}

require '../../functions.php';

$id_pekerjaan = $_GET["id"];

$info = query("SELECT
	info_pekerjaan.*, 
	perusahaan.nama_perusahaan, 
	perusahaan.tentang, 
	perusahaan.website_perusahaan, 
	perusahaan.email_perusahaan, 
	perusahaan.logo_perusahaan, 
	lokasi_pekerjaan.nama_lokasi, 
	kategori_pekerjaan.nama_kategori
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
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi WHERE id_pekerjaan = $id_pekerjaan")[0];

?>

<?php $title = "Lowongan Kerja " . $info['judul'] . " " . $info['nama_perusahaan']; ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-8 mb-8">
                <h1 class="text-black font-weight-bold">Dashboard</h1>
                <div class="custom-breadcrumbs">
                    <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
                    <a href="list_pekerjaan.php"><span style="color: black;">Data Loker</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>Detail Pekerjaan</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcumb end -->

<main>
    <!-- job post company Start -->
    <div class="job-post-company pt-20 pb-20">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="shadow-sm">
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="job_details.php?id=<?= $info['id_pekerjaan'] ?>"><img src="../../upload/perusahaan/logo/<?= $info['logo_perusahaan'] ?>" alt="" width="100px" class="img-thumbnail"></a>
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="job_details.php?id=<?= $info['id_pekerjaan'] ?>">
                                        <h4><?= $info['judul'] ?></h4>
                                    </a>
                                    <ul>
                                        <li><strong>
                                                <?= $info['nama_perusahaan'] ?>
                                            </strong></li>
                                        <li><i class="fas fa-money-bill-alt"></i><?= $info['gaji'] ?></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i><?= $info['nama_lokasi'] ?></li>
                                        <li><i class="fas fa-graduation-cap"></i><?= $info['pendidikan'] ?></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-list-alt"></i><?= $info['nama_kategori'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <p><?= $info['deskripsi'] ?></p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Tanggung Jawab Pekerjaan : </h4>
                            </div>
                            <div style="white-space: pre-wrap;"><?= $info['tanggung_jawab'] ?></div>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Keahlian : </h4>
                            </div>
                            <div style="white-space: pre-wrap;"><?= $info['keahlian'] ?></div>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Waktu Bekerja : </h4>
                            </div>
                            <p><?= $info['waktu_bekerja'] ?></p>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Ringkasan Pekerjaan</h4>
                        </div>
                        <ul>
                            <li><strong>Posisi : </strong><span><?= $info['judul'] ?></span></li>
                            <li><strong>Kategori Pekerjaan : </strong><span><?= $info['nama_kategori'] ?></span></li>
                            <li><strong>Tingkat Pendidikan : </strong><span><?= $info['pendidikan'] ?></span></li>
                            <li><strong>Lokasi : </strong><span><?= $info['nama_lokasi'] ?></span></li>
                            <li><strong>Gender : </strong><span><?= $info['gender'] ?></span></li>
                            <li><strong>Status Kerja : </strong><span><?= $info['tipe'] ?></span></li>
                            <li><strong>Besaran Gaji : </strong><span><?= $info['gaji'] ?></span></li>
                        </ul>

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

    <center><h3 class="mb-4"><a href="list_pekerjaan.php" class="btn-link text-decoration-none ">
        <i class="ti-arrow-circle-left"></i>
    </center>
</main>

<?php include 'js.php' ?>