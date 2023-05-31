<?php
$dashboard = query("SELECT * FROM perusahaan WHERE id_perusahaan = $id_perusahaan")[0];
?>

<div class="col-md-3 mb-5 ">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light menu-wrapper">

        <div class="mx-auto align-items-center mb-3">
            <img src="../assets/img/logo/<?= $dashboard['logo_perusahaan'] ?>" class="rounded-circle mb-3 img-responsive center-block d-block mx-auto" style="width: 150px;" alt="Avatar" />
            <h5 class="mb-2" style="text-align: center;"><strong><?= $dashboard['nama_perusahaan'] ?></strong></h5>
            <!-- <p class="text-muted">Web designer <span class="badge bg-primary">PRO</span></p> -->
        </div>
        <div class="menu-wrapper">
            <div class="main-menu">
                <ul class="nav nav-pills flex-column mb-auto menu-wrapper">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link link-dark <?php echo ($title == 'Home | Perusahaan') ?  "active" : "" ?> " style="<?php echo ($title == 'Home | Perusahaan') ?  "" : "color: black;" ?>">

                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home" />
                            </svg>
                            &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="profil_perusahaan.php" class="nav-link link-dark <?php echo ($title == 'Profil Perusahaan') ?  "active" : "" ?> " style="<?php echo ($title == 'Profil Perusahaan') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2" />
                            </svg>
                            &nbsp; Profil Perusahaan
                        </a>
                    </li>
                    <li>
                        <a href="lowongan.php" class="nav-link link-dark <?php echo ($title == 'Buat Lowongan Kerja') ?  "active" : "" ?> " style="<?php echo ($title == 'Buat Lowongan Kerja') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table" />
                            </svg>
                            &nbsp; Buat Lowongan Kerja
                        </a>
                    </li>
                    <li>
                        <a href="postingan.php" class="nav-link link-dark <?php echo ($title == 'Postingan Pekerjaan') ?  "active" : "" ?> " style="<?php echo ($title == 'Postingan Pekerjaan') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid" />
                            </svg>
                            &nbsp; Postingan Pekerjaan
                        </a>
                    </li>
                    <li>
                        <a href="list_pelamar.php" class="nav-link link-dark <?php echo ($title == 'Daftar Pelamar') ?  "active" : "" ?> " style="<?php echo ($title == 'Daftar Pelamar') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle" />
                            </svg>
                            &nbsp; Daftar Pelamar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>