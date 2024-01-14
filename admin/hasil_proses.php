<?php
session_start();
include "koneksi.php";
if(isset($_REQUEST['aksi'])) $aksi = $_REQUEST['aksi'];
else $aksi="";

switch($aksi){
case 'Tambah':
$id		    = $_POST['id'];
$skor_a	    = $_POST['skor_a'];
$Skor_b	    = $_POST['skor_b'];
$id_jadwal	= $_POST['id_jadwal'];

$str = "INSERT INTO hasil VALUES ('$id', '$skor_a', '$Skor_b', '$id_jadwal')";
$query = mysqli_query($koneksi, $str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;
case "Update":

$id		    = $_POST['id'];
$skor_a	    = $_POST['skor_a'];
$skor_b	    = $_POST['skor_b'];
$id_jadwal	= $_POST['id_jadwal'];

$str = "UPDATE hasil SET id_hasil='$id', skor_a='$skor_a', skor_b = '$skor_b', id_jadwal = '$id_jadwal' WHERE id_hasil = '$id' ";
$query = mysqli_query($koneksi, $str) or die (mysqli_error());

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;

case "Hapus":
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM hasil WHERE id_hasil = '$id'");

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}
break;
}
?>
<meta http-equiv="refresh" content="1;URL=hasil.php">