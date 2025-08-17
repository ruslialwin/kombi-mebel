<?php
    include '1header-admin.php';
    include 'db.php';

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
    $p = mysqli_fetch_object($produk);

?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                   <select name="kategori" class="input-control" required>
                       <option value="">--Pilih--</option>
                       <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                        while($r = mysqli_fetch_array($kategori)){
                       ?>
                        <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)?
                        'selected':'' ?>><?php echo $r['category_name']?></option>
                        <?php } ?>
                   </select>

                   <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name?>" required>
                   <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->product_price?>" required>

                   <img src="produk/<?php echo $p->product_image?>" width="100px">
                   <input type="hidden" name="foto" value="<?php echo $p->product_image?>"> <!-- berisi nama foto  -->
                   <input type="file" name="gambar" class="input-control">
                   <label>Deskripsi</label>
                   <textarea name="deskripsi" placeholder="deskripsi" class="input-control" cols="30" rows="10"><?php echo $p->product_description?></textarea></br>
                   <select name="status" class="input-control">
                       <option value="">--Pilih--</option>
                       <option value="1" <?php echo ($p->product_status ==1)? 'selected':'';?>>Aktif</option>
                       <option value="0" <?php echo ($p->product_status ==0)? 'selected':'';?>>Tidak Aktif</option>
                   </select>
                    <input type="submit" name="submit" value="Submit" class="btn">           
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        //menampung data inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];
                        $foto       = $_POST['foto'];

                        //menampung data gambar yang baru
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];//array 0 berisi nama file, array 1 berisi tipe file

                        $newname = 'produk'.time().'.'.$type2;

                         //menampung data format file yang diizinkan
                         $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        // validasi jika admin ganti gambar
                        if($filename != ''){//jika bagian upload gambar terisi

                             //validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){//jika format file tidak terdapat dalam tipe yang diizinkan
                                echo '<script>alert("Format File Tidak Diizinkan")</script>';
                            }else{
                                unlink('./produk/'.$foto); // gambar lama di folder di delete
                                move_uploaded_file($tmp_name, './produk/'.$newname);//gambar baru disimpan ke folder
                                //tampung data gambar baru
                                $namagambar = $newname;
                            }

                        }else{
                             //jika admin tidak ganti gambar
                            $namagambar = $foto;

                        }

                        //query update data produk
                        $update = mysqli_query($conn, "UPDATE tb_product SET
                                                category_id ='".$kategori."',
                                                product_name ='".$nama."',
                                                product_price ='".$harga."',
                                                product_description ='".$deskripsi."',   
                                                product_image ='".$namagambar."', 
                                                product_status = '".$status."'  
                                                WHERE product_id='".$p->product_id."'  ");

                        //jika update berhasil
                        if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="data-produk.php"</script>';
                        }else{ //jika tidak berhasil
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
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>