<?php sleep(1); ?>
<?php session_start(); ?>
<?php if(isset($_SESSION['username'])){ ?>
<?php include "koneksi.php"; ?>
<?php
if(isset($_GET['id'])){
$a= "SELECT id_berita, penulis, judul, isi, sumber, liga, kategori, tanggal, headline FROM berita WHERE id_berita = '$_GET[id]'";
$b= mysqli_query($koneksi, $a);
list($idedit, $penulisedit, $juduledit, $isiedit, $sumberedit, $ligaedit, $kategoriedit, $tanggaledit, $headlineedit) = mysqli_fetch_row($b);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Berita - SportNews</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default">
					  <div class="container-fluid" style="background:#00A871;">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="index.php" style="color:#ffffff;">SportNews</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav">
							<li><a href="berita.php" style="color:#ffffff;">Berita</a></li>
							<li><a href="klasmen.php" style="color:#ffffff;">Klasemen</a></li>
							<li><a href="jadwal.php" style="color:#ffffff;">Jadwal</a></li>
							<li><a href="hasil.php" style="color:#ffffff;">Hasil Pertandingan</a></li>
							<li><a href="stadion.php" style="color:#ffffff;">Stadion</a></li>
							<li><a href="tim.php" style="color:#ffffff;">Tim</a></li>
						  </ul>
						  <form method="POST" action="berita.php" class="navbar-form navbar-right" role="search">
							<div class="form-group">
							  <input type="text" name="cari" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default">Cari</button>
						  </form>
						</div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<?php if(isset($_GET['id'])){ ?> <?php }else{ ?>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
			  Tambah Data+
			</button><br><br>
			<?php } ?>

			<!-- Modal -->
			<div class="<?php if(isset($_GET['id'])){ ?> <?php }else{ ?> modal fade <?php } ?>" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<a href="berita.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
					<h4 class="modal-title" id="myModalLabel"><?php if(isset($_GET['id'])){ ?> Edit Data <?php }else{ ?> Tambah Data <?php } ?></h4>
				  </div>
				  <div class="modal-body">
					<form method="POST" action="berita_proses.php" class="form-inline">
					<?php
					if(isset($_GET['id'])){
					echo "<input type='hidden' name='aksi' value='Update'>";
					}else{
					echo "<input type='hidden' name='aksi' value='Tambah'>";
					}
					?>
				  <div class="form-group">
					  ID Berita <br><input type="text" name="id" class="form-control" id="inputBerita" placeholder="ID Berita" value="<?php if(isset($_GET['id'])){ echo $idedit; } ?>" required><br>
					  Penulis <br><input type="text" name="penulis" class="form-control" id="inputPenulis" placeholder="Nama Penulis" value="<?php if(isset($_GET['id'])){ echo $penulisedit; } ?>" required><br>
					  Judul <br><input type="text" name="judul" class="form-control" id="inputJudul" placeholder="Judul" value="<?php if(isset($_GET['id'])){ echo $juduledit; } ?>" required><br>
					  Isi <br><textarea name="isi" class="form-control" id="inputIsi" placeholder="Isi" cols="60" rows="7" required><?php if(isset($_GET['id'])){ echo $isiedit; } ?></textarea><br>
					  Sumber <br><input type="text" name="sumber" class="form-control" id="inputSumber" placeholder="Sumber" value="<?php if(isset($_GET['id'])){ echo $sumberedit; } ?>" required><br>
					  Liga <br><select name="liga" id="inputLiga" class="form-control" placeholder="Liga" value="<?php if(isset($_GET['id'])){ echo $ligaedit; } ?>" required>
					  	<option disabled selected>Pilih</option>
					  	<option <?php if(isset($_GET['id']) && $ligaedit == 'Inggris'){ echo 'selected'; } ?>>Inggris</option>
						<option <?php if(isset($_GET['id']) && $ligaedit == 'Spanyol'){ echo 'selected'; } ?>>Spanyol</option>
						<option <?php if(isset($_GET['id']) && $ligaedit == 'Italy'){ echo 'selected'; } ?>>Italy</option>
						<option <?php if(isset($_GET['id']) && $ligaedit == 'German'){ echo 'selected'; } ?>>German</option>
						<option <?php if(isset($_GET['id']) && $ligaedit == 'Indonesia'){ echo 'selected'; } ?>>Indonesia</option>
						<option <?php if(isset($_GET['id']) && $ligaedit == 'France'){ echo 'selected'; } ?>>France</option>
						<option <?php if(isset($_GET['id']) && $ligaedit == 'Champions'){ echo 'selected'; } ?>>Champions</option>
						</select><br>
					  Kategori <br><select name="kategori" class="form-control" id="inputKategori" placeholder="Kategori" value="<?php if(isset($_GET['id'])){ echo $kategoriedit; } ?>" required>
					  <option disabled selected>Pilih</option>
					  	<option <?php if(isset($_GET['id']) && $kategoriedit == 'Indonesia'){ echo 'selected'; } ?>>Indonesia</option>
						<option <?php if(isset($_GET['id']) && $kategoriedit == 'Internasional'){ echo 'selected'; } ?>>Internasional</option>
						</select><br>
					  Tanggal <br><input type="datetime-local" name="tanggal" class="form-control" id="inputTanggal" placeholder="Tahun-Bulan-Tanggal" value="<?php if(isset($_GET['id'])){ echo $tanggaledit; } ?>" required><br>
					  Headline <br><input type="text" name="headline" class="form-control" id="inputHeadline" placeholder="Headline" value="<?php if(isset($_GET['id'])){ echo $headlineedit; } ?>" required>
				  </div><br><br>
				  <div class="modal-footer">
					<a href="berita.php"><button type="reset" class="btn btn-default">Reset</button></a>
					<button type="submit" class="btn btn-primary"><?php if(isset($_GET['id'])){ ?> Update <?php }else{ ?> Simpan <?php } ?></button>
				  </div>
				</form>
				  </div>
				</div>
			  </div>
			</div>
				<?php
				//pagging
				//1. cari banyak total data
				$total = mysqli_query($koneksi, "SELECT * FROM berita");
				$total_data = mysqli_num_rows($total);

				//2. tentukan banyak data yg diinginkan tampil
				$hal = 5;

				//3. cari jumlah banyak halaman
				$jum_hal = ceil($total_data/$hal);

				if(isset($_GET['awal'])) $awal = $_GET['awal'];
				else $awal = 0;
				?>
				<div class="table-responsive">
				  <table class="table table-bordered">
					<tr class="active">
						<th style="text-align:center;">ID Berita</th>
						<th style="text-align:center;">Penulis</th>
						<th style="text-align:center;">Judul</th>
						<th style="text-align:center;">Isi</th>
						<th style="text-align:center;">Sumber</th>
						<th style="text-align:center;">Liga</th>
						<th style="text-align:center;">Kategori</th>
						<th style="text-align:center;">Tanggal</th>
						<th style="text-align:center;">Headline</th>
						<th colspan="2" style="text-align:center;">Aksi</th>
					</tr>
					<?php
						if(isset($_POST['cari'])) $kata = $_POST['cari'];
						else $kata = "";
						//4. batasi query dg Limit
						$str = "SELECT id_berita, penulis, judul, isi, sumber, liga, kategori, tanggal, headline FROM berita WHERE judul LIKE '%$kata%' LIMIT $awal, $hal ";
						$query = mysqli_query ($koneksi, $str) or die (mysqli_error());
						$jumlah = mysqli_num_rows($query);
						if($jumlah == '0'){
						echo "<tr><td colspan='8' align='center'>Data kosong</td></tr>";
						} else {
						while(list($id, $penulis, $judul, $isi, $sumber, $liga, $kategori, $tanggal, $headline) = mysqli_fetch_row($query)) {
					?>
					<tr style="text-align:center;">
						<td><?php echo $id; ?></td>
						<td><?php echo $penulis; ?></td>
						<td><?php echo $judul; ?></td>
						<td><?php echo substr($isi,0,100); ?> ...</td>
						<td><?php echo $sumber; ?></td>
						<td><?php echo $liga; ?></td>
						<td><?php echo $kategori; ?></td>
						<td><?php echo $tanggal; ?></td>
						<td><?php echo $headline; ?></td>
						<td><a href="berita.php?id=<?php echo $id; ?>"><button class="btn btn-success">Edit</button></a></td>
						<td><a href="#" onclick="javascript: if (confirm('Yakin dihapus?')){
						window.location.href='berita_proses.php?aksi=Hapus&id=<?php echo $id ?>';}"><button class="btn btn-danger">Hapus</button></a></td>
					</tr>
					<?php
					}
					}
					?>
				  </table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<nav>
				  <ul class="pagination">
					<li>
						<?php if($awal != 0){ echo "<a href='berita.php?awal=".($awal-$hal)."' aria-label='Previous'>
							<span aria-hidden='true'>&laquo;</span>
							</a>";
							}
						?>
					</li>
					<li>
						<?php for($i=0; $i <  $jum_hal; $i++){
							$x = $i * $hal;
							if($awal == $x){ echo "<span aria-hidden='true' class='disabled' style='color:black;'>".($i+1)."</span>"; }else{ echo" <a href='berita.php?awal=$x'>
							".($i+1)."
							</a>";
							}
							}
						?>
					</li>
					<li>
						<?php if($awal != $x){ echo "<a href='berita.php?awal=".($awal+$hal)."' aria-label='Next'>
							<span aria-hidden='true'>&raquo;</span>
							</a>";
							}
						?>
					</li>
				</ul>
				</nav>
			</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
}else{
header("location:login.php");
}
?>