<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Tata Kelola Data Barang</h1>
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
                    <th width="19%">Aksi</th>
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
                            <a href="index.php?halaman=tambah-perawatan&kdBarang=<?php echo $data['kdBarang'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Perawatan</a>
                            <hr>
                            <a href="index.php?halaman=tambah-penyusutan&kdBarang=<?php echo $data['kdBarang']; ?>" class="btn btn-danger"><i class="fa fa-minus"></i> Penyusutan</a>
                        </td>
                    </tr>


                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>