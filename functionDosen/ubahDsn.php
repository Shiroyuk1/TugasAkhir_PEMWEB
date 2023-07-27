<?php
require 'function.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_SESSION['NID'])) {
    $NID = $_SESSION['NID'];
    $dsn = query("SELECT * FROM dosen WHERE nid = '$NID'")[0];
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
                document.location.href = 'tampilDsn.php';
            </script>
        ";
    } else {
        // echo "Data Gagal Tambah";
        echo "
            <script>
                alert('Data Gagal diubah');
                document.location.href = 'tampilDsn.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Ubah Data</title>
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
                            <img src="../img/<?= $dsn["gambar"] ?>" alt="Profile" class="rounded-circle" width="30"
                                height="30" style="object-fit: cover;">
                            <?= $dsn["nama"]; ?>
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
                            <a class="nav-link active" aria-current="page" href="tampilDsn.php">Data Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ubahDsn.php">Edit Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="absen.php">Absensi</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $dsn['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $dsn['gambar']; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $dsn['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nid" class="form-label">NID :</label>
                            <input type="text" class="form-control" id="nid" name="nid" value="<?= $dsn['nid']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi :</label>
                            <input type="text" class="form-control" id="prodi" name="prodi"
                                value="<?= $dsn['prodi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $dsn['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan :</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                value="<?= $dsn['pendidikan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Pilih Foto</label>
                            <img width="100px" src="../img/<?= $dsn['gambar']; ?>" alt="gambar">
                            <input class="form-control-file" type="file" name="gambar" id="gambar">
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-start">
                                <a class="btn btn-primary" href="tampilDsn.php" role="button">Kembali</a>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-success" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
                        crossorigin="anonymous"></script>
</body>

</html>