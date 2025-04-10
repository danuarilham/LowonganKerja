<?php
session_start();

if (!isset($_SESSION["login_pelamar"])) {
    header("Location: ../login-pelamar.php");
    exit;
}

require '../functions.php';

// pagination
$jumlahDataPerHalaman = 7;
$jumlahData = count(query("SELECT * FROM info_pekerjaan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


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
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi ORDER BY info_pekerjaan.id_pekerjaan DESC LIMIT $awalData, $jumlahDataPerHalaman");



$info_lokasi = query('SELECT * FROM lokasi_pekerjaan');

// tombol cari ditekan
if (isset($_GET["cari"])) {

    // pagination
    if (!isset($_GET["lokasi"])) {
        $count_pekerjaan = count_cari($_GET["keyword"], '');
        $jumlahData = count($count_pekerjaan);
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
        $info_pekerjaan = cari($_GET["keyword"], '', $awalData, $jumlahDataPerHalaman);
        $found = $jumlahData;
        $keyword = $_GET["keyword"];
    } else {
        $count_pekerjaan2 = count_cari($_GET["keyword"], $_GET["lokasi"]);
        $jumlahData = count($count_pekerjaan2);
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
        $info_pekerjaan = cari($_GET["keyword"], $_GET["lokasi"], $awalData, $jumlahDataPerHalaman);
        $found = $jumlahData;
        $keyword = $_GET["keyword"];
        $lokasi = $_GET["lokasi"];
    }
} else {
    $found = count(count_all());
}
?>

<?php $title = 'Cari Lowongan Kerja' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-10 mb-10">
                <h1 class="text-black font-weight-bold">Dashboard</h1>
                <div class="custom-breadcrumbs">
                    <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>Cari Lowongan Kerja</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcumb end -->

<main>
    <!-- Search Box -->
    <div class="slider-area mt-3">
        <div class="d-flex align-items-center">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- form -->
                        <form action="" method="get" class="search-box">
                            <div class="input-form">
                                <input type="text" placeholder="Posisi atau Perusahaan" name="keyword" autocomplete="off" autofocus value="<?php echo (isset($_GET["cari"])) ? $keyword : "" ?>">
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

    <div class="job-listing-area pt-40 pb-40">
        <div class="container">
            <div class="row">

                    <!-- Job Category Listing End -->
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span><?= $found ?> Pekerjaan ditemukan</span>
                                        <!-- Select job items start -->
                                        <!-- <div class="select-job-items">
                                            <span>Sort by</span>
                                            <select name="select">
                                                <option value="">None</option>
                                                <option value="">job list</option>
                                                <option value="">job list</option>
                                                <option value="">job list</option>
                                            </select>
                                        </div> -->
                                        <!--  Select job items End-->
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            <!-- single-job-content -->
                            <?php foreach ($info_pekerjaan as $row) { ?>
                                <div class="shadow-sm">
                                    <div class="single-job-items mb-30">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="job_details.php?id=<?= $row['id_pekerjaan'] ?>"><img src="../upload/perusahaan/logo/<?= $row['logo_perusahaan'] ?>" alt="" width="100px" class="img-thumbnail"></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="job_details.php?id=<?= $row['id_pekerjaan'] ?>">
                                                    <h4><?= $row['judul'] ?></h4>
                                                </a>
                                                <ul>
                                                    <li><strong>
                                                            <?= $row['nama_perusahaan'] ?>
                                                        </strong></li>
                                                    <li><i class="fas fa-money-bill-alt"></i><?= $row['gaji'] ?></li>
                                                </ul>
                                                <ul>
                                                    <li><i class="fas fa-map-marker-alt"></i><?= $row['nama_lokasi'] ?></li>
                                                    <li><i class="fas fa-graduation-cap"></i><?= $row['pendidikan'] ?></li>
                                                </ul>
                                                <ul>
                                                    <li><i class="fas fa-list-alt"></i><?= $row['nama_kategori'] ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="f-right">
                                            <a class="genric-btn <?php if ($row['tipe'] == "Full Time") {
                                                                        echo "danger";
                                                                    } else if ($row['tipe'] == "Part Time") {
                                                                        echo "primary";
                                                                    } else {
                                                                        echo "success";
                                                                    } ?>-border circle" href="job_details.php?id=<?= $row['id_pekerjaan'] ?>"><?= $row['tipe'] ?></a>
                                            <!-- <span>7 hours ago</span> -->
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
    <!--Pagination Start  -->
    <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <?php if ($halamanAktif > 1) { ?>
                                    <li class="page-item"><a class="page-link" href="?keyword=<?php echo (isset($_GET["cari"])) ? $keyword : "" ?>&lokasi=<?php echo (isset($_GET["lokasi"])) ? $lokasi : "" ?>&cari=&halaman=<?= $halamanAktif - 1; ?>"><span class="ti-angle-left"></span></a></li>
                                <?php } ?>

                                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) { ?>
                                    <?php if ($i == $halamanAktif) { ?>
                                        <li class="page-item active">
                                            <a href="?keyword=<?php echo (isset($_GET["cari"])) ? $keyword : "" ?>&lokasi=<?php echo (isset($_GET["lokasi"])) ? $lokasi : "" ?>&cari=&halaman=<?= $i ?>" class="page-link"><?= $i; ?></a>
                                        </li>
                                    <?php } else { ?>
                                        <li class="page-item">
                                            <a href="?keyword=<?php echo (isset($_GET["cari"])) ? $keyword : "" ?>&lokasi=<?php echo (isset($_GET["lokasi"])) ? $lokasi : "" ?>&cari=&halaman=<?= $i ?>" class="page-link"><?= $i; ?></a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>

                                <?php if ($halamanAktif < $jumlahHalaman) { ?>
                                    <li class="page-item"><a class="page-link" href="?keyword=<?php echo (isset($_GET["cari"])) ? $keyword : "" ?>&lokasi=<?php echo (isset($_GET["lokasi"])) ? $lokasi : "" ?>&cari=&halaman=<?= $halamanAktif + 1; ?>"><span class=" ti-angle-right"></span></a></li>
                                <?php } ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'js.php' ?>