<?php
$idPetugas = $_GET["idPetugas"];
$query = "DELETE FROM petugasruangan WHERE idPetugas='$idPetugas' ";
$hasil_query = mysqli_query($koneksi, $query);

if (!$hasil_query) {
    die ("Gagal menghapus data: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='index.php?halaman=petugas';</script>";
}