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
                document.location.href = '../functionDosen/index.php';
            </script>
        ";
    } else {
        // echo "Data Gagal Tambah";
        echo "
            <script>
                alert('Data Gagal ditambah');
                document.location.href = '../functionDosen/index.php';
            </script>
        ";
    }
}

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_SESSION['NIQ'])) {
    $NIQ = $_SESSION['NIQ'];
    $admin = query("SELECT * FROM karyawan WHERE niq = '$NIQ'")[0];
} else {
    // Tindakan jika tidak ada uid dalam session
    echo "<script>alert('raono');</script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Institut Tekonologi Kyoto</a>

        </div>
    </nav>

    <!-- MAIN -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row">
            <div class="col-md-20 mb-4 text-center">
                <h2 class="text-uppercase">Tambah data dosen</h2>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama :</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="nid" class="form-label">NID :</label>
                    <input type="text" class="form-control" id="nid" name="nid" required>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi :</label>
                    <input type="text" class="form-control" id="prodi" name="prodi">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pendidikan" class="form-label">pendidikan :</label>
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Pilih Foto</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                </div>
                <div class="row">
                    <div class="col-md-6 text-start">
                        <a class="btn btn-primary" href="../functionDosen/index.php" role="button">Kembali</a>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>