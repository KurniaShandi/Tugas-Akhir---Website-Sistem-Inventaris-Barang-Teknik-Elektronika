<?php

if (isset($_GET['idPetugas'])) {

    $idPetugas = $_GET['idPetugas'];

    // ambil nisn
    $sql = "SELECT * FROM petugasruangan WHERE idPetugas = '$idPetugas' ";
    $query = mysqli_query($koneksi, $sql);
    $petugas = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) < 1) {
        die('Data Tidak Ada');
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Barang</h1>
    </div>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">IDEM</label>
                    <input type="text" name="idPetugas" class="form-control" value="<?php echo $petugas['idPetugas'] ?>" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nmPetugas" class="form-control" value="<?php echo $petugas['nmPetugas'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="LK" <?php if ($petugas['jk'] == 'Laki-Laki') {
                                                echo 'selected';
                                            } ?>>Laki-Laki</option>
                        <option value="PR" <?php if ($petugas['jk'] == 'Perempuan') {
                                                echo 'selected';
                                            } ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input type="text" name="hp" class="form-control" value="<?php echo $petugas['hp'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Ruangan</label>
                    <select name="nmRuangan" class="form-control" required>
                        <option value="Software Engineering Lab">Software Engineering Lab</option>
                        <option value="Networking Lab" <?php if ($petugas['nmRuangan'] == 'Networking Lab') {
                                                            echo 'selected';
                                                        } ?>>Networking Lab</option>
                        <option value="Computer Lab" <?php if ($petugas['nmRuangan'] == 'Computer Lab') {
                                                            echo 'selected';
                                                        } ?>>Computer Lab</option>
                        <option value="Animation Lab" <?php if ($petugas['nmRuangan'] == 'Animation Lab') {
                                                            echo 'selected';
                                                        } ?>>Animation Lab</option>
                        <option value="Virtual Reality Lab" <?php if ($petugas['nmRuangan'] == 'Virtual Reality Lab') {
                                                                echo 'selected';
                                                            } ?>>Virtual Reality Lab</option>
                        <option value="Multimedia Lab" <?php if ($petugas['nmRuangan'] == 'Multimedia Lab') {
                                                            echo 'selected';
                                                        } ?>>Multimedia Lab</option>
                        <option value="Network Infrastructure Lab" <?php if ($petugas['nmRuangan'] == 'Network Infrastructure Lab') {
                                                                        echo 'selected';
                                                                    } ?>>Network Infrastructure Lab</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $petugas['alamat'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $petugas['username'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $petugas['password'] ?>" required>
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

    $query = "UPDATE petugasruangan SET idPetugas = '$idPetugas', nmPetugas = '$nmPetugas', jk = '$jk' , hp = '$hp', nmRuangan = '$nmRuangan', alamat = '$alamat', username = '$username', password = '$password'";
    $query .= "WHERE idPetugas = '$idPetugas'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php?halaman=petugas';</script>";
    }
}
?>