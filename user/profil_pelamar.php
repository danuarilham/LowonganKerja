<?php

session_start();

if (!isset($_SESSION["login_pelamar"])) {
  header("Location: ../login-pelamar.php");
  exit;
}

require '../functions.php';

$id_pelamar = $_SESSION['id_pelamar'];
$info = query("SELECT * FROM pelamar WHERE id_pelamar = $id_pelamar")[0];
?>

<?php $title = 'Profil Saya' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-10 mb-10">
        <h1 class="text-black font-weight-bold">Dashboard</h1>
        <div class="custom-breadcrumbs">
          <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
          <span class="text-black"><strong>Profil Saya</strong></span>
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
              <h3 class="mb-4">Profil Saya</h3>

              <?php if (($info['status_akun'] == 0)) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Anda belum melengkapi profil!</strong> Silakan lengkapi profil dan upload CV anda agar bisa melamar pekerjaan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              } ?>

              <div class="mb-3">
                <img src="../upload/user/foto/<?= $info['foto_pelamar'] ?>" class=" mb-3 img-responsive center-block d-block img-thumbnail" style="width: 170px;" alt="Avatar" />
              </div>

              <table class="table table-hover table-sm">
                <tbody>
                  <tr>
                    <th scope="row">Nama Lengkap</th>
                    <td class="w-75" <?php echo ($info['nama_pelamar'] == "") ? "class='table-danger'" : "" ?>><?= $info['nama_pelamar'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Email</th>
                    <td <?php echo ($info['email_pelamar'] == "") ? "class='table-danger'" : "" ?>><?= $info['email_pelamar'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Nomor Telepon / WA </th>
                    <td <?php echo ($info['telepon_pelamar'] == "") ? "class='table-danger'" : "" ?>><?= $info['telepon_pelamar'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td <?php echo ($info['jenis_kelamin'] == "") ? "class='table-danger'" : "" ?>><?= $info['jenis_kelamin'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Tahun Kelahiran</th>
                    <td <?php echo ($info['tahun_kelahiran'] == "") ? "class='table-danger'" : "" ?>><?= $info['tahun_kelahiran'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Alamat</th>
                    <td <?php echo ($info['alamat_pelamar'] == "") ? "class='table-danger'" : "" ?>><?= $info['alamat_pelamar'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Kota / Kabupaten</th>
                    <td <?php echo ($info['kota_kab_pelamar'] == "") ? "class='table-danger'" : "" ?>><?= $info['kota_kab_pelamar'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Pendidikan Terakhir</th>
                    <td <?php echo ($info['pendidikan_terakhir'] == "") ? "class='table-danger'" : "" ?>><?= $info['pendidikan_terakhir'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Lama Bekerja (Pengalaman)</th>
                    <td <?php echo ($info['lama_bekerja'] == "") ? "class='table-danger'" : "" ?>><?= $info['lama_bekerja'] ?></td>
                  </tr>

                  <tr>
                    <th scope="row">File CV</th>
                    <td <?php echo ($info['resume'] == "") ? "class='table-danger'" : "" ?>><a href="../upload/user/resume/<?= $info['resume'] ?>" download="CV_<?= $info['nama_pelamar'] ?>" class="btn-link" ><?= $info['resume'] ?></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
    </body>