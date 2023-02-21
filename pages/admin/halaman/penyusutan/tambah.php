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
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Penyusutan Barang</h1>
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
                    <label for="">Tanggal Penyusutan</label>
                    <input type="date" name="tglSusut" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" name="jmlSusut" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="ketSusut" class="form-control" required>
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
    $tglSusut = $_POST['tglSusut'];
    $jmlSusut = $_POST['jmlSusut'];
    $ketSusut = $_POST['ketSusut'];

    $barang = "INSERT INTO penyusutan (tglSusut, jmlSusut, ketSusut, kdBarang) VALUES ('$tglSusut', '$jmlSusut', '$ketSusut', '$kdBarang')";
    $query = mysqli_query($koneksi, $barang);

    $koneksi->query("UPDATE barang SET jmlBarang=jmlBarang -$jmlSusut WHERE kdBarang='$kdBarang'"); 

    if ($query) {
        echo '<meta http-equiv="refresh" content="0;url=index.php?halaman=laporan-penyusutan&pesan=input"/>';
    } else {
        die('Gagal Menyimpan');
    }
}

?>