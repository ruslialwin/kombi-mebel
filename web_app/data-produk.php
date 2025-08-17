<?php
    include '1header-admin.php';
    include 'db.php';
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="tambah-produk.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $produk=mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");//Desc=descending
                            if(mysqli_num_rows($produk)>0){
                            while($row = mysqli_fetch_array($produk)){
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row['category_name']?></td>
                            <td><?php echo $row['product_name']?></td>
                            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                            <td><?php echo $row['product_description']?></td>
                            <td><a href="produk/<?php echo $row['product_image']?>" target="_blank"><img src="produk/<?php echo $row['product_image']?>" width="100px"></a></td>
                            <td><?php echo ($row['product_status'] == 0)?'Tidak Aktif':'Aktif';?></td>
                            <td>
                                <a href="edit-produk.php?id=<?php echo $row['product_id']?>">Edit</a> || <a href="
                                proses-hapus.php?idp=<?php echo $row['product_id']?>" onclick="return confirm('Apakah Anda Yakin ingin menghapus data?')">Hapus</a>
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