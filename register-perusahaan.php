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

if (isset($_POST['register_perusahaan'])) {
  if (registrasi_perusahaan($_POST) > 0) {
    echo "
            <script>
            alert('Registrasi berhasil!');
            </script>";
  } else {
    echo mysqli_error($conn);
  }
}

$lokasi = query("SELECT * FROM lokasi_pekerjaan");

?>

<?php $title = 'Register Perusahaan'; ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-10 mb-10">
        <h1 class="text-black font-weight-bold">Registrasi</h1>
        <div class="custom-breadcrumbs">
          <a href="#"><span style="color: black;">Home</span></a> <span class="mx-2 slash">/</span>
          <span class="text-black"><strong>Registrasi</strong></span>
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
        <h2 class="mb-4 mt-50">Daftar sebagai Perusahaan</h2>
        <form action="" method="post" class="p-4 border rounded">

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black font-weight-bold" for="fname">Info Perusahaan</label>
              <hr class="mt-1 mb-1">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="nama_perusahaan">Nama Perusahaan (Usaha) <span style="color:red"> *</span></label>
              <input type="text" id="nama_perusahaan" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="telepon_perusahaan">Nomor HP/Telepon <span style="color:red"> *</span></label>
              <input type="tel" id="telepon_perusahaan" class="form-control" placeholder="Nomor HP/Telepon" name="telepon_perusahaan" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-6 mb-6 mb-md-0">
              <label class="text-black" for="lokasi">Lokasi <span style="color:red"> *</span></label>
              <select class="form-select" id="lokasi" name="id_lokasi" required>
                <option value="" class="text-black" disabled selected hidden>Lokasi</option>
                <?php foreach ($lokasi as $row) { ?>
                  <option value="<?= $row['id_lokasi'] ?>" class="text-black"><?= $row['nama_lokasi'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0 mt-20">
              <label class="text-black font-weight-bold">Info Login</label>
              <hr class="mt-1 mb-1">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="username_perusahaan">Email <span style="color:red"> *</span></label>
              <input type="text" id="username_perusahaan" class="form-control" placeholder="Email address" name="username_perusahaan" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password_perusahaan">Password <span style="color:red"> *</span></label>
              <input type="password" id="password_perusahaan" class="form-control" placeholder="Password" name="password_perusahaan" required>
            </div>
          </div>
          <div class="row form-group mb-4">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password_perusahaan2">Re-Type Password <span style="color:red"> *</span></label>
              <input type="password" id="password_perusahaan2" class="form-control" placeholder="Re-type Password" name="password_perusahaan2" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" name="register_perusahaan" class="btn px-4 btn-primary text-white" required>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<!-- end form register -->

<?php include 'footer.php' ?>