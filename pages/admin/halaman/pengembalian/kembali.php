<?php

if (isset($_GET['kdPeminjaman'])) {
    $kdPeminjaman = $_GET['kdPeminjaman'];

    $sql = "SELECT * FROM peminjaman WHERE kdPeminjaman = '$kdPeminjaman' ";
    $query = mysqli_query($koneksi, $sql);
    $peminjaman = $query->fetch_assoc();

    $kdPeminjaman = $_GET['kdPeminjaman'];
    $jumlah = $peminjaman['jmlPeminjaman'];
    $kdBarang = $peminjaman['kdBarang'];

    $peminjaman = "UPDATE peminjaman SET statusPeminjaman = 'Sudah Mengembalikan' WHERE kdPeminjaman='$kdPeminjaman'";
    $query = mysqli_query($koneksi, $peminjaman);

    $sql = $koneksi->query("UPDATE barang SET jmlBarang=jmlBarang+$jumlah WHERE kdBarang='$kdBarang'");

    if (!$query) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php?halaman=pengembalian';</script>";
    }
}
?>