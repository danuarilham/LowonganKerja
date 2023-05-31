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

$lokasi = query("SELECT * FROM lokasi_pekerjaan");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['update_profil_perusahaan'])) {
  // cek apakah data berhasil diubah atau tidak
  if (ubah_perusahaan($_POST) > 0) {
    echo "
            <script>
                alert('Data perusahaan berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
  } else {
    echo "
            <script>
                alert('Data perusahaan gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
  }
}
?>

<?php $title = 'Profil Perusahaan' ?>
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
              <h3 class="mb-4">Profil Perusahaan</h3>
              <form action="" method="post" enctype="multipart/form-data" class="row g-3">

                <input type="hidden" name="id" id="id" value="<?= $info["id_perusahaan"]; ?>">
                <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $info["logo_perusahaan"]; ?>">

                <div class="col-md-6">
                  <label for="nama" class="form-label">Nama Perusahaan <span style="color:red"> *</span></label>
                  <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $info['nama_perusahaan'] ?>" required>
                </div>
                <div class="col-md-6">
                  <label for="website" class="form-label">Website</label>
                  <input type="text" class="form-control" id="website" name="website_perusahaan" value="<?= $info['website_perusahaan'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email_perusahaan" value="<?= $info['email_perusahaan'] ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label for="telepon" class="form-label">Nomor HP/Telepon</label>
                  <input type="text" class="form-control" id="telepon" name="telepon_perusahaan" value="<?= $info['telepon_perusahaan'] ?>">
                </div>
                <div class="col-md-6 mb-6 mb-md-0">
                  <label class="text-black" for="fname">Lokasi</label>
                  <select name="id_lokasi" class="form-select">
                    <?php foreach ($lokasi as $row) { ?>
                      <?php if ($row['id_lokasi'] == $info['id_lokasi']) { ?>
                        <option value="<?= $row['id_lokasi'] ?>" selected><?= $row['nama_lokasi'] ?></option>
                      <?php } else { ?>
                        <option value="<?= $row['id_lokasi'] ?>"><?= $row['nama_lokasi'] ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="tentang">Tentang</label>
                  <textarea name="tentang" id="tentang" cols="30" rows="5" class="form-control"><?= $info['tentang'] ?></textarea>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="logo">Logo Perusahaan</label>
                  <input type="file" accept="image/*" class="form-control-file" name="gambar">
                </div>
                <div class="col-12 mt-4 mb-5">
                  <button type="submit" class="btn btn-primary" name="update_profil_perusahaan">Perbarui Profil Perusahaan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- JS here -->

    <?php include 'js.php' ?>

    </body>