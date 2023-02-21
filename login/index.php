<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pilihan Tingkatan</title>
  <link rel="stylesheet" href="css/tingkatan.css">
</head>

<body>
  <!-- fungsi -->
  <?php
  function petugas()
  {
    echo "<script>alert('Anda Memilih Petugas');</script>";
    echo "<script>location='login.php';</script>";
  }
  function mahasiswa()
  {
    echo "<script>alert('Anda Memilih Mahasiswa');</script>";
    echo "<script>location='login_mahasiswa.php';</script>";
  }
  ?>
  <div id="pilih">
    <div class="left">

    </div>
    <div class="right">
      <br>
      <h1>Pilih Tingkatan Login</h1>
      <hr>
      <br>
      <form action="" method="post">
        <input type="submit" name="petugas" value="petugas">
        <input type="submit" name="mahasiswa" value="mahasiswa">
      </form>
    </div>
  </div>
  <?php
  if (isset($_POST['petugas'])) {
    petugas();
  } elseif (isset($_POST['mahasiswa'])) {
    mahasiswa();
  }
  ?>
</body>

</html>