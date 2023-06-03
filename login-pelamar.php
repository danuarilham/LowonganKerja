<?php
session_start();
require 'functions.php';

if (isset($_SESSION["login_pelamar"])) {
  header("Location: user/index.php");
  exit;
} else if (isset($_SESSION["login_perusahaan"])) {
  header("Location: perusahaan/index.php");
  exit;
}


if (isset($_POST['login_pelamar'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM pelamar WHERE username_pelamar = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);

    // if (password_verify($password, $row['password_pelamar'])) {
    if ($password === $row['password_pelamar']) {
      // set session
      $_SESSION["login_pelamar"] = true;
      $_SESSION['id_pelamar'] = $row['id_pelamar'];

      header("Location: user/index.php");
      exit;
    }
  }

  $error = true;
}
?>

<?php $title = 'Login Pelamar' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-10 mb-10">
        <h1 class="text-black font-weight-bold">Login Pencari Kerja</h1>
        <div class="custom-breadcrumbs">
          <a href="index.php"><span style="color: black;">Home</span></a> <span class="mx-2 slash">/</span>
          <a href="login.php"><span style="color: black;">Login</span></a> <span class="mx-2 slash">/</span>
          <span class="text-black"><strong>Login Pencari Kerja</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcumb end -->

<!-- form login -->
<section class="site-section ">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 mx-auto align-items-center">
        <h2 class="mb-4 mt-50">Login sebagai Pencari Kerja</h2>
        <form action="" method="post" class="p-4 border rounded">

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="email">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Alamat email" name="username" required>
            </div>
          </div>
          <div class="row form-group mb-4">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password">Password</label>
              <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
            </div>
          </div>

          <?php if (isset($error)) { ?>
            <p style="color: red;" class="font-italic"><strong>Email / password salah!</strong></p>
          <?php } ?>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" name="login_pelamar" value="Login" class="btn px-4 btn-primary text-white">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<!-- end form register -->

<?php include 'footer.php' ?>