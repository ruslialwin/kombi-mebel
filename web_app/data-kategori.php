<?php
    include '1header-admin.php';
    include 'db.php';
    
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kategori=mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");//Desc=descending
                            while($row = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row['category_name']?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row['category_id']?>">Edit</a> || <a href="
                                proses-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm('Apakah Anda Yakin ingin menghapus data?')">Hapus</a>
                            </td>
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