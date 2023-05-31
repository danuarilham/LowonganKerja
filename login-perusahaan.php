<?php
session_start();
require 'functions.php';

// cek cookie
// if (isset($_COOKIE['login']))
// {
//     if ($_COOKIE["login"] == 'true')
//     {
//         $_SESSION["login"] = true;
//     }
// }

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];

  // ambil username_perusahaan berdasarkan id
  $result = mysqli_query($conn, "SELECT username_perusahaan FROM perusahaan WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username_perusahaan
  if ($key === hash('sha256', $row['username_perusahaan'])) {
    $_SESSION["login_perusahaan"] = true;
  }
}

if (isset($_SESSION["login_perusahaan"])) {
  header("Location: perusahaan/index.php");
  exit;
}


if (isset($_POST['login_perusahaan'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM perusahaan WHERE username_perusahaan = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);

    // if (password_verify($password, $row['password_perusahaan'])) {
    if ($password === $row['password_perusahaan']) {
      // set session
      // $_SESSION['name'] = $row['companyname'];
      $_SESSION["login_perusahaan"] = true;
      $_SESSION['id_perusahaan'] = $row['id_perusahaan'];

      // cek remember me
      if (isset($_POST["remember"])) {
        // buat cookie
        // setcookie('login', 'true', time() + 60);
        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row['username']), time() + 60);
      }

      header("Location: perusahaan/index.php");
      exit;
    }
  }

  $error = true;
}
?>

<?php $title = 'Login Perusahaan'?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-10 mb-10">
        <h1 class="text-black font-weight-bold">Login Perusahaan</h1>
        <div class="custom-breadcrumbs">
          <a href="index.php"><span style="color: black;">Home</span></a> <span class="mx-2 slash">/</span>
          <a href="login.php"><span style="color: black;">Login</span></a> <span class="mx-2 slash">/</span>
          <span class="text-black"><strong>Login Perusahaan</strong></span>
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
        <h2 class="mb-4 mt-50">Login sebagai Perusahaan</h2>
        <form action="" method="post" class="p-4 border rounded">

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="email">Email</label>
              <input type="text" id="email" class="form-control" placeholder="Email address" name="username" required>
            </div>
          </div>
          <div class="row form-group mb-4">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password">Password</label>
              <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
            </div>
          </div>
          <?php if (isset($error)) { ?>
            <p style="color: red; font-style: italic;">Email / password salah!</p>
          <?php } ?>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" name="login_perusahaan" value="Login" class="btn px-4 btn-primary text-white">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<!-- end form register -->

<?php include 'footer.php'?>