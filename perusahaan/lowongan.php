<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_perusahaan"])) {
  header("Location: ../login-perusahaan.php");
  exit;
}

require '../functions.php';

$id_perusahaan = $_SESSION['id_perusahaan'];

$info = query("SELECT * FROM perusahaan 
  INNER JOIN
	lokasi_pekerjaan
	ON 
	perusahaan.id_lokasi = lokasi_pekerjaan.id_lokasi WHERE id_perusahaan = $id_perusahaan")[0];

$kategori = query("SELECT * FROM kategori_pekerjaan");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['buat_lowongan_kerja'])) {
  // cek apakah data berhasil diubah atau tidak
  if (tambah_pekerjaan($_POST) > 0) {
    echo "
            <script>
                alert('Lowongan kerja berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
  } else {
    echo "
            <script>
                alert('Lowongan kerja gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
  }
}
?>

<?php $title = 'Buat Lowongan Kerja' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-8 mb-8">
        <h1 class="text-black font-weight-bold">Dashboard</h1>
        <div class="custom-breadcrumbs">
          <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
          <span class="text-black"><strong>Buat Lowongan Kerja</strong></span>
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
              <h3 class="mb-4">Buat Lowongan Kerja</h3>
              <form action="" method="post" class="row g-3">

                <input type="text" name="id_perusahaan" value="<?= $id_perusahaan ?>" hidden>
                <input type="text" name="id_lokasi" value="<?= $info['id_lokasi'] ?>" hidden>

                <div class="col-md-12 mb-3">
                  <label for="judul" class="form-label">Jabatan / Posisi Pekerjaan <span style="color:red"> *</span></label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Contoh : Programmer" required autocomplete="off">
                </div>

                <div class="col-md-12 mb-3">
                  <label class="text-black" for="gender">Gender <span style="color:red"> *</span></label>
                  <select name="gender" id="gender" class="form-select" required>
                    <option value="" disabled selected hidden>Pilih</option>
                    <option value="Laki-Laki atau Perempuan">Laki-Laki atau Perempuan</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>

                <div class="col-md-12 mb-3">
                  <label class="text-black" for="tipe">Tipe Pekerjaan <span style="color:red"> *</span></label>
                  <select name="tipe" id="tipe" class="form-select" required>
                    <option value="" disabled selected hidden>Pilih</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Freelance">Freelance</option>
                  </select>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="pendidikan" class="form-label">Syarat Pendidikan <span style="color:red"> *</span></label>
                  <select name="pendidikan" id="pendidikan" class="form-select" required>
                    <option value="" disabled selected hidden>Pilih</option>
                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                    <option value="Diploma/D1/D2/D3">Diploma/D1/D2/D3</option>
                    <option value="Sarjana / S1">Sarjana / S1</option>
                    <option value="Master / S2">Master / S2</option>
                    <option value="Doctor / S3">Doctor / S3</option>
                  </select>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="gaji" class="form-label">Gaji<span style="color:red"> *</span></label>
                  <select name="gaji" id="gaji" class="form-select" required>
                    <option value="" disabled selected hidden>Pilih</option>
                    <option value="Negosiasi">Negosiasi</option>
                    <option value="Rp. 1 - 2 Juta">Rp. 1 - 2 Juta</option>
                    <option value="Rp. 2 - 4 Juta">Rp. 2 - 4 Juta</option>
                    <option value="Rp. 5 - 10 Juta">Rp. 5 - 10 Juta</option>
                    <option value="Rp. 10 - 20 Juta">Rp. 10 - 20 Juta</option>
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
                  <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" required placeholder="Contoh : CV. Garuda perusahaan bergerak di bidang Teknologi Informasi membutuhkan beberapa Staf IT yang kompeten di bidangnya."></textarea>
                </div>

                <div class="col-md-12 mb-3">
                  <label class="text-black" for="tanggung_jawab">Tanggung Jawab Pekerjaan <span style="color:red"> *</span></label>
                  <textarea name="tanggung_jawab" id="tanggung_jawab" cols="30" rows="5" class="form-control" required placeholder="Contoh : Melakukan perjanjian bertemu dengan client, Mengatur data-data client"></textarea>
                </div>

                <div class="col-md-12 mb-3">
                  <label class="text-black" for="keahlian">Keahlian <span style="color:red"> *</span></label>
                  <textarea name="keahlian" id="keahlian" cols="30" rows="5" class="form-control" required placeholder="Contoh :
- Menguasai Microsoft Excel
- Menguasai bahasa Inggris"></textarea>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="waktu_bekerja" class="form-label">Waktu Bekerja <span style="color:red"> *</span></label>
                  <input type="text" class="form-control" id="waktu_bekerja" name="waktu_bekerja" placeholder="Contoh : Jam 9 s/d 17, Senin - Jum'at" required autocomplete="off">
                </div>

                <div class="col-12 mt-4 mb-5">
                  <button type="submit" class="btn btn-primary" name="buat_lowongan_kerja">Buat Lowongan Kerja</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php include 'js.php' ?>

    </body>