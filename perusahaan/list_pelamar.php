<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_perusahaan"])) {
    header("Location: ../login-perusahaan.php");
    exit;
}

require '../functions.php';

$id_perusahaan = $_SESSION['id_perusahaan'];
$id_pekerjaan = $_GET["id"];

$info_pekerjaan = query("SELECT
	info_pekerjaan.id_pekerjaan, 
	info_pekerjaan.judul, 
	perusahaan.nama_perusahaan, 
	perusahaan.logo_perusahaan, 
	lokasi_pekerjaan.nama_lokasi, 
	kategori_pekerjaan.nama_kategori, 
	info_pekerjaan.tipe, 
	info_pekerjaan.gaji, 
	info_pekerjaan.pendidikan
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
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi WHERE info_pekerjaan.id_pekerjaan = $id_pekerjaan")[0];



$detail_lamaran = query("SELECT
	detail_lamaran.*, 
	info_pekerjaan.*, 
	perusahaan.id_perusahaan, 
	perusahaan.nama_perusahaan, 
	perusahaan.email_perusahaan, 
	perusahaan.telepon_perusahaan, 
	perusahaan.website_perusahaan, 
	perusahaan.logo_perusahaan, 
	perusahaan.id_lokasi, 
	perusahaan.tentang
FROM
	detail_lamaran
	INNER JOIN
	info_pekerjaan
	ON 
		detail_lamaran.id_pekerjaan = info_pekerjaan.id_pekerjaan
	INNER JOIN
	perusahaan
	ON 
		info_pekerjaan.id_perusahaan = perusahaan.id_perusahaan
	INNER JOIN
	pelamar
	ON 
		detail_lamaran.id_pelamar = pelamar.id_pelamar WHERE detail_lamaran.id_pekerjaan = $id_pekerjaan");

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
                    <a href="list_pekerjaan.php"><span style="color: black;">Daftar Pekerjaan</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>Daftar Pelamar</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcumb end -->

<main>
    <div class="container mb-5">
        <div class="row">
            <?php include 'dashboard.php' ?>
            <div class="col-lg-9 container">

                <h3 class="mb-4"><a href="list_pekerjaan.php" class="btn-link text-decoration-none ">
                        <i class="ti-arrow-circle-left"></i>
                    </a> &nbsp; Daftar Pelamar</h3>

                <!-- info pekerjaan -->
                <div class="shadow-sm">
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.php?id=<?= $info_pekerjaan['id_pekerjaan'] ?>"><img src="../upload/perusahaan/logo/<?= $info_pekerjaan['logo_perusahaan'] ?>" alt="" width="100px" class="img-thumbnail"></a>
                            </div>
                            <div class="job-tittle job-tittle2">
                                <a href="job_details.php?id=<?= $info_pekerjaan['id_pekerjaan'] ?>">
                                    <h4><?= $info_pekerjaan['judul'] ?></h4>
                                </a>
                                <ul>
                                    <li><?= $info_pekerjaan['nama_perusahaan'] ?></li>
                                    <li><i class="fas fa-money-bill-alt"></i>Rp. <?= $info_pekerjaan['gaji'] ?></li>
                                    <li><i class="fas fa-clock"></i><?= $info_pekerjaan['tipe'] ?></li>
                                </ul>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i><?= $info_pekerjaan['nama_lokasi'] ?></li>
                                    <li><i class="fas fa-graduation-cap"></i><?= $info_pekerjaan['pendidikan'] ?></li>
                                    <li><i class="fas fa-list-alt"></i><?= $info_pekerjaan['nama_kategori'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tabel pelamar -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No. </th>
                            <th scope="col" colspan="2">Pelamar</th>
                            <th scope="col">Pendidikan Terakhir</th>
                            <th scope="col">Pengalaman (Lama Bekerja)</th>
                            <th scope="col">Tahun Kelahiran</th>
                            <th scope="col">Tanggal Melamar</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($detail_lamaran as $row) { ?>
                            <tr>
                                <th class="align-middle" scope="row"><?= $i ?></th>
                                <td class="align-middle"><img src="../upload/user/foto/<?= $row['foto_pelamar'] ?>" alt="" width="60px" class="rounded"></td>
                                <td><?= $row['nama_pelamar'] ?>
                                    <br> <span style="color: gray;"><small>
                                        <?= $row['kota_kab_pelamar'] ?>
                                    </small></span>
                                </td>
                                <td class="align-middle"><?= $row['pendidikan_terakhir'] ?></td>
                                <td class="align-middle"><?= $row['lama_bekerja'] ?></td>
                                <td class="align-middle"><?= $row['tahun_kelahiran'] ?></td>
                                <td class="align-middle"><small>
                                    <?= $row['tanggal_lamar'] ?>
                                </small></td>
                                <td class="align-middle"><button class="btn-primary rounded" type="button"><small>Detail</small></button></td>
                            </tr>
                            <?php $i++ ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- JS here -->



</body>