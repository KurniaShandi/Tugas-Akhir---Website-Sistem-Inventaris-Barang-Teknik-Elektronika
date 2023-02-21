<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
    </div>
    <div class="table-responsive">
        <div>
            <a href="index.php?halaman=tambah-petugas" class="btn btn-primary" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>
        </div><br>
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>IDEM</th>
                    <th>Nama Petugas</th>
                    <th>Gender</th>
                    <th>Telepon</th>
                    <th>Ruangan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $no = 1;

                $sql = $koneksi->query("SELECT * FROM petugasruangan");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['idPetugas']; ?></td>
                        <td><?php echo $data['nmPetugas']; ?></td>
                        <td><?php echo $data['jk']; ?></td>
                        <td><?php echo $data['hp']; ?></td>
                        <td><?php echo $data['nmRuangan']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td>
                            <a href="index.php?halaman=edit-petugas&idPetugas=<?php echo $data['idPetugas'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="index.php?halaman=hapus-petugas&idPetugas=<?php echo $data['idPetugas']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>


                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>