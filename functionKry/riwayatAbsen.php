<?php
require 'function.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_SESSION['NIQ'])) {
    $NIQ = $_SESSION['NIQ'];
    $mhs = query("SELECT * FROM karyawan WHERE niq = '$NIQ'")[0];
} else {
    // Tindakan jika tidak ada uid dalam session
    echo "<script>alert('raono');</script>";

}

$mahasiswa = query("SELECT * FROM `absen` WHERE nama = '$mhs[nama]'");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Detail Mahasiswa</title>
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
                            <a class="nav-link active" aria-current="page" href="tampilKry.php">Data Karyawan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ubahKry.php">Edit Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="absen.php">Absensi</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Page content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container col-xxl-8 px-4 py-5">
                    <div id="container">
                        <table class="table table-bordered">
                            <tr align="center">
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>

                            <?php $i = 1; ?>

                            <?php foreach ($mahasiswa as $mhs): ?>
                                <form action="tampil.php" method="post">
                                    <tr align="center">
                                        <td>
                                            <?= $i; ?>
                                        </td>
                                        <td>
                                            <?= $mhs["tanggal"] ?>
                                        </td>
                                        <td><span class="badge rounded-pill text-bg-success">Telah Absen</span></td>
                                    </tr>
                                </form>
                                <?php $i++; ?>

                            <?php endforeach; ?>
                        </table>
                        <div class="row">
                            <div class="col-md-6 text-start">
                                <a class="btn btn-primary" href="absen.php" role="button">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        // Fungsi untuk mendapatkan nama hari dalam bahasa Indonesia
        function getNamaHari(day) {
            const namaHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            return namaHari[day];
        }

        // Fungsi untuk mendapatkan nama bulan dalam bahasa Indonesia
        function getNamaBulan(month) {
            const namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            return namaBulan[month];
        }

        // Fungsi untuk mendapatkan tanggal saat ini dalam format bahasa Indonesia
        function updateTanggal() {
            var now = new Date();
            var hari = getNamaHari(now.getDay());
            var tanggal = now.getDate();
            var bulan = getNamaBulan(now.getMonth());
            var tahun = now.getFullYear();
            var jam = now.getHours();
            var menit = now.getMinutes();
            var detik = now.getSeconds();

            var tanggalIndonesia = hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun + ' ' + jam + ':' + menit + ':' + detik;
            var tanggalElement = document.getElementById("tanggal");
            tanggalElement.textContent = tanggalIndonesia;
        }

        // Panggil fungsi updateTanggal setiap detik (1000 milidetik) untuk memperbarui tanggal secara real-time
        setInterval(updateTanggal, 1000);
    </script>
</body>

</html>