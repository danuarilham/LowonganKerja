<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_users"])) {
    header("Location: ../index.php");
    exit;
}

require '../../functions.php';

$data_pelamar = query(
"SELECT * from pelamar order by nama_pelamar asc");

if (isset($_POST['hapus_user_pelamar'])) {
    // cek apakah data berhasil dihapus atau tidak
    if (hapus_user_pelamar($_POST) > 0) {
        echo "
            <script>
                alert('Data lowongan kerja berhasil dihapus!');
                document.location.href = 'list_user_pelamar.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data lowongan kerja gagal dihapus!');
                document.location.href = 'list_user_pelamar.php';
            </script>
        ";
    }
}

?>



<?php $title = 'List Pelamar' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-8 mb-8">

                <h1 class="text-black font-weight-bold">Data User Pelamar</h1>
                <div class="custom-breadcrumbs">
                    <a href="home.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>User Pelamar</strong></span>
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

                <h3 class="mb-4">Daftar User Pelamar</h3>

                <!-- tabel pelamar -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No. </th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tahun Lahir</th>
                            <th scope="col" colspan="2">Alamat</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($data_pelamar as $row) { ?>
                            <tr>
                                <th class="align-middle" scope="row"><?= $i ?></th>
                                <td class="align-middle"><?= $row['nama_pelamar'] ?></td>
                                <td class="align-middle"><?= $row['email_pelamar'] ?></td>
                                <td class="align-middle"><?= $row['password_pelamar'] ?></td>
                                <td class="align-middle"><?= $row['telepon_pelamar'] ?></td>
                                <td class="align-middle"><?= $row['jenis_kelamin'] ?></td>
                                <td class="align-middle"><?= $row['tahun_kelahiran'] ?></td>
                                <td><?= $row['alamat_pelamar'] ?>
                                    <br> <span style="color: gray;"><small>
                                        <?= $row['kota_kab_pelamar'] ?>
                                    </small></span>
                                </td>
                                <td class="align-middle">
                                    <form action="" method="post">
                                        <input type="hidden" name="id_pelamar" value="<?= $row['id_pelamar'] ?>">
                                        <button type="submit" class="btn-danger rounded-lg mb-2" onclick="return confirm('Yakin untuk menghapus user pelamar?')" name="hapus_user_pelamar">
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