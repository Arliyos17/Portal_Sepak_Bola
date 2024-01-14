<?php
session_start();
include "koneksi.php";
if(isset($_REQUEST['aksi'])) $aksi = $_REQUEST['aksi'];
else $aksi="";

switch($aksi){
case 'Tambah':
$id		 	 = $_POST['id'];
$penulis	 = $_POST['penulis'];
$judul		 = $_POST['judul'];
$isi		 = $_POST['isi'];
$sumber		 = $_POST['sumber'];
$liga 		 = $_POST['liga'];
$kategori	 = $_POST['kategori'];
$tanggal	 = $_POST['tanggal'];
$headline	 = $_POST['headline'];

$str = "INSERT INTO berita VALUES ('$id', '$penulis','$judul', '$isi', '$sumber', '$liga', '$kategori', '$tanggal', '$headline')";
$query = mysqli_query($koneksi,$str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;
case "Update":

$id		 	 = $_POST['id'];
$penulis	 = $_POST['penulis'];
$judul		 = $_POST['judul'];
$isi		 = $_POST['isi'];
$sumber		 = $_POST['sumber'];
$liga 		 = $_POST['liga'];
$kategori	 = $_POST['kategori'];
$tanggal	 = $_POST['tanggal'];
$headline	 = $_POST['headline'];

$str = "UPDATE berita SET id_berita='$id', penulis='$penulis', judul='$judul', isi='$isi', sumber='$sumber', liga='$liga', kategori='$kategori', tanggal='$tanggal', headline='$headline' WHERE id_berita = '$id' ";
$query = mysqli_query($koneksi, $str);

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}

break;

case "Hapus":
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita = '$id'");

if($query == true){
echo"<script>alert('Berhasil')</script>";
} else{
echo "<script>alert('Gagal')</script>";
}
break;
}
?>
<meta http-equiv="refresh" content="1;URL=berita.php">