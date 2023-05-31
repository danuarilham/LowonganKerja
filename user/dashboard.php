<?php
$dashboard = query("SELECT * FROM pelamar WHERE id_pelamar = $id_pelamar")[0];
?>

<div class="col-md-3 mb-5">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light menu-wrapper">

        <div class="mx-auto align-items-center mb-3">
            <img src="../upload/user/foto/<?= $dashboard['foto_pelamar'] ?>" class=" rounded-circle mb-3 img-responsive center-block d-block mx-auto img-thumbnail" style="width: 150px;" alt="Avatar" />
            <h5 class="mb-2" style="text-align: center;"><strong><?= $dashboard['nama_pelamar'] ?></strong></h5>
            <!-- <p class="text-muted">Web designer <span class="badge bg-primary">PRO</span></p> -->
        </div>
        <div class="menu-wrapper">
            <div class="main-menu">
                <ul class="nav nav-pills flex-column mb-auto menu-wrapper">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link link-dark <?php echo ($title == 'Home | Pelamar') ?  "active" : "" ?> " style="<?php echo ($title == 'Home | Pelamar') ?  "" : "color: black;" ?>">

                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home" />
                            </svg>
                            &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="profil_pelamar.php" class="nav-link link-dark <?php echo ($title == 'Profil Saya') ?  "active" : "" ?> " style="<?php echo ($title == 'Profil Saya') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle" />
                            </svg>
                            &nbsp; Profil Saya
                        </a>
                    </li>
                    <li>
                        <a href="job_listing.php" class="nav-link link-dark <?php echo ($title == 'Cari Lowongan Kerja') ?  "active" : "" ?> " style="<?php echo ($title == 'Cari Lowongan Kerja') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table" />
                            </svg>
                            &nbsp; Cari Lowongan Kerja
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav-link link-dark <?php echo ($title == 'Postingan Pekerjaan') ?  "active" : "" ?> " style="<?php echo ($title == 'Postingan Pekerjaan') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid" />
                            </svg>
                            &nbsp; Lamaran Kerja
                        </a>
                    </li>
                    <li>
                        <a href="edit_profil.php" class="nav-link link-dark <?php echo ($title == 'Edit Profil') ?  "active" : "" ?> " style="<?php echo ($title == 'Edit Profil') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle" />
                            </svg>
                            &nbsp; Edit Profil
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav-link link-dark <?php echo ($title == 'Daftar Pelamar') ?  "active" : "" ?> " style="<?php echo ($title == 'Daftar Pelamar') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle" />
                            </svg>
                            &nbsp; Pengaturan Akun
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>