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
			<h1>Login Mahasiswa</h1>
			<form action="" method="POST">
				<input type="text" name="nim" placeholder="Username" required />
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
    $username = $_POST['nim'];
    $password = $_POST['password'];
    $password = md5($password);

    $sql = "SELECT * FROM mahasiswa WHERE nim = '$username' AND password = '$password' ";
    $login = mysqli_query($koneksi, $sql);

    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_array($login);

        if ($data['level'] == "Mahasiswa") {
            // Buat session
            $_SESSION['username'] = $username;
            $_SESSION['nama_mahasiswa'] = $data['nmMhs'];
            $_SESSION['level'] = "Mahasiswa";
            
            header("location: ../pages/mahasiswa/index.php");
        }
    } else {
        header('location:index.php');
    }
}

?>