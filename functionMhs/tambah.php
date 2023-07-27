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
                alert('Data Gagal ditambah');a
                document.location.href = 'index.php';
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
    <!-- <div style="background-image: url(https://cdn.shopify.com/s/files/1/0533/2089/files/5-websites-to-download-free-subtle-textures-subtle.jpg?5724472906039650661)"> -->
    <!-- MAIN -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row">
            <div class="col-md-20 mb-4 text-center">
                <h2 class="text-uppercase">Tambah data mahasiswa</h2>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama :</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="NIM" class="form-label">NIM :</label>
                    <input type="text" class="form-control" id="NIM" name="NIM" required>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi :</label>
                    <input type="text" class="form-control" id="prodi" name="prodi">
                </div>
                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="FTIB" id="fakultas-ftib" name="fakultas">
                        <label class="form-check-label" for="fakultas-ftib">
                            FTIB
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="FTEIC" id="fakultas-fteic" name="fakultas">
                        <label class="form-check-label" for="fakultas-fteic">
                            FTEIC
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="noTlp" class="form-label">No. Telpon :</label>
                    <input type="text" class="form-control" id="noTlp" name="noTlp">
                </div>
                <div class="mb-3">
                    <label for="hobby" class="form-label">Hobby :</label>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Membaca" id="checkbox1"
                                    name="hobby[]">
                                <label class="form-check-label" for="checkbox1">
                                    Membaca
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Olahraga" id="checkbox2"
                                    name="hobby[]">
                                <label class="form-check-label" for="checkbox2">
                                    Olahraga
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mendengarkan musik"
                                    id="checkbox3" name="hobby[]">
                                <label class="form-check-label" for="checkbox3">
                                    Mendengarkan musik
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Bermain Game" id="checkbox4"
                                    name="hobby[]">
                                <label class="form-check-label" for="checkbox4">
                                    Bermain game
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Jalan-jalan" id="checkbox5"
                                    name="hobby[]">
                                <label class="form-check-label" for="checkbox5">
                                    Jalan-jalan
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6"
                                    name="hobby[]">
                                <label class="form-check-label" for="checkbox6">
                                    Mancing
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6"
                                    name="hobby[]">
                                <label class="form-check-label" for="checkbox6">
                                    Masak
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6"
                                    name="hobby[]">
                                <label class="form-check-label" for="checkbox6">
                                    Tidur
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Laki-laki" id="jk-lakilaki" name="jk">
                        <label class="form-check-label" for="jk-lakilaki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Perempuan" id="jk-perempuan" name="jk">
                        <label class="form-check-label" for="jk-perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Pilih Foto</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                </div>
                <div class="row">
                    <div class="col-md-6 text-start">
                        <a class="btn btn-primary" href="../functionMhs/index.php" role="button">Kembali</a>
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