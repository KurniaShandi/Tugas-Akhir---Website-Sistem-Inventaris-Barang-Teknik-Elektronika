<?php

if (isset($_GET['kdBarang'])) {

    $kdBarang = $_GET['kdBarang'];

    // ambil nisn
    $sql = "SELECT * FROM barang WHERE kdBarang = '$kdBarang' ";
    $query = mysqli_query($koneksi, $sql);
    $barang = mysqli_fetch_array($query);
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Perawatan Barang</h1>
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
                    <label for="">Tanggal Perawatan</label>
                    <input type="date" name="tglRawat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" name="jmlRawat" class="form-control" value="<?php echo $barang['jmlBarang'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="ketRawat" class="form-control" required>
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
    $kdBarang = $_POST['kdBarang'];
    $tglRawat = $_POST['tglRawat'];
    $jmlRawat = $_POST['jmlRawat'];
    $ketRawat = $_POST['ketRawat'];

    $barang = "INSERT INTO perawatan (tglRawat, jmlRawat, ketRawat, kdBarang) VALUES ('$tglRawat', '$jmlRawat', '$ketRawat', '$kdBarang')";
    $query = mysqli_query($koneksi, $barang);

    if ($query) {
        echo '<meta http-equiv="refresh" content="0;url=index.php?halaman=laporan-perawatan&pesan=input"/>';
    } else {
        die('Gagal Menyimpan');
    }
}

?>