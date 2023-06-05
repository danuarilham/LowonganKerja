<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_users"])) {
    header("Location: ../index.php");
    exit;
}

require '../../functions.php';

$info_pekerjaan = query(
"SELECT
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
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi 
    ORDER BY id_pekerjaan asc");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['hapus_pekerjaan'])) {
    // cek apakah data berhasil dihapus atau tidak
    if (hapus_pekerjaan($_POST) > 0) {
        echo "
            <script>
                alert('Data lowongan kerja berhasil dihapus!');
                document.location.href = 'list_pekerjaan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data lowongan kerja gagal dihapus!');
                document.location.href = 'list_pekerjaan.php';
            </script>
        ";
    }
}


?>

<?php $title = 'Pekerjaan & Pelamar' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-8 mb-8">
                <h1 class="text-black font-weight-bold">Data Lowongan Kerja</h1>
                <div class="custom-breadcrumbs">
                    <a href="home.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>Data Loker</strong></span>
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
                <h3 class="mb-4">Data Pekerjaan yang Diposting</h3>
                <?php foreach ($info_pekerjaan as $row) { ?>
                    <div class="shadow-sm">
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="job_details.php?id=<?= $row['id_pekerjaan'] ?>"><img src="../../upload/perusahaan/logo/<?= $row['logo_perusahaan'] ?>" alt="" width="80px" class="img-thumbnail"></a>
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="job_details.php?id=<?= $row['id_pekerjaan'] ?>">
                                        <h4><?= $row['judul'] ?></h4>
                                    </a>
                                    <ul>
                                        <li><?= $row['nama_perusahaan'] ?></li>
                                        <li><i class="fas fa-money-bill-alt"></i><?= $row['gaji'] ?></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i><?= $row['nama_lokasi'] ?></li>
                                        <li><i class="fas fa-graduation-cap"></i><?= $row['pendidikan'] ?></li>
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
                                        <button class="btn-success rounded-lg mb-2">
                                            <i class="ti-pencil"></i>
                                            <a href="job_details.php?id=<?= $row['id_pekerjaan'] ?>">Detail Loker</a>
                                        </button>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <form action="" method="post">
                                            <input type="hidden" name="id_pekerjaan" value="<?= $row['id_pekerjaan'] ?>">
                                            <button type="submit" class="btn-danger rounded-lg mb-2" onclick="return confirm('Yakin untuk menghapus lowongan pekerjaan?')" name="hapus_pekerjaan">
                                                <i class="ti-close"></i>
                                                Hapus Pekerjaan
                                            </button>
                                        </form>
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

</body>