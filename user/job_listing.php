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

                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)" d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                    </svg>
                                </div>
                                <h4>Filter Pekerjaan</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Job Category Listing start -->
                    <div class="job-category-listing mb-50">
                        <!-- single one -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Minimal Pendidikan</h4>
                            </div>
                            <!-- minimal pendidikan start -->
                            <div class="select-job-items2">
                                <select name="pendidikan" id="pendidikan" class="form-select">
                                    <option value="" class="text-black" disabled selected hidden>Pilih</option>
                                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                                    <option value="Diploma/D1/D2/D3">Diploma/D1/D2/D3</option>
                                    <option value="Sarjana / S1">Sarjana / S1</option>
                                    <option value="Master / S2">Master / S2</option>
                                    <option value="Doctor / S3">Doctor / S3</option>
                                </select>

                            </div>
                            <!--  minimal pendidikan End-->

                            <!-- tipe pekerjaan start -->
                            <div class="select-Categories pt-80 pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Tipe Pekerjaan</h4>
                                </div>
                                <label class="container">Full Time
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Part Time
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <!-- <label class="container">Remote
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label> -->
                                <label class="container">Freelance
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- tipe pekerjaan End -->
                        </div>

                        <button class="genric-btn primary" onclick="return alert('Fitur filter sedang dikembangkan')">Filter</button>
                    </div>
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