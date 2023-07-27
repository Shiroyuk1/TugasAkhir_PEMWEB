<?php
require 'function.php';

if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau ngga
    if (ubah($_POST) > 0) {
        // echo "Data Diubah";
        echo "
            <script>
                alert('Data Berhasil diubah');
                document.location.href = 'tampil.php';
            </script>
        ";
    } else {
        // echo "Data Gagal Diubah";
        echo "
            <script>
                alert('Data Gagal diubah');
                document.location.href = 'tampil.php';
            </script>
        ";
    }

}

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_SESSION['NIM'])) {
    $NIM = $_SESSION['NIM'];

    $mhs = query("SELECT * FROM mahasiswa WHERE NIM = '$NIM'")[0];
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
    <title>Ubah Data</title>
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

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Institut Teknologi Kyoto</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/<?= $mhs["gambar"] ?>" alt="Profile" class="rounded-circle" width="30"
                                height="30" style="object-fit: cover;">
                            <?= $mhs["nama"]; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <li><a class="dropdown-item" href="changePass.php">Change Password</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="tampil.php">Data
                                Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ubah.php">Edit Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="absen.php">Absensi</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Page content -->
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row">
                    <div class="col-md-20 mb-4 text-center">
                        <h2 class="text-uppercase">Tambah data mahasiswa</h2>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="NIM" class="form-label">NIM :</label>
                            <input type="text" class="form-control" id="NIM" name="NIM" required
                                value="<?= $mhs['NIM']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi :</label>
                            <input type="text" class="form-control" id="prodi" name="prodi"
                                value="<?= $mhs['prodi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="fakultas" class="form-label">Fakultas :</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="FTIB" id="fakultas-ftib"
                                    name="fakultas" <?php if ($mhs['fakultas'] == 'FTIB')
                                        echo 'checked'; ?>>
                                <label class="form-check-label" for="fakultas-ftib">
                                    FTIB
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="FTEIC" id="fakultas-fteic"
                                    name="fakultas" <?php if ($mhs['fakultas'] == 'FTEIC')
                                        echo 'checked'; ?>>
                                <label class="form-check-label" for="fakultas-fteic">
                                    FTEIC
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="noTlp" class="form-label">No. Telpon :</label>
                            <input type="text" class="form-control" id="noTlp" name="noTlp"
                                value="<?= $mhs['noTlp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="hobby" class="form-label">Hobby :</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Membaca" id="checkbox1"
                                            name="hobby[]" <?php if (in_array('Membaca', explode(', ', $mhs['hobby'])))
                                                echo 'checked'; ?>>
                                        <label class="form-check-label" for="checkbox1">
                                            Membaca
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Olahraga" id="checkbox2"
                                            name="hobby[]" <?php if (in_array('Olahraga', explode(', ', $mhs['hobby'])))
                                                echo 'checked'; ?>>
                                        <label class="form-check-label" for="checkbox2">
                                            Olahraga
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Mendengarkan musik"
                                            id="checkbox3" name="hobby[]" <?php if (in_array('Mendengarkan musik', explode(', ', $mhs['hobby'])))
                                                echo 'checked'; ?>>
                                        <label class="form-check-label" for="checkbox3">
                                            Mendengarkan musik
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Bermain Game"
                                            id="checkbox4" name="hobby[]" <?php if (in_array('Bermain game', explode(', ', $mhs['hobby'])))
                                                echo 'checked'; ?>>
                                        <label class="form-check-label" for="checkbox4">
                                            Bermain game
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Jalan-jalan"
                                            id="checkbox5" name="hobby[]" <?php if (in_array('Jalan-jalan', explode(', ', $mhs['hobby'])))
                                                echo 'checked'; ?>>
                                        <label class="form-check-label" for="checkbox5">
                                            Jalan-jalan
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6"
                                            name="hobby[]" <?php if (in_array('Mancing', explode(', ', $mhs['hobby'])))
                                                echo 'checked'; ?>>
                                        <label class="form-check-label" for="checkbox6">
                                            Mancing
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6"
                                            name="hobby[]" <?php if (in_array('Masak', explode(', ', $mhs['hobby'])))
                                                echo 'checked'; ?>>
                                        <label class="form-check-label" for="checkbox6">
                                            Masak
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6"
                                            name="hobby[]" <?php if (in_array('Tidur', explode(', ', $mhs['hobby'])))
                                                echo 'checked'; ?>>
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
                                <input class="form-check-input" type="radio" value="Laki-laki" id="jk-lakilaki"
                                    name="jk" <?php if ($mhs['jk'] == 'Laki-laki')
                                        echo 'checked'; ?>>
                                <label class="form-check-label" for="jk-lakilaki">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Perempuan" id="jk-perempuan"
                                    name="jk" <?php if ($mhs['jk'] == 'Perempuan')
                                        echo 'checked'; ?>>
                                <label class="form-check-label" for="jk-perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Pilih Foto</label>
                            <img width="100px" src="../img/<?= $mhs['gambar']; ?>" alt="gambar">
                            <input class="form-control-file" type="file" name="gambar" id="gambar">
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-start">
                                <a class="btn btn-primary" href="tampil.php" role="button">Kembali</a>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-success" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>