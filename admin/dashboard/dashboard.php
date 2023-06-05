<div class="col-md-3 mb-5 ">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light menu-wrapper">

        <div class="menu-wrapper">
            <div class="main-menu">
                <ul class="nav nav-pills flex-column mb-auto menu-wrapper">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link link-dark <?php echo ($title == 'Home | Admin') ?  "active" : "" ?> " style="<?php echo ($title == 'Home | Admin') ?  "" : "color: black;" ?>">

                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home" />
                            </svg>
                            &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="list_perusahaan.php" class="nav-link link-dark <?php echo ($title == 'List Perusahaan') ?  "active" : "" ?> " style="<?php echo ($title == 'List Perusahaan') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#toggles2" />
                            </svg>
                            &nbsp; User Perusahaan
                        </a>
                    </li>
                    <li>
                        <a href="list_user_pelamar.php" class="nav-link link-dark <?php echo ($title == 'List Pelamar') ?  "active" : "" ?> " style="<?php echo ($title == 'List Pelamar') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#collection" />
                            </svg>
                            &nbsp; User Pelamar
                        </a>
                    </li>
                    <li>
                        <a href="list_pekerjaan.php" class="nav-link link-dark <?php echo ($title == 'Pekerjaan & Pelamar') ?  "active" : "" ?> " style="<?php echo ($title == 'Pekerjaan & Pelamar') ?  "" : "color: black;" ?>">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid" />
                            </svg>
                            &nbsp; Data Loker
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>