<?php
$dashboard = query("SELECT * FROM perusahaan WHERE id_perusahaan = $id_perusahaan")[0];
?>

<div class="col-md-3 mb-5 ">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light menu-wrapper">

        <div class="mx-auto align-items-center mb-3">
            <img src="../upload/perusahaan/logo/<?= $dashboard['logo_perusahaan'] ?>" class="rounded mb-3 img-responsive center-block d-block mx-auto img-thumbnail wid" style="width: 150px;" alt="Avatar" />
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
                                <use xlink:href="#toggles2" />
                            </svg>
                            &nbsp; Profil Perusahaan
                        </a>
                    </li>
                    <li>
                        <a href="lowongan.php" class="nav-link link-dark <?php echo ($title == 'Buat Lowongan Kerja') ?  "active" : "" ?> " style="<?php echo ($title == 'Buat Lowongan Kerja') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#collection" />
                            </svg>
                            &nbsp; Buat Lowongan Kerja
                        </a>
                    </li>
                    <li>
                        <a href="list_pekerjaan.php" class="nav-link link-dark <?php echo ($title == 'Pekerjaan & Pelamar') ?  "active" : "" ?> " style="<?php echo ($title == 'Pekerjaan & Pelamar') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid" />
                            </svg>
                            &nbsp; Pekerjaan & Pelamar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>