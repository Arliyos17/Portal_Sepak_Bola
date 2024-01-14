<?php
include "../koneksi.php";
if(isset($_REQUEST['aksi'])) $aksi = $_REQUEST['aksi'];
else $aksi="";

switch($aksi){
case 'Tambah':
$id		        = $_POST['id'];
$nama_tim   	= $_POST['nama_tim'];

$str = "INSERT INTO tim VALUES ('$id', '$nama_tim')";
$query = mysqli_query($koneksi, $str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;
case "Update":

$id		        = $_POST['id'];
$nama_tim   	= $_POST['nama_tim'];

$str = "UPDATE tim SET id_tim='$id', nama_tim='$nama_tim' WHERE id_tim = '$id' ";
$query = mysqli_query($koneksi, $str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;

case "Hapus":
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM tim WHERE id_tim = '$id'");

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}
break;
}
?>
<meta http-equiv="refresh" content="1;URL=tim.php">