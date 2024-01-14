<?php
session_start();
include "koneksi.php";
if(isset($_REQUEST['aksi'])) $aksi = $_REQUEST['aksi'];
else $aksi="";

switch($aksi){
case 'Tambah':
$id		       = $_POST['id'];
$id_tim1	   = $_POST['id_tim1'];
$id_tim2	   = $_POST['id_tim2'];
$tanggal       = $_POST['tanggal'];
$waktu	       = $_POST['waktu'];
$liga	       = $_POST['liga'];
$stadion       = $_POST['id_stadion'];
$link_siaran   = $_POST['link_siaran'];

$str = "INSERT INTO jadwal VALUES ('$id', '$id_tim1', '$id_tim2', '$tanggal', '$waktu', '$liga', '$stadion', '$link_siaran')";
$query = mysqli_query($koneksi, $str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;
case "Update":

$id		     = $_POST['id'];
$id_tim1	 = $_POST['id_tim1'];
$id_tim2	 = $_POST['id_tim2'];
$tanggal     = $_POST['tanggal'];
$waktu	     = $_POST['waktu'];
$liga	     = $_POST['liga'];
$stadion     = $_POST['id_stadion'];
$link_siaran = $_POST['link_siaran'];

$str = "UPDATE jadwal SET id_jadwal='$id', id_tim1='$id_tim1', id_tim2='$id_tim2', tanggal='$tanggal', waktu='$waktu', liga='$liga', id_stadion='$stadion', link_siaran='$link_siaran' WHERE id_jadwal = '$id' ";
$query = mysqli_query($koneksi, $str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;

case "Hapus":
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal = '$id'");

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}
break;
}
?>
<meta http-equiv="refresh" content="1;URL=jadwal.php">