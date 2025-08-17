<?php
    include 'db.php';
    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_komen WHERE komen_id = '".$_GET['idk']."'");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    
?>
