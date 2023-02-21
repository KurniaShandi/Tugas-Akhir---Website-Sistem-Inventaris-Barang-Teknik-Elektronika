<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Barang</h1>
    </div>
    <hr>
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Kode Barang</label>
            <input type="text" name="kdBarang" class="form-control" require value="">
        </div>
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" name="name" id="name" class="form-control" require value="">
        </div>
        <div class="form-group">
            <label for="">Merk Barang</label>
            <input type="text" name="merk" id="merk" class="form-control" require value="">
        </div>
        <div class="form-group">
            <label for="">Jumlah Barang</label>
            <input type="number" name="jml" id="jml" class="form-control" require value="">
        </div>
        <div class="form-group">
            <label for="">Tanggal Beli</label>
            <input type="date" name="tgl" id="tgl" class="form-control" require value="">
        </div>
        <div class="form-group">
            <label for="">Kondisi Barang</label>
            <select name="kondisi" class="form-control" required>
                <option selected disabled>Pilih Kondisi Barang</option>
                <option value="Baru">Baru</option>
                <option value="Second">Second</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Foto Barang</label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" class="form-control" require value="">
        </div>
        
        <div class="form-group">
            <label for="">Nama Ruangan</label>
            <select name="idPetugas" class="form-control" required>
                <option selected disabled>Pilih Nama Ruangan</option>
                <?php
                $sql = "SELECT * FROM petugasruangan ORDER BY nmPetugas ASC";
                $query = mysqli_query($koneksi, $sql);
                while ($petugas = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $petugas['idPetugas'] ?>"><?php echo $petugas['nmRuangan'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>

</div>

<?php
if (isset($_POST["submit"])) {
    $kdBarang = $_POST["kdBarang"];
    $name = $_POST["name"];
    $merk = $_POST["merk"];
    $jml = $_POST["jml"];
    $tgl = $_POST["tgl"];
    $kondisi = $_POST["kondisi"];
    $idPetugas = $_POST['idPetugas'];
    if ($_FILES["image"]["error"] === 4) {
        echo
        "<script>alert('Image Does Not Exits');</script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo
            "<script>alert('Invalid Image Extension');</script>";
        } else if ($fileSize > 1000000) {
            echo
            "<script>alert('Image Size Is Too Large');</script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= "." . $imageExtension;

            move_uploaded_file($tmpName, 'halaman/barang/img/' . $newImageName);
            $query = "INSERT INTO barang VALUES ('$kdBarang','$name','$merk','$jml','$tgl','$kondisi', '$newImageName', '$idPetugas')";
            mysqli_query($koneksi, $query);
            echo
            "<script>alert('Successfully Added');document.location.href = 'index.php?halaman=barang';</script>";
        }
    }
}
?>