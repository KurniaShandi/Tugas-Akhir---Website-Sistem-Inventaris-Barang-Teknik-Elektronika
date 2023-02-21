<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
    </div>
    <hr>
    <div class="table-responsive">
        <div class="row justify-content-between">
            <div class="col-4">
                <a href="index.php?halaman=tambah-mahasiswa" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <br>
        <div>

        </div>
        <table class="table table-striped table-bordered table-hover" id="table">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Telepon</th>
                    <th>Prodi</th>
                    <th>Tahun</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $no = 1;

                $sql = $koneksi->query("SELECT * FROM mahasiswa");

                if (isset($_GET['cari'])) {
                    $sql = $koneksi->query("SELECT * FROM mahasiswa WHERE nmMHS LIKE '%" . $_GET['cari'] . "%'");
                }

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nim']; ?></td>
                        <td><?php echo $data['nmMhs']; ?></td>
                        <td><?php echo $data['jk']; ?></td>
                        <td><?php echo $data['hp']; ?></td>
                        <td><?php echo $data['prodi']; ?></td>
                        <td><?php echo $data['thnMasuk']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td>
                            <a href="index.php?halaman=edit-mahasiswa&nim=<?php echo $data['nim'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="index.php?halaman=hapus-mahasiswa&nim=<?php echo $data['nim']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>


                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>