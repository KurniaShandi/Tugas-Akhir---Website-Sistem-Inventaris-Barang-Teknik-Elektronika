<?php

if (isset($_GET['kdBarang'])) {

    $kdBarang = $_GET['kdBarang'];

    // ambil nisn
    $sql = "SELECT * FROM barang WHERE kdBarang = '$kdBarang' ";
    $query = mysqli_query($koneksi, $sql);
    $barang = mysqli_fetch_array($query);

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
                    <label for="">Kode Barang</label>
                    <input type="text" name="kdBarang" class="form-control" value="<?php echo $barang['kdBarang'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" name="nmBarang" class="form-control" value="<?php echo $barang['nmBarang'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Merk Barang</label>
                    <input type="text" name="merkBarang" class="form-control" value="<?php echo $barang['merkBarang'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Jumlah Barang</label>
                    <input type="number" name="jmlBarang" class="form-control" value="<?php echo $barang['jmlBarang'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Beli Barang</label>
                    <input type="date" name="tglBeli" class="form-control" value="<?php echo $barang['tglBeli'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Kondisi Barang</label>
                    <select name="kondisi" class="form-control" required>
                        <option value="Baru" <?php if ($barang['kondisi'] == 'Baru') {
                                                    echo 'selected';
                                                } ?>>Baru</option>
                        <option value="Second" <?php if ($barang['kondisi'] == 'Second') {
                                                    echo 'selected';
                                                } ?>>Second</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Petugas</label>
                    <select name="idPetugas" class="form-control" required>
                        <?php
                        if ($barang['idPetugas'] == 0) {
                        ?>
                            <option value="0" selected disabled>Pilih Petugas</option>
                        <?php } ?>
                        <?php
                        $sql = "SELECT * FROM petugasruangan ORDER BY nmPetugas ASC";
                        $query = mysqli_query($koneksi, $sql);
                        while ($petugas = mysqli_fetch_array($query)) {
                            if ($barang['idPetugas'] == $petugas['idPetugas']) {
                                echo '<option value="' . $petugas["idPetugas"] . '" selected>' . $petugas["nmPetugas"] . '</option>';
                            } else {
                                echo '<option value="' . $petugas['idPetugas'] . '">' . $petugas['nmPetugas'] . '</option>';
                            }
                        }
                        ?>
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
    $kdBarang = $_POST['kdBarang'];
    $nmBarang = $_POST['nmBarang'];
    $merkBarang = $_POST['merkBarang'];
    $jmlBarang = $_POST['jmlBarang'];
    $tglBeli = $_POST['tglBeli'];
    $kondisi = $_POST['kondisi'];
    $idPetugas = $_POST['idPetugas'];

    $query = "UPDATE barang SET kdBarang = '$kdBarang', nmBarang = '$nmBarang', merkBarang = '$merkBarang' , jmlBarang = '$jmlBarang', tglBeli = '$tglBeli', kondisi = '$kondisi', idPetugas = '$idPetugas'";
    $query .= "WHERE kdBarang = '$kdBarang'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php?halaman=barang';</script>";
    }
}
?>