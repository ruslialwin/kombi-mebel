<?php
    include '1header-admin.php';
    include 'db.php';

    $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."'");
    
    if(mysqli_num_rows($kategori)==0){//mencegah error jika id di alamat web diubah menjadi id yang tidak ada
        echo '<script>window.location="data-kategori.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name?>"required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $nama = ucwords($_POST['nama']);

                       $update = mysqli_query($conn, "UPDATE tb_category SET
                                                category_name = '".$nama."'
                                                WHERE category_id= '".$k->category_id."'
                                                ");
                        if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="data-kategori.php"</script>';
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