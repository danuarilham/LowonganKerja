<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "loker");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah_pekerjaan($data)
{
    global $conn;

    $id_perusahaan = $data["id_perusahaan"];
    $judul = htmlspecialchars($data["judul"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $pendidikan = htmlspecialchars($data["pendidikan"]);
    $gaji = htmlspecialchars($data["gaji"]);
    $id_kategori = $data["id_kategori"];
    $id_lokasi = $data["id_lokasi"];
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gender = htmlspecialchars($data["gender"]);
    $tanggung_jawab = htmlspecialchars($data["tanggung_jawab"]);
    $keahlian = htmlspecialchars($data["keahlian"]);
    $waktu_bekerja = htmlspecialchars($data["waktu_bekerja"]);

    $query = "INSERT INTO info_pekerjaan VALUES ('', $id_perusahaan, $id_lokasi, $id_kategori, '$judul', '$tipe', '$gaji', '$pendidikan', '$deskripsi', '$gender', '$tanggung_jawab', '$keahlian', '$waktu_bekerja')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_detail_lamaran($data)
{
    global $conn;

    $id_pekerjaan = $data["id_pekerjaan"];
    $id_pelamar = $data["id_pelamar"];
    $pesan_promosi = htmlspecialchars($data["pesan_promosi"]);
    $nama_pelamar = htmlspecialchars($data["nama_pelamar"]);
    $email_pelamar = htmlspecialchars($data["email_pelamar"]);
    $telepon_pelamar = htmlspecialchars($data["telepon_pelamar"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tahun_kelahiran = htmlspecialchars($data["tahun_kelahiran"]);
    $alamat_pelamar = htmlspecialchars($data["alamat_pelamar"]);
    $kota_kab_pelamar = htmlspecialchars($data["kota_kab_pelamar"]);
    $pendidikan_terakhir = htmlspecialchars($data["pendidikan_terakhir"]);
    $lama_bekerja = htmlspecialchars($data["lama_bekerja"]);
    $resume = htmlspecialchars($data["resume"]);
    $foto_pelamar = htmlspecialchars($data["foto_pelamar"]);

    $query = "INSERT INTO detail_lamaran (id_lamaran, id_pekerjaan, id_pelamar, pesan_promosi, status_lamaran, nama_pelamar, email_pelamar, telepon_pelamar, foto_pelamar, pendidikan_terakhir, resume, jenis_kelamin, tahun_kelahiran, alamat_pelamar, kota_kab_pelamar, lama_bekerja) VALUES ('', $id_pekerjaan, $id_pelamar, '$pesan_promosi', 0, '$nama_pelamar', '$email_pelamar', '$telepon_pelamar', '$foto_pelamar', '$pendidikan_terakhir', '$resume', '$jenis_kelamin', '$tahun_kelahiran', '$alamat_pelamar', '$kota_kab_pelamar', '$lama_bekerja')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo " <script>
            alert('pilih gambar terlebih dahulu');
        </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo " <script>
            alert('yang anda upload bukan gambar!');
        </script>
        ";

        return false;
    }

    // cek ukurannya terlalu besar
    if ($ukuranFile > 1048576) {
        echo " <script>
            alert('ukuran gambar terlalu besar!');
        </script>
        ";
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../upload/perusahaan/logo/' . $namaFileBaru);

    return $namaFileBaru;
}

function upload_resume()
{
    $namaFile = $_FILES['resume']['name'];
    $ukuranFile = $_FILES['resume']['size'];
    $error = $_FILES['resume']['error'];
    $tmpName = $_FILES['resume']['tmp_name'];

    // cek apakah tidak ada resume yang diupload
    if ($error === 4) {
        echo " <script>
            alert('upload resume terlebih dahulu');
        </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah resume
    $ekstensiResumeValid = ['pdf'];
    $ekstensiResume = explode('.', $namaFile);
    $ekstensiResume = strtolower(end($ekstensiResume));

    if (!in_array($ekstensiResume, $ekstensiResumeValid)) {
        echo " <script>
            alert('yang anda upload bukan pdf!');
        </script>
        ";

        return false;
    }

    // cek ukurannya terlalu besar
    if ($ukuranFile > 10485760) {
        echo " <script>
            alert('ukuran resume terlalu besar!');
        </script>
        ";
    }

    // lolos pengecekan, resume siap diupload
    // generate nama resume baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiResume;

    move_uploaded_file($tmpName, '../upload/user/resume/' . $namaFileBaru);

    return $namaFileBaru;
}

function upload_foto_pelamar()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo " <script>
            alert('pilih gambar terlebih dahulu');
        </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo " <script>
            alert('yang anda upload bukan gambar!');
        </script>
        ";

        return false;
    }

    // cek ukurannya terlalu besar
    if ($ukuranFile > 1048576) {
        echo " <script>
            alert('ukuran gambar terlalu besar!');
        </script>
        ";
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../upload/user/foto/' . $namaFileBaru);

    return $namaFileBaru;
}

function ubah_perusahaan($data)
{
    global $conn;

    $id = $data["id"];
    $nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
    $email_perusahaan = htmlspecialchars($data["email_perusahaan"]);
    $website_perusahaan = htmlspecialchars($data["website_perusahaan"]);
    $telepon_perusahaan = htmlspecialchars($data["telepon_perusahaan"]);
    $id_lokasi = $data["id_lokasi"];
    $tentang = htmlspecialchars($data["tentang"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } 
    else {
        $gambar = upload();
    }

    $query = "UPDATE perusahaan SET 
                nama_perusahaan = '$nama_perusahaan', 
                email_perusahaan = '$email_perusahaan', 
                website_perusahaan = '$website_perusahaan', 
                telepon_perusahaan = '$telepon_perusahaan', 
                id_lokasi = $id_lokasi, 
                tentang = '$tentang', 
                logo_perusahaan = '$gambar' 
                WHERE id_perusahaan = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_pekerjaan($data)
{
    global $conn;

    $id_pekerjaan = $data["id_pekerjaan"];
    $judul = htmlspecialchars($data["judul"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $pendidikan = htmlspecialchars($data["pendidikan"]);
    $gaji = htmlspecialchars($data["gaji"]);
    $id_kategori = $data["id_kategori"];
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gender = htmlspecialchars($data["gender"]);
    $tanggung_jawab = htmlspecialchars($data["tanggung_jawab"]);
    $keahlian = htmlspecialchars($data["keahlian"]);
    $waktu_bekerja = htmlspecialchars($data["waktu_bekerja"]);

    $query = "UPDATE info_pekerjaan SET 
                id_kategori = $id_kategori, 
                judul = '$judul', 
                tipe = '$tipe', 
                gaji = '$gaji', 
                pendidikan = '$pendidikan', 
                deskripsi = '$deskripsi', 
                gender = '$gender', 
                tanggung_jawab = '$tanggung_jawab', 
                keahlian = '$keahlian', 
                waktu_bekerja = '$waktu_bekerja'
                WHERE id_pekerjaan = $id_pekerjaan
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_pelamar($data)
{
    global $conn;

    $id = $data["id"];
    $nama_pelamar = htmlspecialchars($data["nama_pelamar"]);
    $email_pelamar = htmlspecialchars($data["email_pelamar"]);
    $telepon_pelamar = htmlspecialchars($data["telepon_pelamar"]);
    $pendidikan_terakhir = htmlspecialchars($data["pendidikan_terakhir"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tahun_kelahiran = htmlspecialchars($data["tahun_kelahiran"]);
    $alamat_pelamar = htmlspecialchars($data["alamat_pelamar"]);
    $kota_kab_pelamar = htmlspecialchars($data["kota_kab_pelamar"]);
    $lama_bekerja = htmlspecialchars($data["lama_bekerja"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $resumeLama = htmlspecialchars($data["resumeLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } 
    else {
        $gambar = upload_foto_pelamar();
    }

    if ($_FILES['resume']['error'] === 4) {
        $resume = $resumeLama;
    } 
    else {
        $resume = upload_resume();
    }

    $query = "UPDATE pelamar SET 
                nama_pelamar = '$nama_pelamar', 
                email_pelamar = '$email_pelamar', 
                telepon_pelamar = '$telepon_pelamar', 
                pendidikan_terakhir = '$pendidikan_terakhir', 
                jenis_kelamin = '$jenis_kelamin', 
                tahun_kelahiran = '$tahun_kelahiran', 
                alamat_pelamar = '$alamat_pelamar', 
                kota_kab_pelamar = '$kota_kab_pelamar', 
                lama_bekerja = '$lama_bekerja', 
                foto_pelamar = '$gambar', 
                status_akun = 1, 
                resume = '$resume'
                WHERE id_pelamar = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function count_all()
{
    $query = "SELECT
	info_pekerjaan.id_pekerjaan, 
	info_pekerjaan.judul, 
	perusahaan.nama_perusahaan, 
	perusahaan.logo_perusahaan, 
	lokasi_pekerjaan.nama_lokasi, 
	kategori_pekerjaan.nama_kategori, 
	info_pekerjaan.tipe, 
	info_pekerjaan.gaji, 
	info_pekerjaan.pendidikan, 
	info_pekerjaan.deskripsi
FROM
	info_pekerjaan
	INNER JOIN
	kategori_pekerjaan
	ON 
		info_pekerjaan.id_kategori = kategori_pekerjaan.id_kategori
	INNER JOIN
	perusahaan
	ON 
		info_pekerjaan.id_perusahaan = perusahaan.id_perusahaan
	INNER JOIN
	lokasi_pekerjaan
	ON 
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi";

    return query($query);
}

function count_cari($keyword, $lokasi)
{
    $query = "SELECT
	info_pekerjaan.id_pekerjaan, 
	info_pekerjaan.judul, 
	perusahaan.nama_perusahaan, 
	perusahaan.logo_perusahaan, 
	lokasi_pekerjaan.nama_lokasi, 
	kategori_pekerjaan.nama_kategori, 
	info_pekerjaan.tipe, 
	info_pekerjaan.gaji, 
	info_pekerjaan.pendidikan, 
	info_pekerjaan.deskripsi
FROM
	info_pekerjaan
	INNER JOIN
	kategori_pekerjaan
	ON 
		info_pekerjaan.id_kategori = kategori_pekerjaan.id_kategori
	INNER JOIN
	perusahaan
	ON 
		info_pekerjaan.id_perusahaan = perusahaan.id_perusahaan
	INNER JOIN
	lokasi_pekerjaan
	ON 
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi WHERE
                (nama_perusahaan LIKE '%$keyword%' OR
                judul LIKE '%$keyword%') AND info_pekerjaan.id_lokasi LIKE '%$lokasi%'";

    return query($query);
}

function cari($keyword, $lokasi, $awalData, $jumlahDataPerHalaman)
{
    $query = "SELECT
	info_pekerjaan.id_pekerjaan, 
	info_pekerjaan.judul, 
	perusahaan.nama_perusahaan, 
	perusahaan.logo_perusahaan, 
	lokasi_pekerjaan.nama_lokasi, 
	kategori_pekerjaan.nama_kategori, 
	info_pekerjaan.tipe, 
	info_pekerjaan.gaji, 
	info_pekerjaan.pendidikan, 
	info_pekerjaan.deskripsi
FROM
	info_pekerjaan
	INNER JOIN
	kategori_pekerjaan
	ON 
		info_pekerjaan.id_kategori = kategori_pekerjaan.id_kategori
	INNER JOIN
	perusahaan
	ON 
		info_pekerjaan.id_perusahaan = perusahaan.id_perusahaan
	INNER JOIN
	lokasi_pekerjaan
	ON 
		info_pekerjaan.id_lokasi = lokasi_pekerjaan.id_lokasi WHERE
                (nama_perusahaan LIKE '%$keyword%' OR
                judul LIKE '%$keyword%') AND info_pekerjaan.id_lokasi LIKE '%$lokasi%' LIMIT $awalData, $jumlahDataPerHalaman";

    return query($query);
}

function registrasi_pelamar($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password_pelamar']);
    $password2 = mysqli_real_escape_string($conn, $data['password_pelamar2']);

    // cek username sudah ada atau belum
    $result =  mysqli_query($conn, "SELECT username_pelamar FROM pelamar WHERE username_pelamar = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah terdaftar');
            </script>";

        return false;
    }

    // konfirmasi password
    if ($password != $password2) {
        echo "
        <script>
            alert('konfirmasi password tidak sesuai');
        </script>";

        return false;
    }

    // enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan pelamar baru ke database
    mysqli_query($conn, "INSERT INTO pelamar(id_pelamar, username_pelamar, password_pelamar, email_pelamar) VALUES('', '$username', '$password', '$username')");

    return mysqli_affected_rows($conn);
}

function registrasi_perusahaan($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username_perusahaan']));
    $password = mysqli_real_escape_string($conn, $data['password_perusahaan']);
    $password2 = mysqli_real_escape_string($conn, $data['password_perusahaan2']);
    $nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
    $telepon_perusahaan = htmlspecialchars($data["telepon_perusahaan"]);
    $id_lokasi = $data["id_lokasi"];

    // cek username sudah ada atau belum
    $result =  mysqli_query($conn, "SELECT username_perusahaan FROM perusahaan WHERE username_perusahaan = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Email sudah terdaftar');
            </script>";

        return false;
    }

    // konfirmasi password
    if ($password != $password2) {
        echo "
        <script>
            alert('Konfirmasi password tidak sesuai');
        </script>";

        return false;
    }

    // enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan perusahaan baru ke database
    mysqli_query($conn, "INSERT INTO perusahaan(id_perusahaan, username_perusahaan, password_perusahaan, email_perusahaan, nama_perusahaan, telepon_perusahaan, id_lokasi) VALUES('', '$username', '$password', '$username', '$nama_perusahaan', '$telepon_perusahaan', $id_lokasi)");

    return mysqli_affected_rows($conn);
}