<?php

if (isset($_GET['kdPeminjaman'])) {

    $kdPeminjaman = $_GET['kdPeminjaman'];
    
    $sql = "UPDATE peminjaman SET statusPeminjaman = 'Sedang Meminjam' WHERE kdPeminjaman='$kdPeminjaman'";
    $query = mysqli_query($koneksi, $sql);

    if (!$query) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php?halaman=laporan-peminjaman';</script>";
    }
    
}
?>