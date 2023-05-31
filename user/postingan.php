<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
// if(empty($_SESSION['id_company'])) {
//   header("Location: ../index.php");
//   exit();
// }

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

$info = query("SELECT
	info_pekerjaan.id_pekerjaan, 
	info_pekerjaan.judul, 
	perusahaan.nama_perusahaan, 
	perusahaan.tentang, 
	perusahaan.website_perusahaan, 
    perusahaan.logo_perusahaan, 
	perusahaan.email_perusahaan, 
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
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi WHERE id_pekerjaan = 1")[0];

$lokasi = query("SELECT * FROM lokasi_pekerjaan");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['update_profil_perusahaan'])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah_perusahaan($_POST) > 0) {
        echo "
            <script>
                alert('Data perusahaan berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data perusahaan gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>



<?php $title = 'Postingan Pekerjaan' ?>
<?php include 'navbar.php' ?>




<main>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container">
                    <div class="row">

                        <?php include 'dashboard.php' ?>

                        <div class="col-md-8 bg-white padding-2 container">
                            <h3 class="mb-4">Postingan Pekerjaan</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No. </th>
                                        <th scope="col">Nama Pekerjaan</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Gaji</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($info_pekerjaan as $row) { ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $row['judul'] ?></td>
                                            <td><?= $row['nama_kategori'] ?></td>
                                            <td>Rp. <?= $row['gaji'] ?></td>
                                            <td><button class="btn-primary rounded" type="button" data-bs-toggle="modal" data-bs-target="#detail">Detail</button></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class=" modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pekerjaan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- job post company Start -->
                        <div class="job-post-company ">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <!-- Left Content -->
                                    <div class="col-xl-7 col-lg-8">
                                        <!-- job single -->
                                        <div class="shadow-sm">
                                            <div class="single-job-items mb-50">
                                                <div class="job-items">
                                                    <div class="company-img company-img-details">
                                                        <a href="#"><img src="../assets/img/logo/<?= $info['logo_perusahaan'] ?>" alt="" width="100px"></a>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-secondary rounded" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn-primary rounded">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- JS here -->

        <?php include 'js.php' ?>

        </body>