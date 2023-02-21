<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Perawatan Barang</h1>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead class="table-light" align="center">
                <tr>
                    <th>No.</th>
                    <th>Tanggal Perawatan</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Kode Barang</th>
                    <th width="19%">Aksi</th>
                </tr>
            </thead>
            <tbody align="center">
                <?php
                $id_petugas = $_SESSION['id_petugas'];
                $no = 1;

                $sql = $koneksi->query("SELECT * FROM perawatan INNER JOIN barang ON perawatan.kdBarang = barang.kdBarang WHERE barang.idPetugas = '$id_petugas'");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['tglRawat']; ?></td>
                        <td><?php echo $data['jmlRawat']; ?></td>
                        <td><?php echo $data['ketRawat']; ?></td>
                        <td><?php echo $data['kdBarang']; ?></td>
                        <td>
                            <a href="#&id=<?php echo $data['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                            <a href="index.php?halaman=hapus-penyusutan&id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>


                <?php  } ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#cetakpdf">
                <i class="fa fa-print"></i>
                Cetak
            </a>
        </div>

        <?php

        include "halaman/perawatan/modal_pdf.php";

        ?>

    </div>

</div>