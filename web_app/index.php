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
    
    <!-- kategory -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php 
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                ?>
                    <a href="produk.php?kat=<?php echo$k['category_id'] ?>">
                    <div class="col-5">
                        <img src="img/ikon-kategori.png" alt="iconkategori" width="50px" style="margin-bottom: 5px;">
                        <p><?php echo$k['category_name'] ?></?>
                    </div>
                    </a>
                    <?php }} else{?>
                        <p>Kategori tidak ada</p>
                    <?php }?>
            </div>
        </div>
    </div>

    <!-- New Produk -->
    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php 
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1  ORDER BY product_id DESC LIMIT 8");
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
                    <h4><a href="produk.php"> Tampilkan produk lainnya</a></h4>
            </div>
        </div>
    </div>

    <?php 
include '5footer-lobby.php';
?>