<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_users"])) {
  header("Location: ../index.php");
  exit;
}

require '../../functions.php';

$id_perusahaan = $_SESSION['id_users'];

$posted = count(query("SELECT * FROM perusahaan"));

$jumlahPelamar = count(query("SELECT * FROM pelamar"));

$jumlahLoker = count(query("SELECT * FROM info_pekerjaan"));

$info = query("SELECT * FROM perusahaan WHERE id_perusahaan = $id_perusahaan")[0];

?>

<?php $title = 'Home | Admin' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-8 mb-8">
        <h1 class="text-black font-weight-bold">Dashboard</h1>
        <div class="custom-breadcrumbs">
          <a href="home.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
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

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <?php include 'dashboard.php' ?>

            <div class="col-md-9 bg-white padding-2">

              <h3>Overview</h3>
              <div class="row">
                <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
                  <div class="container-fluid">
                    <div class="header-body">
                      <div class="row">
                        <div class="col-xl-6 col-lg-6">
                          <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">Jumlah User Perusahaan</h5>
                                  <span class="h2 font-weight-bold mb-0"><?= $posted ?></span>
                                </div>
                                <div class="col-auto">
                                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-chart-bar"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                          <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">Jumlah User Pelamar</h5>
                                  <span class="h2 font-weight-bold mb-0"><?= $jumlahPelamar ?></span>
                                </div>
                                <div class="col-auto">
                                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-chart-pie"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-xl-6 col-lg-6">
                          <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Postingan Loker</h5>
                                  <span class="h2 font-weight-bold mb-0"><?= $jumlahLoker ?></span>
                                </div>
                                <div class="col-auto">
                                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-chart-pie"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
      </section>
    </div>

    <!-- JS here -->

    <?php include 'js.php' ?>

    </body>