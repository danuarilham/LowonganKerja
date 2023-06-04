<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_pelamar"])) {
    header("Location: ../login-pelamar.php");
    exit;
}

require '../functions.php';

$id_pelamar = $_SESSION['id_pelamar'];

$info = query("SELECT * FROM pelamar WHERE id_pelamar = $id_pelamar")[0];

$detail_lamaran = query(
"SELECT
	detail_lamaran.id_lamaran, 
	detail_lamaran.tanggal_lamar, 
	info_pekerjaan.*, 
	perusahaan.nama_perusahaan, 
	perusahaan.logo_perusahaan, 
	lokasi_pekerjaan.nama_lokasi
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
		detail_lamaran.id_pelamar = pelamar.id_pelamar
	INNER JOIN
	lokasi_pekerjaan
	ON 
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi 
WHERE detail_lamaran.id_pelamar = $id_pelamar");

?>

<?php $title = 'Lamaran Kerja' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-10 mb-10">
                <h1 class="text-black font-weight-bold">Dashboard</h1>
                <div class="custom-breadcrumbs">
                    <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>Lamaran Kerja</strong></span>
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

            <div class="col-md-8 container mb-5">
                <h3 class="mb-4">Lamaran Kerja</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No. </th>
                            <th scope="col" colspan="2">Perusahaan</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Tanggal Melamar</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($detail_lamaran as $row) { ?>
                            <tr>
                                <th class="align-middle" scope="row"><?= $i ?></th>
                                <td class="align-middle"><img src="../upload/perusahaan/logo/<?= $row['logo_perusahaan'] ?>" alt="Logo Perusahaan" width="80px"></td>
                                <td class="align-middle"><?= $row['nama_perusahaan'] ?>
                                    <br> <span style="color: gray;"> <small>
                                            <i class="ti-location-pin"></i> <?= $row['nama_lokasi'] ?>
                                        </small></span>
                                </td>
                                <td class="align-middle"><?= $row['judul'] ?><br>
                                    <span style="color: gray;"> <small>
                                            <i class="ti-time"> </i><?= $row['tipe'] ?>
                                        </small></span>
                                </td>

                                <td class="align-middle"><small>
                                        <?= $row['tanggal_lamar'] ?>
                                    </small>
                                </td>
                                <td class="align-middle"><button class="btn-primary rounded" type="button"><a href="detail_lamaran.php?id=<?= $row['id_lamaran'] ?>"><small>Detail</small></a></button></td>
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