<?php
session_start();
include "koneksi.php";
$user	= $_POST['user'];
$pass	= $_POST['pass'];
$query	= "SELECT username, nama FROM admin WHERE username = '$user' AND password = MD5('$pass')";
$proses	= mysqli_query($koneksi,$query);
$jumlah	= mysqli_num_rows($proses);
if($jumlah == 0){
echo "<script>alert('Login gagal');</script>";
}else{
list($username) = mysqli_fetch_row($proses);
$_SESSION['username'] = $username;
}
?>
<meta http-equiv="refresh" content="1;URL=index.php">