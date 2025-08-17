<?php
    include '5header-lobby.php';
    include 'db.php';
    $pe = $_SESSION['penjual_id'];
    $ok = $_GET['id'];
    $komentar = mysqli_query($conn, "SELECT * FROM tb_komen WHERE penjual_id=$pe && komen_id=$ok ");
    
    if(mysqli_num_rows($komentar)==0){//mencegah error jika id di alamat web diubah menjadi id yang tidak ada
        echo '<script>window.location="produk.php"</script>';
    }
    $k = mysqli_fetch_object($komentar);
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Komen</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="komentar" placeholder="Komentar" class="input-control" value="<?php echo $k->komentar?>"required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                    <a href = "javascript:history.back(-3)" class="btn">Kembali 2x</a>
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $komen = ucfirst($_POST['komentar']);

                       $update = mysqli_query($conn, "UPDATE tb_komen SET
                                                komentar = '".$komen."'
                                                WHERE komen_id= '".$k->komen_id."'
                                                ");
                        if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }

                    }
                ?>
            </div>
        </div>
    </div>

    <?php 
    include '5footer-lobby.php';
?>