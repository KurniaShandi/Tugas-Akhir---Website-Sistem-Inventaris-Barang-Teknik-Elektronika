<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Petugas</h1>
    </div>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">IDEM</label>
                    <input type="text" name="idPetugas" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nmPetugas" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option selected disabled>Pilih Jenis Kelamin</option>
                        <option value="LK">Laki-Laki</option>
                        <option value="PR">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input type="text" name="hp" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Ruangan</label>
                    <select name="nmRuangan" class="form-control" required>
                        <option selected disabled>Pilih Ruangan</option>
                        <option value="Software Engineering Lab">Software Engineering Lab</option>
                        <option value="Networking Lab">Networking Lab</option>
                        <option value="Computer Lab">Computer Lab</option>
                        <option value="Animation Lab">Animation Lab</option>
                        <option value="Virtual Reality Lab">Virtual Reality Lab</option>
                        <option value="Multimedia Lab">Multimedia Lab</option>
                        <option value="Network Infrastructure Lab">Network Infrastructure Lab</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" class="form-control" required>
                        <option selected disabled>Pilih Level Petugas</option>
                        <option value="Admin">Admin</option>
                        <option value="Petugas">Petugas</option>
                    </select>
                </div>

                <div>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

<?php

if (isset($_POST['simpan'])) {
    $idPetugas = $_POST['idPetugas'];
    $nmPetugas = $_POST['nmPetugas'];
    $jk = $_POST['jk'];
    $hp = $_POST['hp'];
    $nmRuangan = $_POST['nmRuangan'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $level = $_POST['level'];

    // Tambah ke tabel siswa
    $petugas = "INSERT INTO petugasruangan VALUES ('$idPetugas', '$nmPetugas', '$jk', '$hp', '$nmRuangan', '$alamat', '$username', '$password', '$level') ";
    $query = mysqli_query($koneksi, $petugas);

    if ($query) {
        echo '<meta http-equiv="refresh" content="0;url=index.php?halaman=petugas&pesan=input"/>';
    } else {
        die('Gagal Menyimpan');
    }

}

?>