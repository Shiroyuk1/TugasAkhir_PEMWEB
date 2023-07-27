<?php
require 'function.php';

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
                            <img src="../img/<?= $admin["gambar"] ?>" alt="Profile" class="rounded-circle" width="30"
                                height="30" style="object-fit: cover;">
                            <?= $admin["nama"]; ?>
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
                            <a class="nav-link active" aria-current="page" href="tampil.php">Data Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ubah.php">Edit Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="absen.php">Absensi</a>
                        </li>
                        <!-- Garis batas -->
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="../functionMhs/index.php">Data Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../functionDosen/index.php">Data Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../functionKry/index.php">Data Karyawan</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $admin['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $admin['gambar']; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= $admin['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="niq" class="form-label">NIQ :</label>
                            <input type="text" class="form-control" id="niq" name="niq" value="<?= $admin['niq']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="<?= $admin['alamat']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $admin['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tlp" class="form-label">Telepon :</label>
                            <input type="text" class="form-control" id="tlp" name="tlp" value="<?= $admin['tlp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="posisi" class="form-label">Posisi :</label>
                            <input type="text" class="form-control" id="posisi" name="posisi"
                                value="<?= $admin['posisi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Pilih Foto</label>
                            <img width="100px" src="../img/<?= $admin['gambar']; ?>" alt="gambar">
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