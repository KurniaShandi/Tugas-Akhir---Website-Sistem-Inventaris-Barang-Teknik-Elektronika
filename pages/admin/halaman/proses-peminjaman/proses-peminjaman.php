<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proses Peminjaman Barang</h1><button class="btn btn-xs btn-grey"><a href="index.php?halaman=pengembalian"><i class=" fa fa-undo"></i></a></button>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Mahasiswa</th>
                    <th>Status</th>
                    <th>Barang</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $no = 1;


                $sql = $koneksi->query("SELECT * FROM peminjaman INNER JOIN mahasiswa ON mahasiswa.nim=peminjaman.nim INNER JOIN barang ON barang.kdBarang = peminjaman.kdBarang WHERE statusPeminjaman='Sedang Diproses'");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['nmMhs']; ?></td>
                        <td><?php echo $data['statusPeminjaman']; ?></td>
                        <td><?php echo $data['nmBarang']; ?></td>
                        <td>
                            <a href="index.php?halaman=detail-peminjaman&kdPeminjaman=<?= $data['kdPeminjaman']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Detail</a>
                        </td>
                        <td>
                            <a href="index.php?halaman=edit-barang&kdBarang=<?php echo $data['kdBarang'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="index.php?halaman=hapus-barang&kdBaranxg=<?php echo $data['kdBarang']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>


                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>