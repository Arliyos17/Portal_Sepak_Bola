<?php
include "../koneksi.php";
if(isset($_REQUEST['aksi'])) $aksi = $_REQUEST['aksi'];
else $aksi="";

switch($aksi){
case 'Tambah':
$id		        = $_POST['id'];
$nama_stadion	= $_POST['nama_stadion'];

$str = "INSERT INTO stadion VALUES ('$id', '$nama_stadion')";
$query = mysqli_query($koneksi, $str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;
case "Update":

$id		        = $_POST['id'];
$nama_stadion	= $_POST['nama_stadion'];

$str = "UPDATE stadion SET id_stadion='$id', nama_stadion='$nama_stadion' WHERE id_stadion = '$id' ";
$query = mysqli_query($koneksi, $str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;

case "Hapus":
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM stadion WHERE id_stadion = '$id'");

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}
break;
}
?>
<meta http-equiv="refresh" content="1;URL=stadion.php">