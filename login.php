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
?>

<?php $title = 'Login' ?>
<?php include 'navbar.php' ?>

<div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div class="section-tittle white-text text-center">

          <h2>Login</h2>
        </div>
      </div>
    </div>

    <div class="row mx-auto align-items-center">
      <div class=" col-md-6">
        <div class="single-process text-center mb-30">
          <div class="process-ion">
            <span class="flaticon-search"></span>
          </div>
          <div class="process-cap">
            <h5>Login Sebagai Pencari Kerja</h5>
            <p>Temukan Pekerjaan yang akan Anda Sukai</p>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="browse-btn2 text-center mt-50">
                <a href="login-pelamar.php" class="border-btn2 text-white">LOGIN PENCARI KERJA</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="single-process text-center mb-30">
          <div class="process-ion">
            <span class="flaticon-tour"></span>
          </div>
          <div class="process-cap">
            <h5>Login Sebagai Perusahaan</h5>
            <p>Temukan Kandidat Berkualitas</p>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="browse-btn2 text-center mt-50">
                <a href="login-perusahaan.php" class="border-btn2 text-white">LOGIN PERUSAHAAN</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>