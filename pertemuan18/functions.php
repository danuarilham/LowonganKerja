<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

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

function tambah($data)
{
    global $conn;

    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar
    $gambar = upload();

    if (!$gambar) {
        return false;
    }


    $query = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$email', '$jurusan', '$gambar')";
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
    if ($ukuranFile > 1000000) {
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

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET 
                nim = '$nim', 
                nama = '$nama', 
                email = '$email', 
                jurusan = '$jurusan', 
                gambar = '$gambar' 
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE
                nim LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'";

    return query($query);
}

// function cari_limited($keyword, $awalData, $jumlahDataPerHalaman)
// {
//     $query = "SELECT * FROM mahasiswa WHERE
//                 nim LIKE '%$keyword%' OR
//                 nama LIKE '%$keyword%' OR
//                 email LIKE '%$keyword%' OR
//                 jurusan LIKE '%$keyword%' LIMIT $awalData, $jumlahDataPerHalaman";

//     return query($query);
// }

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username sudah ada atau belum
    $result =  mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

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
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function pagination()
{
    $jumlahDataPerHalaman = 3;
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
}
