<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_users"])) {
    header("Location: ../index.php");
    exit;
}

require '../../functions.php';

$data_perusahaan = query(
"SELECT perusahaan.id_perusahaan, 
perusahaan.username_perusahaan, 
perusahaan.password_perusahaan, 
perusahaan.nama_perusahaan, 
perusahaan.email_perusahaan, 
perusahaan.telepon_perusahaan, 
perusahaan.website_perusahaan, 
perusahaan.logo_perusahaan, 
lokasi_pekerjaan.nama_lokasi
FROM
perusahaan
INNER JOIN
lokasi_pekerjaan
ON 
perusahaan.id_lokasi = lokasi_pekerjaan.id_lokasi order by nama_perusahaan asc");

if (isset($_POST['hapus_user_perusahaan'])) {
    // cek apakah data berhasil dihapus atau tidak
    if (hapus_user_perusahaan($_POST) > 0) {
        echo "
            <script>
                alert('Perusahaan berhasil dihapus!');
                document.location.href = 'list_perusahaan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Perusahaan gagal dihapus!');
                document.location.href = 'list_perusahaan.php';
            </script>
        ";
    }
}

?>


<?php $title = 'List Perusahaan' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-8 mb-8">

                <h1 class="text-black font-weight-bold">Data User Perusahaan</h1>
                <div class="custom-breadcrumbs">
                    <a href="home.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>User Perusahaan</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcumb end -->

<main>
    <div class="container mb-5">
        <div class="row">
            <?php include 'dashboard.php' ?>
            <div class="col-lg-9 container">

                <h3 class="mb-4">Daftar User Perusahaan</h3>


                <!-- tabel pelamar -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No. </th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Website</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($data_perusahaan as $row) { ?>
                            <tr>
                                <th class="align-middle" scope="row"><?= $i ?></th>
                                <td class="align-middle"><?= $row['nama_perusahaan'] ?></td>
                                <td class="align-middle"><?= $row['email_perusahaan'] ?></td>
                                <td class="align-middle"><?= $row['password_perusahaan'] ?></td>
                                <td class="align-middle"><?= $row['telepon_perusahaan'] ?></td>
                                <td class="align-middle"><?= $row['nama_lokasi'] ?></td>
                                <td class="align-middle"><?= $row['website_perusahaan'] ?></td>
                                <td class="align-middle">
                                    <form action="" method="post">
                                        <input type="hidden" name="id_perusahaan" value="<?= $row['id_perusahaan'] ?>">
                                        <button type="submit" class="btn-danger rounded-lg mb-2" onclick="return confirm('Yakin untuk menghapus user perusahaan?')" name="hapus_user_perusahaan">
                                        <i class="ti-close"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- JS here -->



</body>