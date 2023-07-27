<?php
// Koneksi
$conn = mysqli_connect("localhost", "root", "", "db_jeki");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangani login
    $uid = $_POST['uid'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE uid='$uid' AND password='$password'";
    $result = mysqli_query($conn, $query);



    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $level = $row['level'];

        if ($level == "mahasiswa") {
            $_SESSION['NIM'] = $uid;
            $_SESSION["login"] = true;
            header("Location: functionMhs/tampil.php");
            exit();
        } elseif ($level == "dosen") {
            $_SESSION['NID'] = $uid;
            $_SESSION["login"] = true;
            header("Location: functionDosen/tampilDsn.php");
            exit();
        } elseif ($level == "karyawan") {
            $_SESSION['NIQ'] = $uid;
            $_SESSION["login"] = true;
            header("Location: functionKry/tampilKry.php");
            exit();
        } elseif ($level == "admin") {
            $_SESSION['NIQ'] = $uid;
            $_SESSION["login"] = true;
            header("Location: functionAdmin/tampil.php");
            exit();
        }


    } else {
        // Login gagal
        echo "<script>alert('Email atau password salah');</script>";
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
                <img src="asset/lock-icon.svg" class="card-img-top mt-3" alt="gembok" style="height: 100px" />
                <div class="card-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-floating mb-3">
                            <input type="uid" class="form-control" id="uid" name="uid" placeholder="name@example.com"
                                required />
                            <label for="uid">ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required />
                            <label for="password">Password</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
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