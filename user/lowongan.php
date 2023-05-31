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
  <?php $title = 'Buat Lowongan Kerja'?>
  <?php include 'navbar.php' ?>

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
                    <label for="judul" class="form-label">Nama Pekerjaan <span style="color:red"> *</span></label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label class="text-black" for="tipe">Tipe Pekerjaan <span style="color:red"> *</span></label>
                    <select name="tipe" id="tipe" class="form-select" required>
                      <option value="Full Time">Full Time</option>
                      <option value="Part Time">Part Time</option>
                      <option value="Freelance">Freelance</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="pendidikan" class="form-label">Minimal Pendidikan <span style="color:red"> *</span></label>
                    <select name="pendidikan" id="pendidikan" class="form-select" required>
                      <option value="SMA/Sederajat">SMA/Sederajat</option>
                      <option value="Diploma/D1/D2/D3">Diploma/D1/D2/D3</option>
                      <option value="Sarjana / S1">Sarjana / S1</option>
                      <option value="Master / S2">Master / S2</option>
                      <option value="Doctor / S3">Doctor / S3</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="gaji" class="form-label">Gaji <span style="color:red"> *</span></label>
                    <input type="text" class="form-control" id="gaji" name="gaji" required>
                  </div>

                  <div class="col-md-6 mb-6 mb-md-0">
                    <label class="text-black" for="kategori">Kategori <span style="color:red"> *</span></label>
                    <select name="id_kategori" id="kategori" class="form-select" required>
                      <?php foreach ($kategori as $row) { ?>
                        <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="deskripsi">Deskripsi Pekerjaan <span style="color:red"> *</span></label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" required></textarea>
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