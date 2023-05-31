<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
// if(empty($_SESSION['id_company'])) {
//   header("Location: ../index.php");
//   exit();
// }

if (!isset($_SESSION["login_perusahaan"])) {
  header("Location: ../login-perusahaan.php");
  exit;
}

// require_once("../db.php");
require '../functions.php';

$id_perusahaan = $_SESSION['id_perusahaan'];

$posted = count(query("SELECT * FROM info_pekerjaan WHERE id_perusahaan = $id_perusahaan"));
$info = query("SELECT * FROM perusahaan WHERE id_perusahaan = $id_perusahaan")[0];

?>

<?php $title = 'Home | Perusahaan' ?>
<?php include 'navbar.php' ?>

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
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-info"></i> In this dashboard you are able to change your account settings, post and manage your jobs. Got a question? Do not hesitate to drop us a mail.
              </div>

              <div class="row">
                <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
                  <div class="container-fluid">
                    <div class="header-body">
                      <div class="row">
                        <div class="col-xl-4 col-lg-6">
                          <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">Job Posted</h5>
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
                        <div class="col-xl-4 col-lg-6">
                          <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                  <span class="h2 font-weight-bold mb-0">2,356</span>
                                </div>
                                <div class="col-auto">
                                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-chart-pie"></i>
                                  </div>
                                </div>
                              </div>
                              <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                <span class="text-nowrap">Since last week</span>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                          <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                  <span class="h2 font-weight-bold mb-0">924</span>
                                </div>
                                <div class="col-auto">
                                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                  </div>
                                </div>
                              </div>
                              <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                <span class="text-nowrap">Since yesterday</span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-browsers"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Application For Jobs</span>

                      <span class="info-box-number"><?php echo $total; ?></span>
                    </div>
                  </div>
                </div> -->
                </div>

              </div>
            </div>
          </div>
      </section>
    </div>

    <!-- JS here -->

    <?php include 'js.php' ?>

    </body>