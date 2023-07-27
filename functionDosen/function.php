<?php


// Koneksi
$conn = mysqli_connect("localhost", "root", "", "db_jeki");

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
    // ambil data tiap elemen dalam form
    $nid = htmlspecialchars($data["nid"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $pendidikan = htmlspecialchars($data["pendidikan"]);
    // $gambar = htmlspecialchars($data["gambar"]);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO dosen
                VALUES
                ('', '$nama', '$nid', '$prodi', '$email', '$pendidikan','$gambar')
                ";
    $q1 = "INSERT INTO user VALUES ('','$nid','$nid','dosen')";

    mysqli_query($conn, $q1);
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang dupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile); // arya.png = ['arya', 'png']
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // MEmaksa biar tidak JPG & ambil nama ekstensi paling belakang(jpg)

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Bukan gambar cok');
            </script>";
        return false;
    }

    // cek jika ukurananya terlalu besar
    if ($ukuranFile > 10000000) {
        echo "<script>
                alert('ukuran terlalu besar cok');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, "../img/" . $namaFileBaru);

    return $namaFileBaru;

}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM dosen WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data tiap elemen dalam form
    $id = $data["id"];
    $nid = htmlspecialchars($data["nid"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $pendidikan = htmlspecialchars($data["pendidikan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tifak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query insert data
    $query = "UPDATE dosen SET
                nama = '$nama',
                nid = '$nid',
                prodi = '$prodi',
                email = '$email',
                pendidikan = '$pendidikan',
                gambar = '$gambar'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM dosen
                WHERE
                nama LIKE '%$keyword%' OR
                nid LIKE '%$keyword%' OR
                prodi LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                pendidikan LIKE '%$keyword%'
    ";

    return query($query);
}

function tampil($id)
{
    global $conn;

    $query = mysqli_query($conn, "SELECT FROM dosen WHERE id = $id");
    // $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $dataDosen = mysqli_fetch_assoc($result);
    ;

    // Cek apakah query berhasil dieksekusi
    if ($result) {
        // Cek apakah ada data yang ditemukan
        if (mysqli_num_rows($result) > 0) {
            // Tambahkan data ke dalam array
            while ($row = mysqli_fetch_assoc($result)) {
                $dataDosen[] = $row;
            }
        }
    }

    return $dataDosen;
}

function absen($data)
{
    global $conn;

    // ambil data tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $tgl = htmlspecialchars($data["tanggal"]);

    // query insert data
    $query = "INSERT INTO `absen` (`tanggal`, `level`, `nama`) VALUES ('$tgl', 'dosen', '$nama')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function riwayatAbsen($nama)
{
    global $conn;

    $query = mysqli_query($conn, "SELECT FROM absen WHERE nama = $nama");
    // $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $dataMahasiswa = mysqli_fetch_assoc($result);
    ;

    // Cek apakah query berhasil dieksekusi
    if ($result) {
        // Cek apakah ada data yang ditemukan
        if (mysqli_num_rows($result) > 0) {
            // Tambahkan data ke dalam array
            while ($row = mysqli_fetch_assoc($result)) {
                $dataMahasiswa[] = $row;
            }
        }
    }

    return $dataMahasiswa;
}