<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Institut Teknologi Kyoto</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="profile.jpg" alt="Profile" class="rounded-circle" width="30" height="30">
                            Admin Name
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Logout</a></li>
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
                            <a class="nav-link active" aria-current="page" href="#">Data Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Data Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Data Karyawan</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Page content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container col-xxl-8 px-4 py-5">
                    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                        <div class="col-10 col-sm-8 col-lg-6">
                            <form action="">
                                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-uppercase">
                                    <?= $mhs["nama"]; ?>
                                </h1>
                                <div class="row mb-3">
                                    <label for="NIQ" class="col-sm-2 col-form-label">NIQ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="niq" name="niq"
                                            value="<?= $mhs["niq"]; ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value="<?= $mhs["alamat"]; ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="<?= $mhs["email"]; ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tlp" class="col-sm-2 col-form-label">No. Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tlp" name="tlp"
                                            value="<?= $mhs["tlp"]; ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="posisi" name="posisi"
                                            value="<?= $mhs["posisi"]; ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jk" name="jk"
                                            value="<?= $mhs["jk"]; ?>" disabled readonly>
                                    </div>
                                </div>
                                <a href="index.php" class="btn btn-primary">Kembali</a>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <img src="../img/<?= $mhs["gambar"] ?>" alt="foto_mhs" class="d-block mx-lg-auto img-fluid"
                                width="50%" alt="foto_ayank" loading="lazy" />
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>