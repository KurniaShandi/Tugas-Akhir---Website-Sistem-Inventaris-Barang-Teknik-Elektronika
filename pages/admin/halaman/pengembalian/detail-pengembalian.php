<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Peminjaman Barang</h1>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-light">
                <?php
                $kdPeminjaman = ($_GET["kdPeminjaman"]);
                $sql = $koneksi->query("SELECT * FROM peminjaman INNER JOIN mahasiswa ON mahasiswa.nim=peminjaman.nim INNER JOIN barang ON barang.kdBarang = peminjaman.kdBarang INNER JOIN petugasruangan ON petugasruangan.idPetugas = peminjaman.idPetugas WHERE statusPeminjaman='Sedang Meminjam' AND kdPeminjaman = '$kdPeminjaman'");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <th width="25%">NIM (Nomor Induk Mahasiswa)</th>
                        <th width="4%">:</th>
                        <td><?php echo $data['nim']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>:</th>
                        <td><?php echo $data['nmMhs']; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <th>:</th>
                        <td><?php echo $data['jk']; ?></td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <th>:</th>
                        <td><?php echo $data['hp']; ?></td>
                    </tr>
                    <tr>
                        <th>
                            Data Barang
                        </th>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <th>:</th>
                        <td><?php echo $data['nmBarang']; ?></td>
                    </tr>
                    <tr>
                        <th>Kode Barang</th>
                        <th>:</th>
                        <td><?php echo $data['kdBarang']; ?></td>
                    </tr>
                    <tr>
                        <th>
                            Data Peminjaman
                        </th>
                    </tr>
                    <tr>
                        <th>Tanggal Peminjaman</th>
                        <th>:</th>
                        <td><?php echo $data['tglPeminjaman']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengembalian</th>
                        <th>:</th>
                        <td><?php echo $data['tglPengembalian']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Peminjaman</th>
                        <th>:</th>
                        <td><?php echo $data['jmlPeminjaman']; ?> Buah</td>
                    </tr>
                    <tr>
                        <th>Status Peminjaman</th>
                        <th>:</th>
                        <td><?php echo $data['statusPeminjaman']; ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan Peminjaman</th>
                        <th>:</th>
                        <td><?php echo $data['ketPeminjaman']; ?></td>
                    </tr>
                    <tr>
                        <th>
                            Data Petugas Peminjam
                        </th>
                    </tr>
                    <tr>
                        <th>Nama Petugas</th>
                        <th>:</th>
                        <td><?php echo $data['nmPetugas']; ?></td>
                    </tr>
                    <tr>
                        <th>Kode Petugas</th>
                        <th>:</th>
                        <td><?php echo $data['idPetugas']; ?></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td width="20%"></td>
                        <td width="25%">
                            <a href="index.php?halaman=proses-pengembalian&kdPeminjaman=<?= $data['kdPeminjaman']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Kembali</a>
                        </td>
                    </tr>
                <?php  } ?>
            </thead>
        </table>
    </div>

</div>