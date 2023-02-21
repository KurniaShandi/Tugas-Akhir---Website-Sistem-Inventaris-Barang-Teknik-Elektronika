<?php

if (isset($_GET['nim'])) {

    $nim = $_GET['nim'];

    // ambil nisn
    $sql = "SELECT * FROM mahasiswa WHERE nim = '$nim' ";
    $query = mysqli_query($koneksi, $sql);
    $mahasiswa = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) < 1) {
        die('Data Tidak Ada');
    }
}

?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Mahasiswa</h1>
    </div>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?php echo $mahasiswa['nim'] ?>" readonly required>
                </div>

                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nmMhs" class="form-control" value="<?php echo $mahasiswa['nmMhs'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="LK" <?php if ($mahasiswa['jk'] == 'Laki-Laki') { echo 'selected'; } ?>>Laki-Laki</option>
                        <option value="PR" <?php if ($mahasiswa['jk'] == 'Perempuan') { echo 'selected'; } ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input type="text" name="hp" class="form-control" value="<?php echo $mahasiswa['hp'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Program Studi</label>
                    <select name="prodi" class="form-control" required>
                        <option value="PTI" <?php if ($mahasiswa['prodi'] == 'Pendidikan Teknik Informatika') { echo 'selected'; } ?>>Pendidikan Teknik Informatika</option>
                        <option value="PTE" <?php if ($mahasiswa['prodi'] == 'Pendidikan Teknik Elektronika') { echo 'selected'; } ?>>Pendidikan Teknik Elektronika</option>
                        <option value="TRSE" <?php if ($mahasiswa['prodi'] == 'Teknik Rekayasa Sistem Elektronika') { echo 'selected'; } ?>>Teknik Rekayasa Sistem Elektronika</option>
                        <option value="Informatika" <?php if ($mahasiswa['prodi'] == 'Informatika') { echo 'selected'; } ?>>Informatika</option>
                        <option value="Animasi" <?php if ($mahasiswa['prodi'] == 'Animasi') { echo 'selected'; } ?>>Animasi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Tahun Masuk</label>
                    <select name="thnMasuk" class="form-control" required>
                        <option value="2022" <?php if ($mahasiswa['thnMasuk'] == '2022') { echo 'selected'; } ?>>2022</option>
                        <option value="2021" <?php if ($mahasiswa['thnMasuk'] == '2021') { echo 'selected'; } ?>>2021</option>
                        <option value="2020" <?php if ($mahasiswa['thnMasuk'] == '2020') { echo 'selected'; } ?>>2020</option>
                        <option value="2019" <?php if ($mahasiswa['thnMasuk'] == '2019') { echo 'selected'; } ?>>2019</option>
                        <option value="2018" <?php if ($mahasiswa['thnMasuk'] == '2018') { echo 'selected'; } ?>>2018</option>
                        <option value="2017" <?php if ($mahasiswa['thnMasuk'] == '2017') { echo 'selected'; } ?>>2017</option>
                        <option value="2016" <?php if ($mahasiswa['thnMasuk'] == '2016') { echo 'selected'; } ?>>2016</option>
                        <option value="2015" <?php if ($mahasiswa['thnMasuk'] == '2015') { echo 'selected'; } ?>>2015</option>
                        <option value="2014" <?php if ($mahasiswa['thnMasuk'] == '2014') { echo 'selected'; } ?>>2014</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $mahasiswa['alamat'] ?>" required>
                </div>
            </div>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </form>
</div>

<?php

if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nmMhs = $_POST['nmMhs'];
    $jk = $_POST['jk'];
    $hp = $_POST['hp'];
    $prodi = $_POST['prodi'];
    $thnMasuk = $_POST['thnMasuk'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE mahasiswa SET nim = '$nim', nmMhs = '$nmMhs', jk = '$jk' , hp = '$hp', prodi = '$prodi', thnMasuk = '$thnMasuk', alamat = '$alamat'";
    $query .= "WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php?halaman=mahasiswa';</script>";
    }
}
?>