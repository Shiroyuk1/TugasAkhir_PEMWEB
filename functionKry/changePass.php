<?php
require 'function.php';
// Koneksi
$conn = mysqli_connect("localhost", "root", "", "db_jeki");

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_SESSION['NIQ'])) {
    $NIQ = $_SESSION['NIQ'];
    $user = query("SELECT * FROM user WHERE uid = $NIQ")[0];

} else {
    // Tindakan jika tidak ada uid dalam session
    echo "<script>alert('raono');</script>";

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil password lama yang dimasukkan oleh pengguna
    $oldPassword = $_POST["oldPassword"];

    // Dapatkan password yang ada di database berdasarkan NIQ
    $dbPassword = $user["password"];

    // Periksa kesamaan password menggunakan password_verify()
    if ($oldPassword == $dbPassword) {
        // Password cocok, lanjutkan dengan mengganti password baru
        $newPassword = $_POST["newPassword"];
        mysqli_query($conn, "UPDATE user SET password = '$newPassword' WHERE uid = $NIQ");

        // Tambahkan pesan bahwa password berhasil diganti (opsional)
        echo "<script>alert('Password berhasil diganti.');</script>";
    } else {
        // Password lama yang dimasukkan tidak cocok
        echo "<script>alert('Password lama yang dimasukkan tidak sesuai.');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <div class="card" style="width: 20rem">
                <div class="card-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-floating mb-3">
                            <input type="uid" class="form-control" id="uid" name="uid" value="<?= $user["uid"]; ?>"
                                required readonly />
                            <label for="uid">ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                                placeholder="Password" required />
                            <label for="oldPassword">Password Lama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="newPassword" name="newPassword"
                                placeholder="Password" required />
                            <label for="newPassword">Password Baru</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Ganti Password</button>
                        </div>
                        <hr>
                    </form>
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary" href="tampilKry.php" role="button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>