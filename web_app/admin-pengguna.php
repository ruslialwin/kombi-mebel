<?php
    include '1header-admin.php';
    include 'db.php';
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Pengguna</h3>
            <div class="box">
                <p><a href="tambah-akuna.php">Tambah Pengguna</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $akun=mysqli_query($conn, "SELECT * FROM tb_akun ORDER BY penjual_id DESC");//Desc=descending
                            if(mysqli_num_rows($akun)>0){
                            while($row = mysqli_fetch_array($akun)){
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row['penjual_nama']?></td>
                            <td><?php echo $row['username']?></td>
                            <td><?php echo $row['penjual_telp'] ?></td>
                            <td><?php echo $row['penjual_email']?></td>
                            <td><?php echo $row['penjual_alamat']?></td></td>
                            <td><?php echo $row['level']?></td>
                            <td>
                                <a href="edit-aprofile.php?id=<?php echo $row['penjual_id']?>">Edit</a> || <a href="
                                proses-hapus.php?idl=<?php echo $row['penjual_id']?>" onclick="return confirm('Apakah Anda Yakin ingin menghapus data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                                <tr>
                                    <td colspan='8'>Tidak ada data</td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php 
    include '5footer-lobby.php';
?>