<?php

if (isset($_GET['kdBarang'])) {

    $kdBarang = $_GET['kdBarang'];

    // ambil nisn
    $sql = "SELECT * FROM barang WHERE kdBarang = '$kdBarang' ";
    $query = mysqli_query($koneksi, $sql);
    $barang = mysqli_fetch_array($query);
}

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peminjaman Barang</h1><button class="btn btn-xs btn-grey"><a href="index.php?halaman=peminjaman"><i class=" fa fa-undo"></i></a></button>
    </div>
    <hr>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Kode Barang</label>
                    <input type="text" name="kdBarang" class="form-control" value="<?php echo $barang['kdBarang'] ?>" required readonly>
                </div>

                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <select name="nim" class="form-control" required>
                        <option selected disabled>Pilih Mahasiswa</option>
                        <?php
                        $sql = "SELECT * FROM mahasiswa ORDER BY nmMhs ASC";
                        $query = mysqli_query($koneksi, $sql);
                        while ($petugas = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $petugas['nim'] ?>"><?php echo $petugas['nmMhs'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Peminjaman</label>
                    <input type="date" name="tglPeminjaman" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Pengembalian</label>
                    <input type="date" name="tglPengembalian" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Jumlah Peminjaman Barang</label>
                    <input type="number" name="jmlPeminjaman" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Keterangan Peminjaman</label>
                    <input type="text" name="ketPeminjaman" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Petugas</label>
                    <select name="idPetugas" class="form-control" required>
                        <option selected disabled>Pilih Petugas</option>
                        <?php
                        $sql = "SELECT * FROM petugasruangan ORDER BY nmPetugas ASC";
                        $query = mysqli_query($koneksi, $sql);
                        while ($petugas = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $petugas['idPetugas'] ?>"><?php echo $petugas['nmPetugas'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>

</div>
<?php

if (isset($_POST['simpan'])) {
    $kdBarang = $_POST['kdBarang'];
    $tglPeminjaman = $_POST['tglPeminjaman'];
    $tglPengembalian = $_POST['tglPengembalian'];
    $jmlPeminjaman = $_POST['jmlPeminjaman'];
    $statusPeminjaman = "Sedang Diproses";
    $ketPeminjaman = $_POST['ketPeminjaman'];
    $nim = $_POST['nim'];
    $idPetugas = $_POST['idPetugas'];

    $barang = "INSERT INTO peminjaman (tglPeminjaman, tglPengembalian, jmlPeminjaman, statusPeminjaman, ketPeminjaman, nim, kdBarang, idPetugas) VALUES ('$tglPeminjaman', '$tglPengembalian', '$jmlPeminjaman', '$statusPeminjaman', '$ketPeminjaman', '$nim', '$kdBarang', '$idPetugas')";
    $query = mysqli_query($koneksi, $barang);

    $koneksi->query("UPDATE barang SET jmlBarang=jmlBarang -$jmlPeminjaman WHERE kdBarang='$kdBarang'"); 

    if ($query) {
        echo '<meta http-equiv="refresh" content="0;url=index.php?halaman=laporan-peminjaman&pesan=input"/>';
    } else {
        die('Gagal Menyimpan');
    }
}

?>