<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
    </div>
    <hr>
    <div class="table-responsive">
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
                    </tr>


                <?php  } ?>
            </tbody>
        </table>
    </div>

</div>