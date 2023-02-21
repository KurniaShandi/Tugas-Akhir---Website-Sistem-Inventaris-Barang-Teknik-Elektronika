<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi Peminjaman</h1>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Tanggal Beli</th>
                    <th>Kondisi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $no = 1;

                $sql = $koneksi->query("select * from barang");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['kdBarang']; ?></td>
                        <td><?php echo $data['nmBarang']; ?></td>
                        <td><?php echo $data['merkBarang']; ?></td>
                        <td><?php echo $data['jmlBarang']; ?></td>
                        <td><?php echo $data['tglBeli']; ?></td>
                        <td><?php echo $data['kondisi']; ?></td>
                        <td>
                            <img src="halaman/barang/img/<?php echo $data['foto']; ?>" width="50">
                        </td>
                        <td>
                            <a href="index.php?halaman=tambah-peminjaman&kdBarang=<?php echo $data['kdBarang']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Pinjam</a>
                        </td>
                    </tr>


                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>