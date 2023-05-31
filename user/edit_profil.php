<?php

//To Handle Session Variables on This Page
session_start();

if (!isset($_SESSION["login_pelamar"])) {
  header("Location: ../login-pelamar.php");
  exit;
}

require '../functions.php';

$id_pelamar = $_SESSION['id_pelamar'];

$info = query("SELECT * FROM pelamar WHERE id_pelamar = $id_pelamar")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['update_profil_pelamar'])) {
  // cek apakah data berhasil diubah atau tidak
  if (ubah_pelamar($_POST) > 0) {
    echo "
            <script>
                alert('Data pelamar berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
  } else {
    echo "
            <script>
                alert('Data pelamar gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
  }
}
?>

<?php $title = 'Edit Profil' ?>
<?php include 'navbar.php' ?>

<!-- breadcumb -->
<section class="breadcrumb" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mt-10 mb-10">
        <h1 class="text-black font-weight-bold">Dashboard</h1>
        <div class="custom-breadcrumbs">
          <a href="index.php"><span style="color: black;">Dashboard</span></a> <span class="mx-2 slash">/</span>
          <span class="text-black"><strong>Edit Profil</strong></span>
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
              <h3 class="mb-4">Edit Profil</h3>
              <form action="" method="post" enctype="multipart/form-data" class="row g-3">

                <input type="hidden" name="id" id="id" value="<?= $info["id_pelamar"]; ?>">
                <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $info["foto_pelamar"]; ?>">
                <input type="hidden" name="resumeLama" id="resumeLama" value="<?= $info["resume"]; ?>">

                <!-- nama lengkap -->
                <div class="col-md-12 mb-3">
                  <label for="nama_pelamar" class="form-label">Nama Lengkap <span style="color:red"> *</span></label>
                  <input type="text" class="form-control" id="nama_pelamar" name="nama_pelamar" value="<?= $info['nama_pelamar'] ?>" required>
                </div>

                <!-- email -->
                <div class="col-md-12 mb-3">
                  <label for="email" class="form-label">Email <span style="color:red"> *</span></label>
                  <input type="email" class="form-control" id="email" name="email_pelamar" value="<?= $info['email_pelamar'] ?>" readonly required>
                </div>

                <!-- telepon -->
                <div class="col-md-12 mb-3">
                  <label for="telepon" class="form-label">Nomor Telepon / WA <span style="color:red"> *</span></label>
                  <input type="text" class="form-control" id="telepon" name="telepon_pelamar" value="<?= $info['telepon_pelamar'] ?>" required>
                </div>

                <!-- jenis kelamin -->
                <div class="col-md-12 mb-3">
                  <label class="form-label">Jenis Kelamin <span style="color:red"> *</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <input type="radio" id="L" name="jenis_kelamin" value="Laki-Laki" <?php echo ($info['jenis_kelamin'] == "Laki-Laki") ? "checked" : "" ?> required>
                        <label for="L" class="my-auto">&nbsp; Laki-Laki</label>
                      </div>
                      <div class="input-group-text">
                        <input type="radio" id="P" name="jenis_kelamin" value="Perempuan" <?php echo ($info['jenis_kelamin'] == "Perempuan") ? "checked" : "" ?> required>
                        <label for="P" class="my-auto">&nbsp; Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- tahun kelahiran -->
                <div class="col-md-12 mb-3">
                  <label for="tahun_kelahiran" class="form-label">Tahun Kelahiran <span style="color:red"> *</span></label>
                  <input type="text" class="form-control" id="tahun_kelahiran" name="tahun_kelahiran" list="tahun-kelahiran" placeholder="Pilih" value="<?= $info['tahun_kelahiran'] ?>" required>
                  <datalist id="tahun-kelahiran">
                    <?php
                    for ($tahun = 1960; $tahun <= 2005; $tahun++) {
                      echo '<option value="' . $tahun . '">' . $tahun . '</option>';
                    }
                    ?>
                  </datalist>
                </div>

                <!-- alamat -->
                <div class="col-md-12 mb-3 mb-3">
                  <label class="text-black" for="alamat_pelamar">Alamat <span style="color:red"> *</span></label>
                  <textarea name="alamat_pelamar" id="alamat_pelamar" cols="20" rows="5" class="form-control" required><?= $info['alamat_pelamar'] ?></textarea>
                </div>

                <!-- kota kabupaten -->
                <div class="col-md-12 mb-3">
                  <label for="kota_kab" class="form-label">Kota / Kabupaten <span style="color:red"> *</span></label>
                  <input type="text" class="form-control" id="kota_kab" name="kota_kab_pelamar" value="<?= $info['kota_kab_pelamar'] ?>" required>
                </div>

                <!-- pendidikan terakhir -->
                <div class="col-md-12 mb-3">
                  <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir<span style="color:red"> *</span></label>
                  <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select" required>
                    <option value="" class="text-black" disabled selected hidden>Pilih</option>
                    <option value="SMA/Sederajat" <?php echo ($info['pendidikan_terakhir'] == "SMA/Sederajat") ? "selected" : "" ?>>SMA/Sederajat</option>
                    <option value="Diploma/D1/D2/D3" <?php echo ($info['pendidikan_terakhir'] == "Diploma/D1/D2/D3") ? "selected" : "" ?>>Diploma/D1/D2/D3</option>
                    <option value="Sarjana / S1" <?php echo ($info['pendidikan_terakhir'] == "Sarjana / S1") ? "selected" : "" ?>>Sarjana / S1</option>
                    <option value="Master / S2" <?php echo ($info['pendidikan_terakhir'] == "Master / S2") ? "selected" : "" ?>>Master / S2</option>
                    <option value="Doctor / S3" <?php echo ($info['pendidikan_terakhir'] == "Doctor / S3") ? "selected" : "" ?>>Doctor / S3</option>
                  </select>
                </div>

                <!-- lama bekerja -->
                <div class="col-md-12 mb-3">
                  <label for="lama_bekerja" class="form-label">Lama Bekerja (Pengalaman)<span style="color:red"> *</span></label>
                  <select name="lama_bekerja" id="lama_bekerja" class="form-select" required>
                    <option value="" class="text-black" disabled selected hidden>Pilih</option>
                    <option value="Fresh Graduate" <?php echo ($info['lama_bekerja'] == "Fresh Graduate") ? "selected" : "" ?>>Fresh Graduate</option>
                    <option value="1-2 Tahun" <?php echo ($info['lama_bekerja'] == "1-2 Tahun") ? "selected" : "" ?>>1-2 Tahun</option>
                    <option value="3-5 Tahun" <?php echo ($info['lama_bekerja'] == "3-5 Tahun") ? "selected" : "" ?>>3-5 Tahun</option>
                    <option value="6-10 Tahun" <?php echo ($info['lama_bekerja'] == "6-10 Tahun") ? "selected" : "" ?>>6-10 Tahun</option>
                    <option value="Lebih dari 10 Tahun" <?php echo ($info['lama_bekerja'] == "Lebih dari 10 Tahun") ? "selected" : "" ?>>Lebih dari 10 Tahun</option>
                  </select>
                </div>

                <!-- foto pelamar -->
                <div class="col-md-12 mb-3 mb-3">
                  <label class="text-black" for="foto_pelamar">Foto Profil (maks. 1 MB)<span style="color:red"> *</span></label>
                  <img src="../upload/user/foto/<?= $info['foto_pelamar'] ?> " class=" mb-3 img-responsive center-block d-block img-thumbnail" style="width: 80px;" alt="foto_profil">
                  <input type="file" id="foto_pelamar" accept="image/png, image/jpeg, image/jpg" class="form-control-file" name="gambar">
                </div>

                <!-- CV / resume -->
                <div class="col-md-12 mb-3 mb-3">
                  <label class="text-black" for="resume">Upload File CV (.pdf) <span style="color:red"> *</span></label>
                  <input type="file" id="resume" accept="application/pdf" class="form-control-file" name="resume">
                </div>

                <div class="col-12 mt-4 mb-5">
                  <button type="submit" class="btn btn-primary" name="update_profil_pelamar">Perbarui Profil</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- JS here -->

    <script>
      const selectEl = document.getElementById('tahun-kelahiran');
      selectEl.addEventListener('change', function() {
        const selectedValue = selectEl.value;
        const currentYear = new Date().getFullYear();
        if (selectedValue < 1960 || selectedValue > 2005) {
          selectEl.value = '';
          alert('Input tidak valid. Silakan pilih tahun kelahiran dari 1960 hingga 2005.');
        }
      });
    </script>

    <?php include 'js.php' ?>

    </body>