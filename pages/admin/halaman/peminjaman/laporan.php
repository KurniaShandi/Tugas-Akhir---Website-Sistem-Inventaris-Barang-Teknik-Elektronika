<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Peminjaman Barang</h1><button class="btn btn-xs btn-grey"><a href="index.php?halaman=peminjaman"><i class=" fa fa-undo"></i></a></button>
    </div>
    <hr>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Peminjaman</th>
                    <th>Pengembalian</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th width="19%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $no = 1;

                $sql = $koneksi->query("SELECT * FROM peminjaman");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['tglPeminjaman']; ?></td>
                        <td><?php echo $data['tglPengembalian']; ?></td>
                        <td><?php echo $data['jmlPeminjaman']; ?></td>
                        <td><?php echo $data['statusPeminjaman']; ?></td>
                        <td><?php echo $data['ketPeminjaman']; ?></td>
                        <td>
                            <a href="index.php?halaman=edit-barang&kdBarang=<?php echo $data['kdBarang'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="index.php?halaman=hapus-barang&kdBarang=<?php echo $data['kdBarang']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
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

        include "halaman/peminjaman/modal_pdf.php";

        ?>

    </div>

</div>