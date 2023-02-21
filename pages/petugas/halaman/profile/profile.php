<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile <?php echo $_SESSION['level']; ?></h1>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-light">
                <?php

                $id_petugas = $_SESSION['id_petugas'];

                $sql = $koneksi->query("SELECT * FROM petugasruangan WHERE idPetugas = '$id_petugas'");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <th width="19%">IDEM</th>
                        <th width="4%">:</th>
                        <td><?php echo $data['idPetugas']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Nama Petugas</th>
                        <th>:</th>
                        <td><?php echo $data['nmPetugas']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Gender</th>
                        <th>:</th>
                        <td><?php echo $data['jk']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Telepon</th>
                        <th>:</th>
                        <td><?php echo $data['hp']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Nama Ruangan</th>
                        <th>:</th>
                        <td><?php echo $data['nmRuangan']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Alamat</th>
                        <th>:</th>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Username</th>
                        <th>:</th>
                        <td><?php echo $data['username']; ?></td>
                    </tr>
                    <tr>

                    </tr>
                    <tr>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td width="20%"></td>
                        <td width="25%">
                            <a href="index.php?halaman=edit-petugas&idPetugas=<?php echo $data['idPetugas'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Perbaharui Data Anda</a>
                        </td>
                    </tr>
                <?php  } ?>
            </thead>
        </table>
    </div>

</div>