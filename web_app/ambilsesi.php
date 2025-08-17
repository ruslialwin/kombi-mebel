<?php 

session_start();

echo "Username: ".$_SESSION['username']."<br>";
echo "Nama: ".$_SESSION['penjual_nama']."<br>";
echo "Email: ".$_SESSION['penjual_email'];

?>