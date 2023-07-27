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


			<!-- Page content -->
			<div class="container col-xxl-8 px-4 py-5">
				<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
					<div class="col-10 col-sm-8 col-lg-6">
						<form action="">
							<h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-uppercase">
								<?= $admin["nama"]; ?>
							</h1>
							<div class="row mb-3">
								<label for="niq" class="col-sm-2 col-form-label">NIQ</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="niq" name="niq"
										value="<?= $admin["niq"]; ?>" disabled readonly>
								</div>
							</div>
							<div class="row mb-3">
								<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="alamat" name="alamat"
										value="<?= $admin["alamat"]; ?>" disabled readonly>
								</div>
							</div>
							<div class="row mb-3">
								<label for="email" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="email" name="email"
										value="<?= $admin["email"]; ?>" disabled readonly>
								</div>
							</div>
							<div class="row mb-3">
								<label for="tlp" class="col-sm-2 col-form-label">Telepon</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="tlp" name="tlp"
										value="<?= $admin["tlp"]; ?>" disabled readonly>
								</div>
							</div>
							<div class="row mb-3">
								<label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="posisi" name="posisi"
										value="<?= $admin["posisi"]; ?>" disabled readonly>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-6">
						<img src="../img/<?= $admin["gambar"] ?>" alt="foto_mhs" class="d-block mx-lg-auto img-fluid"
							width="50%" alt="foto_ayank" loading="lazy" />
					</div>
				</div>
			</div>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
				crossorigin="anonymous"></script>
</body>

</html>