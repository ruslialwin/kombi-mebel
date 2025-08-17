<?php 
include '5header-lobby.php';
?>

    <!-- Detail Produk -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?> " width="300px" style="margin-left: auto;margin-top: auto;margin-bottom: auto;margin-right: auto;display: block;">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name?></h3>
                    <p>Status : <b><?php echo ($p->product_status == 0)?'Tidak Aktif':'Aktif' ?></b></p>
                    <p>Deskripsi : <br>
                        <?php echo $p->product_description ?>
                    </p>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <form method="POST" action="">
                        <button type="submit"  name="klik" >
                        Hubungi via Whatsapp</button><img src="img/wa.png" width="40px">
                    </form>
                    <?php 
                    $jual = mysqli_query($conn, "SELECT * from tb_akun WHERE penjual_id=$p->penjual_id");
                    if(isset($_POST['klik'])){
                        
                        if(empty($_SESSION['penjual_nama'])){ 
                            echo '<script>alert("Anda harus login untuk dapat mengakses whatsapp")</script>';
                            echo '<script>window.location="login/login.php"</script>';
                      } else { ?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo$j->penjual_telp?>
                        &text=Hai, saya tertarik dengan produk <?php echo$p->product_name ?> Anda. Perkenalkan nama saya <?php echo$_SESSION['penjual_nama']; ?>, Terima kasih. ">
                        <img src="img/masukwa.png" width="150px"></a>
                        <?php } } ?>
                    
                </div>
            </div>
            <a href="login/login.php"></a>
            <h3>Ulasan</h3>
            <div class="box">
                <div class="col-2">
                    <?php 
                    if(empty($_SESSION['penjual_nama'])){
                        echo '<h3>Anda harus login untuk dapat mengakses ulasan</h3>';
                        echo "<a href='login/login.php'><h4 style='color: forestgreen;'>Masuk</h4></a>";
                    }else{
                        echo "<h3><u>Ulasan Anda</u></h3>"
                    ?>
                    <?php }?>
                    <table  class="table" cellspacing="0">
                        <?php 
                        $no = 1;
                        $pe = $_SESSION['penjual_id'];
                        $ok = $_GET['id'];
                        $menn=mysqli_query($conn, "SELECT * FROM tb_komen WHERE penjual_id=$pe && product_id=$ok ");//Desc=descending
                        if(mysqli_num_rows($menn)>0){
                        while($m = mysqli_fetch_array($menn)){
                        ?>
                        
                        <tr>
                            <th><?php echo $no++?>.</th>
                            <td><?php echo $m['komentar'] ?></td>
                            <td>
                                <a href="edit-komen.php?id=<?php echo $m['komen_id']?>">Edit</a> || <a href="
                                proses-hapusK.php?idk=<?php echo $m['komen_id']?>" onclick="return confirm('Apakah Anda Yakin ingin menghapus data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                                <tr>
                                    <td colspan='8'>Tidak ada data</td>
                                </tr>
                        <?php } ?>
                        </table>
                </div>
                <div class="col-2">
                    <h2><u>Ulasan Pengguna</u></h2>
                        <?php 
                        $idproduct = $_GET['id'];
                        $komen1 = "SELECT * FROM tb_komen LEFT JOIN tb_akun USING (penjual_id) WHERE product_id= '$idproduct'";
                        $menn=mysqli_query($conn, $komen1);//Desc=descending
                        if(mysqli_num_rows($menn)>0){
                        while($m = mysqli_fetch_array($menn)){
                        ?>
                        <tr>
                            <th><b><?php echo $m['penjual_nama']?></b></th><br>
                        </tr>
                        <tr>
                            <td>Ulasan : <?php echo $m['komentar'] ?></td><br>
                        </tr>
                        <tr><h6>Date : <?php echo $m['waktu'] ?></h6></tr>
                        <hr>
                        <?php }}else{ ?>
                                <tr>
                                    <td colspan='8'>Tidak ada data</td>
                                </tr>
                        <?php } ?>
                </div>
            </div>
            
            <div class="box">
            <h4>Masukkan Ulasan</h4>
            <br>
                <form id="Tkomen" method="POST" novalidate="" onsubmit="return validasi_input(this)" action="" autocomplete="off" onclick="" >
                    <div>
                    <h5>Isi    : </h5>
                    <textarea id="komentar" class="input-komen" name="komentar" class="form-control" placeholder="Ketikkan ulasanmu disini" rows="5" cols="30" required></textarea>
                    </div>
                    <br>
                    <div class="btn-input-komen">
                    <input type="submit" name="submit" value="  Kirim  " >
                    <input type="reset" value="  Reset  ">
                    </div>
                </form>
                <?php if(isset($_POST['submit'])){
                                $idpe = $_SESSION['penjual_id'];
                                $idpo = $p->product_id;
                                $konten = $_POST['komentar'];

                                $sql = "INSERT INTO tb_komen(penjual_id,product_id,komentar) VALUES('$idpe','$idpo','$konten')";
                                if($conn->query($sql) === TRUE){
                                    echo("<meta http-equiv='refresh' content='0'>");
                                    echo "<div class='alert'>Ulasan berhasil ditambahkan</div>";
                                    
                                    } else {
                                        echo "Terjadi kesalahan: " . $sql . "<br/>" . $conn->error;
                                    }
                                    $conn->close();
                                }
                                ?>
            </div>
        </div>
    </div>


    <script src="login/lib/jquery.js"></script>
    <script src="login/dist/jquery.validate.js"></script>
    <script src="js/vanilla.js"></script>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
   <script type="text/javascript">
        function validasi_input(form){
        if (form.komentar.value == ""){
            alert("Komentar masih kosong!");
            form.komentar.focus();
            return (false);
        }   
        return (true);
        }
        </script>
        <script type="text/javascript">
        function validasi_input(form){
        var mincar = 4;
        if (form.komentar.value.length < mincar){
            alert("Panjang komentar Minimal 4 Karater!");
            form.komentar.focus();
            return (false);
        }
        return (true);
        }
        </script>
<?php 
include '5footer-lobby.php';
?>
