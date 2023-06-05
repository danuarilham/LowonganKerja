<?php
session_start();
require 'functions.php';

if (isset($_SESSION["login_users"])) {
  header("Location: dashboard/home.php");
  exit;
} else {
  
}

if (isset($_POST['login_users'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);

    // if (password_verify($password, $row['password_perusahaan'])) {
    if ($password === $row['password']) {
      // set session
      
      $_SESSION["login_users"] = true;
      $_SESSION['id_users'] = $row['id_admin'];

      header("Location: dashboard/home.php");
      exit;
    }
  }

  $error = true;
}
?>

<?php $title = 'Login Dashboard Admin' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-10 mb-10">
        <h1 class="text-black font-weight-bold">Login Admin</h1>
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
        <h2 class="mb-4 mt-50">Login sebagai Admin</h2>
        <form action="" method="post" class="p-4 border rounded">

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="email">Username</label>
              <input type="text" id="email" class="form-control" placeholder="Username" name="username" required>
            </div>
          </div>
          <div class="row form-group mb-4">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password">Password</label>
              <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
            </div>
          </div>
          <?php if (isset($error)) { ?>
            <p style="color: red;" class="font-italic"><strong>Username / password salah!</strong></p>
          <?php } ?>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" name="login_users" value="Login" class="btn px-4 btn-primary text-white">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<!-- end form register -->
