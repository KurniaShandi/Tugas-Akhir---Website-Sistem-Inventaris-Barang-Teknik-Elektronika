<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile <?php echo $_SESSION['level']; ?></h1>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-light">
                <?php

                $username = $_SESSION['username'];

                $sql = $koneksi->query("SELECT * FROM mahasiswa WHERE nim = '$username'");

                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <th width="19%">NIM</th>
                        <th width="4%">:</th>
                        <td><?php echo $data['nim']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Nama Mahasiswa</th>
                        <th>:</th>
                        <td><?php echo $data['nmMhs']; ?></td>
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
                        <th width="19%">Program Studi</th>
                        <th>:</th>
                        <td><?php echo $data['prodi']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Tahun Masuk</th>
                        <th>:</th>
                        <td><?php echo $data['thnMasuk']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Alamat</th>
                        <th>:</th>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <th width="19%">Username</th>
                        <th>:</th>
                        <td><?php echo $data['nim']; ?></td>
                    </tr>
                <?php  } ?>
            </thead>
        </table>
    </div>

</div>