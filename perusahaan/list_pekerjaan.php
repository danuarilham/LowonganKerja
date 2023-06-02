<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_perusahaan"])) {
    header("Location: ../login-perusahaan.php");
    exit;
}

require '../functions.php';

$id_perusahaan = $_SESSION['id_perusahaan'];

$info_pekerjaan = query("SELECT
	info_pekerjaan.id_pekerjaan, 
	info_pekerjaan.judul, 
	perusahaan.nama_perusahaan, 
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
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi WHERE info_pekerjaan.id_perusahaan = $id_perusahaan");

?>

<?php $title = 'Pekerjaan & Pelamar' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-8 mb-8">
                <h1 class="text-black font-weight-bold">Dashboard</h1>
                <div class="custom-breadcrumbs">
                    <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>Daftar Pekerjaan</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcumb end -->

<main>
    <div class="container">
        <div class="row">
            <?php include 'dashboard.php' ?>
            <div class="col-md-8 bg-white padding-2 container">
                <h3 class="mb-4">Daftar Pekerjaan</h3>
                <?php foreach ($info_pekerjaan as $row) { ?>
                    <div class="shadow-sm">
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="job_details.php?id=<?= $row['id_pekerjaan'] ?>"><img src="../upload/perusahaan/logo/<?= $row['logo_perusahaan'] ?>" alt="" width="80px" class="img-thumbnail"></a>
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="job_details.php?id=<?= $row['id_pekerjaan'] ?>">
                                        <h4><?= $row['judul'] ?></h4>
                                    </a>
                                    <ul>
                                        <li><?= $row['nama_perusahaan'] ?></li>
                                        <li><i class="fas fa-money-bill-alt"></i>Rp. <?= $row['gaji'] ?></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i><?= $row['nama_lokasi'] ?></li>
                                        <li><i class="fas fa-university"></i><?= $row['pendidikan'] ?></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-clock"></i><?= $row['tipe'] ?></li>
                                        <li><i class="fas fa-list-alt"></i><?= $row['nama_kategori'] ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="my-auto job-tittle job-tittle2">
                                <ul>
                                    <li>
                                        <button class="btn-primary rounded-lg mb-2">
                                            <i class="ti-user"></i>
                                            <a href="list_pelamar.php?id=<?= $row['id_pekerjaan'] ?>">Daftar Pelamar</a>
                                        </button>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <button class="btn-success rounded-lg">
                                            <i class="ti-pencil"></i>
                                            <a href="list_pelamar.php?id=<?= $row['id_pekerjaan'] ?>">Edit Pekerjaan</a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<!-- JS here -->

<?php include 'js.php' ?>

</body>