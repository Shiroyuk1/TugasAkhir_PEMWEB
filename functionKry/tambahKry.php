<?php
require 'function.php';

// // koneksi Database
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambah atau ngga
    if (tambah($_POST) > 0) {
        // echo "Data Ditambah";
        echo "
            <script>
                alert('Data Berhasil ditambah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        // echo "Data Gagal Tambah";
        echo "
            <script>
                alert('Data Gagal ditambah');
                document.location.href = 'index.php';
            </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tambah Data</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="niq">NIQ : </label>
                <input type="text" name="niq" id="niq" required>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="alamat">Alamat : </label>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="tlp">Telpon : </label>
                <input type="text" name="tlp" id="tlp">
            </li>
            <li>
                <label for="posisi">Posisi : </label>
                <input type="text" name="posisi" id="posisi">
            </li>
            <li>
                <label for="gambar">gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>