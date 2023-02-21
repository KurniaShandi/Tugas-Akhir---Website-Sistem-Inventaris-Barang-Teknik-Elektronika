<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Mahasiswa</h1>
    </div>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nmMhs" class="form-control" required>
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
                    <label for="">Program Studi</label>
                    <select name="prodi" class="form-control" required>
                        <option selected disabled>Pilih Program Studi</option>
                        <option value="PTI">Pendidikan Teknik Informatika</option>
                        <option value="PTE">Pendidikan Teknik Elektronika</option>
                        <option value="TRSE">Teknik Rekayasa Sistem Elektronika</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Animasi">Animasi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Tahun Masuk</label>
                    <select name="thnMasuk" class="form-control" required>
                        <option selected disabled>Pilih Tahun Masuk</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
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
    $nim = $_POST['nim'];
    $nmMhs = $_POST['nmMhs'];
    $jk = $_POST['jk'];
    $hp = $_POST['hp'];
    $prodi = $_POST['prodi'];
    $thnMasuk = $_POST['thnMasuk'];
    $alamat = $_POST['alamat'];

    // Tambah ke tabel siswa
    $mahasiswa = "INSERT INTO mahasiswa VALUES ('$nim', '$nmMhs', '$jk', '$hp', '$prodi', '$thnMasuk', '$alamat') ";
    $query = mysqli_query($koneksi, $mahasiswa);

    if ($query) {
        echo '<meta http-equiv="refresh" content="0;url=index.php?halaman=mahasiswa&pesan=input"/>';
    } else {
        die('Gagal Menyimpan');
    }

}

?>