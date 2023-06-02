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

<?php $title = 'Register'; ?>
<?php include 'navbar.php' ?>

<!-- How  Apply Process Start-->
<div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
  <div class="container">
    <!-- Section Tittle -->
    <div class="row">
      <div class="col-lg-12">
        <div class="section-tittle white-text text-center">
          <!-- <span>Apply process</span> -->
          <h2>Registrasi</h2>
        </div>
      </div>
    </div>
    <!-- Apply Process Caption -->
    <div class="row mx-auto align-items-center">
      <div class=" col-md-6">
        <div class="single-process text-center mb-30">
          <div class="process-ion">
            <span class="flaticon-search"></span>
          </div>
          <div class="process-cap">
            <h5>Daftar Sebagai Pencari Kerja</h5>
            <p>Buat akun untuk melamar pekerjaan yang Anda sukai</p>
            <br>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="browse-btn2 text-center mt-50">
                <a href="register-pelamar.php" class="border-btn2 text-white">REGISTRASI PENCARI KERJA</a>
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
            <h5>Daftar Sebagai Perusahaan</h5>
            <p>Pasang iklan lowongan agar terhubung dengan pencari kerja yang paling potensial</p>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="browse-btn2 text-center mt-50">
                <a href="register-perusahaan.php" class="border-btn2 text-white">REGISTRASI PERUSAHAAN</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>