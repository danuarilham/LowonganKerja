<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_perusahaan"])) {
    header("Location: ../login-perusahaan.php");
    exit;
}

require '../functions.php';

$id_perusahaan = $_SESSION['id_perusahaan'];
$id_pekerjaan = $_GET["jobid"];
$id_lamaran = $_GET["id"];

$detail_lamaran = query("SELECT
	detail_lamaran.*, 
	info_pekerjaan.*, 
	perusahaan.nama_perusahaan, 
	perusahaan.logo_perusahaan, 
    lokasi_pekerjaan.nama_lokasi,
    kategori_pekerjaan.nama_kategori
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
    INNER JOIN
	kategori_pekerjaan
	ON 
		info_pekerjaan.id_kategori = kategori_pekerjaan.id_kategori
    WHERE
    detail_lamaran.id_lamaran = $id_lamaran")[0];

?>


<?php $title = 'Lamaran Kerja' ?>
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
                    <a href="list_pelamar.php?jobid=<?= $id_pekerjaan ?>"><span style="color: black;">Daftar Pelamar</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>Detail Pelamar</strong></span>
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
            <div class="col-lg-8 container">

                <h3 class="mb-4"><a href="list_pelamar.php?jobid=<?= $id_pekerjaan ?>" class="btn-link text-decoration-none ">
                        <i class="ti-arrow-circle-left"></i>
                    </a> &nbsp; Detail Lamaran</h3>

                <h5><strong>Pekerjaan yang dilamar :</strong></h5>
                <!-- info pekerjaan -->
                <div class="shadow-sm">
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="job_details.php?id=<?= $detail_lamaran['id_pekerjaan'] ?>"><img src="../upload/perusahaan/logo/<?= $detail_lamaran['logo_perusahaan'] ?>" alt="" width="100px" class="img-thumbnail"></a>
                            </div>
                            <div class="job-tittle job-tittle2">
                                <a href="job_details.php?id=<?= $detail_lamaran['id_pekerjaan'] ?>">
                                    <h4><?= $detail_lamaran['judul'] ?></h4>
                                </a>
                                <ul>
                                    <li><?= $detail_lamaran['nama_perusahaan'] ?></li>
                                    <li><i class="fas fa-money-bill-alt"></i>Rp. <?= $detail_lamaran['gaji'] ?></li>
                                    <li><i class="fas fa-clock"></i><?= $detail_lamaran['tipe'] ?></li>
                                </ul>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i><?= $detail_lamaran['nama_lokasi'] ?></li>
                                    <li><i class="fas fa-graduation-cap"></i><?= $detail_lamaran['pendidikan'] ?></li>
                                    <li><i class="fas fa-list-alt"></i><?= $detail_lamaran['nama_kategori'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="mb-4"><strong>Tanggal melamar : </strong><?= $detail_lamaran['tanggal_lamar'] ?></h5>

                <!-- tabel pelamar -->
                <h5 class="mb-4"><strong>Resume :</strong></h5>
                <div class="border p-2 w-75 mx-auto">
                    <div class="mb-3">
                        <img src="../upload/user/foto/<?= $detail_lamaran['foto_pelamar'] ?>" class=" mb-3 img-responsive center-block d-block img-thumbnail" style="width: 170px;" alt="Avatar" />
                    </div>

                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td class=""><?= $detail_lamaran['nama_pelamar'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Email</th>
                                <td><?= $detail_lamaran['email_pelamar'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Nomor Telepon / WA </th>
                                <td><?= $detail_lamaran['telepon_pelamar'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td><?= $detail_lamaran['jenis_kelamin'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Tahun Kelahiran</th>
                                <td><?= $detail_lamaran['tahun_kelahiran'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Alamat</th>
                                <td><?= $detail_lamaran['alamat_pelamar'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Kota / Kabupaten</th>
                                <td><?= $detail_lamaran['kota_kab_pelamar'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Pendidikan Terakhir</th>
                                <td><?= $detail_lamaran['pendidikan_terakhir'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Lama Bekerja (Pengalaman)</th>
                                <td><?= $detail_lamaran['lama_bekerja'] ?></td>
                            </tr>

                            <tr>
                                <th scope="row">File CV</th>
                                <td><a title="Unduh CV" href="../upload/user/resume/<?= $detail_lamaran['resume'] ?>" download="CV_<?= $detail_lamaran['nama_pelamar'] ?>" class="btn-link"><?= $detail_lamaran['resume'] ?></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="mb-4 mt-4"><strong>Pesan Promosi :</strong></h5>
                <textarea name="pesan_promosi" id="pesan_promosi" cols="75" rows="7" readonly><?= $detail_lamaran['pesan_promosi'] ?></textarea>

            </div>
        </div>
    </div>
</main>
<!-- JS here -->



</body>