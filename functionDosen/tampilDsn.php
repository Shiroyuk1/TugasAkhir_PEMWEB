<?php
require 'function.php';

if (isset($_GET['id'])) {
	// Ambil ID dari parameter URL
	$id = $_GET['id'];

	$mhs = query("SELECT* FROM dosen WHERE id = $id")[0];
}

session_start();

if ( !isset($_SESSION["login"]) ) {
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

<body class="bg-body">
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

	<!-- Page content -->
	<div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <form action="">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-uppercase">
                        <?= $dsn["nama"]; ?>
                    </h1>
                    <div class="row mb-3">
                        <label for="nid" class="col-sm-2 col-form-label">NID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nid" name="nid" value="<?= $dsn["nid"]; ?>"
                                disabled readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi"
                                value="<?= $dsn["prodi"]; ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $dsn["email"]; ?>" disabled readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                value="<?= $dsn["pendidikan"]; ?>" disabled readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <img src="../img/<?= $dsn["gambar"] ?>" alt="foto_mhs" class="d-block mx-lg-auto img-fluid" width="50%"
                    alt="foto_ayank" loading="lazy" />
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
		crossorigin="anonymous"></script>
</body>

</html>