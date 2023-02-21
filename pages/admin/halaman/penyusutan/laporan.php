<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penyusutan Barang</h1>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>Tanggal Penyusutan</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Kode Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $no = 1;

                $sql = $koneksi->query("select * from penyusutan");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['tglSusut']; ?></td>
                        <td><?php echo $data['jmlSusut']; ?></td>
                        <td><?php echo $data['ketSusut']; ?></td>
                        <td><?php echo $data['kdBarang']; ?></td>
                        <td>
                            <a href="index.php?halaman=edit-barang&id=<?php echo $data['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="index.php?halaman=hapus-perawatan&id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
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

        include "halaman/penyusutan/modal_pdf.php";

        ?>

    </div>

</div>