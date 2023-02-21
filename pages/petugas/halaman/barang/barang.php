
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
    </div>
    <hr>
    <div class="table-responsive">
        <div>
            <a href="index.php?halaman=tambah-barang" class="btn btn-primary" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>
        </div><br>
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
                $id_petugas = $_SESSION['id_petugas'];

                $no = 1;

                $sql = $koneksi->query("SELECT * FROM barang WHERE idPetugas = '$id_petugas'");

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
                            <img src="../admin/halaman/barang/img/<?php echo $data['foto']; ?>" width="50">
                        </td>
                        <td>
                            <a href="index.php?halaman=edit-barang&kdBarang=<?php echo $data['kdBarang'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="index.php?halaman=hapus-barang&kdBarang=<?php echo $data['kdBarang']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>


                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>