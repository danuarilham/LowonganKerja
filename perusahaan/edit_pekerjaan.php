<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_perusahaan"])) {
    header("Location: ../login-perusahaan.php");
    exit;
}

require '../functions.php';

$id_perusahaan = $_SESSION['id_perusahaan'];
$id_pekerjaan = $_GET["jobid"];

$pekerjaan = query("SELECT * FROM info_pekerjaan WHERE id_pekerjaan = $id_pekerjaan")[0];

$kategori = query("SELECT * FROM kategori_pekerjaan");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['ubah_lowongan_kerja'])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah_pekerjaan($_POST) > 0) {
        echo "
            <script>
                alert('Data lowongan kerja berhasil diubah!');
                document.location.href = 'list_pekerjaan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data lowongan kerja gagal diubah!');
                document.location.href = 'list_pekerjaan.php';
            </script>
        ";
    }
}
?>

<?php $title = 'Pekerjaan & Pelamar' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-8 mb-8">
                <h1 class="text-black font-weight-bold">Dashboard</h1>
                <div class="custom-breadcrumbs">
                    <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
                    <a href="list_pekerjaan.php"><span style="color: black;">Daftar Pekerjaan</span></a> <span class="mx-2 slash">/</span>
                    <span class="text-black"><strong>Edit Pekerjaan</strong></span>
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

            <section class="content-header">
                <div class="container">
                    <div class="row">

                        <?php include 'dashboard.php' ?>

                        <div class="col-md-8 bg-white padding-2 container">
                            <h3 class="mb-4"><a href="list_pekerjaan.php" class="btn-link text-decoration-none ">
                                    <i class="ti-arrow-circle-left"></i>
                                </a> &nbsp;Edit Lowongan Pekerjaan</h3>
                            <form action="" method="post" class="row g-3">

                                <input type="text" name="id_pekerjaan" value="<?= $id_pekerjaan ?>" hidden>


                                <div class="col-md-12 mb-3">
                                    <label for="judul" class="form-label">Jabatan / Posisi Pekerjaan <span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Contoh : Programmer" required autocomplete="off" value="<?= $pekerjaan['judul'] ?>">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="text-black" for="gender">Gender <span style="color:red"> *</span></label>
                                    <select name="gender" id="gender" class="form-select" required>
                                        <option value="Laki-Laki atau Perempuan" <?php echo ($pekerjaan['gender'] == "Laki-Laki atau Perempuan") ? "selected" : "" ?>>Laki-Laki atau Perempuan</option>
                                        <option value="Laki-Laki" <?php echo ($pekerjaan['gender'] == "Laki-Laki") ? "selected" : "" ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php echo ($pekerjaan['gender'] == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="text-black" for="tipe">Tipe Pekerjaan <span style="color:red"> *</span></label>
                                    <select name="tipe" id="tipe" class="form-select" required>
                                        <option value="Full Time" <?php echo ($pekerjaan['tipe'] == "Full Time") ? "selected" : "" ?>>Full Time</option>
                                        <option value="Part Time" <?php echo ($pekerjaan['tipe'] == "Part Time") ? "selected" : "" ?>>Part Time</option>
                                        <option value="Freelance" <?php echo ($pekerjaan['tipe'] == "Freelance") ? "selected" : "" ?>>Freelance</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="pendidikan" class="form-label">Syarat Pendidikan <span style="color:red"> *</span></label>
                                    <select name="pendidikan" id="pendidikan" class="form-select" required>
                                        <option value="SMA/Sederajat" <?php echo ($pekerjaan['pendidikan'] == "SMA/Sederajat") ? "selected" : "" ?>>SMA/Sederajat</option>
                                        <option value="Diploma/ D1" <?php echo ($pekerjaan['pendidikan'] == "Diploma/ D1") ? "selected" : "" ?>>Diploma/ D1</option>
                                        <option value="Diploma/ D2" <?php echo ($pekerjaan['pendidikan'] == "Diploma/ D2") ? "selected" : "" ?>>Diploma/ D2</option>
                                        <option value="Diploma/ D3" <?php echo ($pekerjaan['pendidikan'] == "Diploma/ D3") ? "selected" : "" ?>>Diploma/ D3</option>
                                        <option value="Diploma/ D4" <?php echo ($pekerjaan['pendidikan'] == "Diploma/ D4") ? "selected" : "" ?>>Diploma/ D4</option>
                                        <option value="Sarjana / S1" <?php echo ($pekerjaan['pendidikan'] == "Sarjana / S1") ? "selected" : "" ?>>Sarjana / S1</option>
                                        <option value="Master / S2" <?php echo ($pekerjaan['pendidikan'] == "Master / S2") ? "selected" : "" ?>>Master / S2</option>
                                        <option value="Doctor / S3" <?php echo ($pekerjaan['pendidikan'] == "Doctor / S3") ? "selected" : "" ?>>Doctor / S3</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="gaji" class="form-label">Gaji<span style="color:red"> *</span></label>
                                    <select name="gaji" id="gaji" class="form-select" required>
                                        <option value="" disabled selected hidden>Pilih</option>
                                        <option value="Negosiasi" <?php echo ($pekerjaan['gaji'] == "Negosiasi") ? "selected" : "" ?>>Negosiasi</option>
                                        <option value="Rp. 1 - 2 Juta" <?php echo ($pekerjaan['gaji'] == "Rp. 1 - 2 Juta") ? "selected" : "" ?>>Rp. 1 - 2 Juta</option>
                                        <option value="Rp. 2 - 4 Juta" <?php echo ($pekerjaan['gaji'] == "Rp. 2 - 4 Juta") ? "selected" : "" ?>>Rp. 2 - 4 Juta</option>
                                        <option value="Rp. 5 - 10 Juta" <?php echo ($pekerjaan['gaji'] == "Rp. 5 - 10 Juta") ? "selected" : "" ?>>Rp. 5 - 10 Juta</option>
                                        <option value="Rp. 10 - 20 Juta" <?php echo ($pekerjaan['gaji'] == "Rp. 10 - 20 Juta") ? "selected" : "" ?>>Rp. 10 - 20 Juta</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="text-black" for="kategori">Kategori <span style="color:red"> *</span></label>
                                    <select name="id_kategori" id="kategori" class="form-select" required>
                                        <?php foreach ($kategori as $row) { ?>
                                            <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3 ">
                                    <label class="text-black" for="deskripsi">Deskripsi Pekerjaan <span style="color:red"> *</span></label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" required placeholder="Contoh : CV. Garuda perusahaan bergerak di bidang Teknologi Informasi membutuhkan beberapa Staf IT yang kompeten di bidangnya."><?= $pekerjaan['deskripsi'] ?></textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="text-black" for="tanggung_jawab">Tanggung Jawab Pekerjaan <span style="color:red"> *</span></label>
                                    <textarea name="tanggung_jawab" id="tanggung_jawab" cols="30" rows="5" class="form-control" required placeholder="Contoh : Melakukan perjanjian bertemu dengan client, Mengatur data-data client"><?= $pekerjaan['tanggung_jawab'] ?></textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="text-black" for="keahlian">Keahlian <span style="color:red"> *</span></label>
                                    <textarea name="keahlian" id="keahlian" cols="30" rows="5" class="form-control" required placeholder="Contoh :
- Menguasai Microsoft Excel
- Menguasai bahasa Inggris"><?= $pekerjaan['keahlian'] ?></textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="waktu_bekerja" class="form-label">Waktu Bekerja <span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" id="waktu_bekerja" name="waktu_bekerja" placeholder="Contoh : Jam 9 s/d 17, Senin - Jum'at" required autocomplete="off" value="<?= $pekerjaan['waktu_bekerja'] ?>">
                                </div>

                                <div class="col-12 mt-4 mb-5">
                                    <button type="submit" class="btn btn-primary" name="ubah_lowongan_kerja">Perbarui Lowongan Kerja</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'js.php' ?>

        </body>