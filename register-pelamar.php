<?php

session_start();
if (isset($_SESSION["login_pelamar"])) {
  header("Location: user/index.php");
  exit;
} else if (isset($_SESSION["login_perusahaan"])) {
  header("Location: perusahaan/index.php");
  exit;
}

require 'functions.php';

if (isset($_POST['register_pelamar'])) {
  if (registrasi_pelamar($_POST) > 0) {
    echo "
            <script>
            alert('Registrasi berhasil!');
            </script>";
  } else {
    echo "
            <script>
            alert('Registrasi gagal!');
            </script>";
  }
}
?>

<?php $title = 'Registrasi Pelamar' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-10 mb-10">
        <h1 class="text-black font-weight-bold">Registrasi Pencari Kerja</h1>
        <div class="custom-breadcrumbs">
          <a href="index.php"><span style="color: black;">Home</span></a> <span class="mx-2 slash">/</span>
          <a href="register.php"><span style="color: black;">Registrasi</span></a> <span class="mx-2 slash">/</span>
          <span class="text-black"><strong>Registrasi Pencari Kerja</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcumb end -->

<!-- form register -->
<section class="site-section ">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 mx-auto align-items-center">
        <h2 class="mb-4 mt-50">Daftar sebagai Pencari Kerja</h2>
        <form action="" method="post" class="p-4 border rounded">

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="email">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Alamat email" name="username" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password">Password</label>
              <input type="password" id="password" class="form-control" placeholder="Password" name="password_pelamar" required>
            </div>
          </div>
          <div class="row form-group mb-4">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password2">Konfirmasi Password</label>
              <input type="password" id="password2" class="form-control" placeholder="Konfirmasi Password" name="password_pelamar2" required>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Register" class="btn px-4 btn-primary text-white" name="register_pelamar">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<!-- end form register -->

<?php include 'footer.php'?>