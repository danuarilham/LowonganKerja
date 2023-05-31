<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
// if(empty($_SESSION['id_company'])) {
//   header("Location: ../index.php");
//   exit();
// }

if (!isset($_SESSION["login_pelamar"])) {
  header("Location: ../login-pelamar.php");
  exit;
}

// require_once("../db.php");
require '../functions.php';

$id_pelamar = $_SESSION['id_pelamar'];

// $posted = count(query("SELECT * FROM info_pekerjaan WHERE id_pelamar = $id_pelamar"));
$info = query("SELECT * FROM pelamar WHERE id_pelamar = $id_pelamar")[0];

?>

<?php $title = 'Home | Pelamar' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-10 mb-10">
        <h1 class="text-black font-weight-bold">Dashboard</h1>
        <div class="custom-breadcrumbs">
          <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
          <span class="text-black"><strong>Home</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcumb end -->

<main>

  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <section class="content-header">
        <div class="container mb-5">
          <div class="row">
            <?php include 'dashboard.php' ?>

            <div class="col-md-8 bg-white padding-2 container">
              <?php if (($info['status_akun'] == 0)) {
                echo '
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-info"></i> &nbsp; Penting! Untuk melamar pekerjaan, pastikan profil Anda telah dilengkapi dengan baik dan resume terbaru Anda telah diunggah. Terima kasih!
              </div>';
              } else {
                echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Anda sudah melengkapi profil.</strong> Sekarang Anda sudah bisa untuk melamar pekerjaan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              } ?>

              <div class="row ">
                <div class="text-center mx-auto">
                  <h3 class="font-weight-bold">Anda belum melengkapi profil</h3>
                  <p>
                    Berikut cara melamar pekerjaan :
                  </p>
                  <p>
                    1. Lengkapi Profil <br>
                    2. Upload Resume Anda <br>
                    3. Cari Lowongan dan Lamar Pekerjaan
                  </p>
                  <button class="btn-primary rounded"><a href="edit_profil.php">+ Lengkapi Profil</a></button>
                </div>

              </div>
            </div>
          </div>
      </section>
    </div>

    <!-- JS here -->

    <?php include 'js.php' ?>

    </body>