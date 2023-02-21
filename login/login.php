<!doctype html>
<html lang="en">

<head>
    <title>Login Inventaris Barang Teknik Elektronika</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">

</head>

<body>
    <div id="login">
        <div class="left">

        </div>
        <div class="right">
            <h1>Login Petugas</h1>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" />

                <input type="submit" name="login" value="login" />
            </form>
        </div>
    </div>
</body>

</html>

<?php

session_start();

include "../config/koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    // indentifikasi pengguna yang cocok dengan level/role
    $sql = "SELECT * FROM petugasruangan WHERE username = '$username' AND password = '$password' ";
    $login = mysqli_query($koneksi, $sql);
    // var_dump($login); die;

    // Menghitung jumlah pengguna yang ditemukan
    $cek = mysqli_num_rows($login);

    // Cek pengguna jika ditemukan dari DB
    if ($cek == 1) {
        $pengguna = mysqli_fetch_array($login);

        // Jika petugas level/role admin
        if ($pengguna['level'] == "Admin") {
            // Buat session 
            $_SESSION['username'] = $username;
            $_SESSION['id_admin'] = $pengguna['idPetugas'];
            $_SESSION['nama_admin'] = $pengguna['nmPetugas'];
            $_SESSION['level'] = "Admin";

            // redirect ke halaman berikutnya
            header("location: ../pages/admin/index.php");
        } elseif ($pengguna['level'] == "Petugas") {
            // Buat Session
            $_SESSION['username'] = $username;
            $_SESSION['id_petugas'] = $pengguna['idPetugas'];
            $_SESSION['nama_petugas'] = $pengguna['nmPetugas'];
            $_SESSION['level'] = "Petugas";

            // redirect ke halaman berikutnya
            echo "<script>alert('login berhasil');</script>";
            echo "<script>location='../pages/petugas/index.php';</script>";
        } else {
            echo "<script>alert('anda gagal login, periksa akun anda');</script>";
            echo "<script>location='login.php';</script>";
        }
    } else {
        echo "<script>alert('anda gagal login, periksa akun anda');</script>";
        echo "<script>location='login.php';</script>";
    }
}

?>