<?php 
    include '5header-lobby.php';
?>
<!-- search -->
<div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- Produk -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php 
                    if($_GET['search'] !='' || $_GET['kat'] !=''){
                        $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                    }
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC ");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                    <a href="detail-produk.php?id=<?php echo$p['product_id']?>&pen=<?php echo$p['penjual_id']?>">
                        <div class="col-4">
                            <img src="produk/<?php echo $p['product_image'] ?>">
                            <p class="nama"><?php echo substr($p['product_name'],0,30) ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['product_price'])  ?></p>
                        </div>
                        </a>
                    <?php }}else{?>
                        <p>Produk tidak ada</p>
                    <?php }?>
            </div>
        </div>
    </div>

<?php 
    include '5footer-lobby.php';
?>
