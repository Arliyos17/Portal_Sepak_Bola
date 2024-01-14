<?php sleep(1); ?>
<?php session_start(); ?>
<?php if(isset($_SESSION['username'])){ ?>
<?php include "koneksi.php"; ?>
<?php
if(isset($_GET['id'])){
$a= "SELECT id_klasmen, id_tim, main, menang, seri, kalah, gol_kandang, gol_tandang, selisih_gol, poin, liga FROM klasmen WHERE id_klasmen = '$_GET[id]'";
$b= mysqli_query($koneksi, $a);
list($idedit, $idtim_edit, $mainedit, $menangedit, $seriedit, $kalahedit, $golkedit, $goltedit, $selisihedit, $poinedit, $ligaedit) = mysqli_fetch_row($b);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klasemen - SportNews</title>

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
						  <form method="POST" action="klasmen.php" class="navbar-form navbar-right" role="search">
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
					<a href="klasmen.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
					<h4 class="modal-title" id="myModalLabel"><?php if(isset($_GET['id'])){ ?> Edit Data <?php }else{ ?> Tambah Data <?php } ?></h4>
				  </div>
				  <div class="modal-body">
					<form method="POST" action="klasmen_proses.php" class="form-inline">
					<?php
					if(isset($_GET['id'])){
					echo "<input type='hidden' name='aksi' value='Update'>";
					}else{
					echo "<input type='hidden' name='aksi' value='Tambah'>";
					}
					?>
					  <div class="form-group">
						  ID Klasmen <br><input type="text" name="id" class="form-control" id="inputKlasmen" placeholder="ID Klasmen" value="<?php if(isset($_GET['id'])){ echo $idedit; } ?>" required><br>
						  Klub <br><select name="id_tim" class="form-control" id="inputtim" placeholder="Nama Klub" value="<?php if(isset($_GET['id'])){ echo $idtim_edit; } ?>" required>
							<option disabled selected>Pilih</option>
							<?php 
								include 'koneksi.php';
								$sql=mysqli_query($koneksi, "SELECT * FROM tim");
								while ($data=mysqli_fetch_array($sql)) {
									$selected = (isset($_GET['id']) && $idtim_edit == $data['id_tim']) ? 'selected' : '';
							?>
							<option value="<?=$data['id_tim']?>" <?=$selected?>><?=$data['nama_tim']?></option> 
							<?php
								}
							?></select><br>
						  Main <br><input type="text" name="main" class="form-control" id="inputMain" placeholder="Main" value="<?php if(isset($_GET['id'])){ echo $mainedit; } ?>" <?php if(isset($_GET['id'])){ echo "disabled='disabled'"; } ?> required><br>
						  Menang <br><input type="text" name="menang" class="form-control" id="inputMenang" placeholder="Menang" value="<?php if(isset($_GET['id'])){ echo $menangedit; } ?>" required><br>
						  Seri <br><input type="text" name="seri" class="form-control" id="inputSeri" placeholder="Seri" value="<?php if(isset($_GET['id'])){ echo $seriedit; } ?>" required>
					  </div>
					  <div class="form-group">
						  Kalah <br><input type="text" name="kalah" class="form-control" id="inputKalah" placeholder="Kalah" value="<?php if(isset($_GET['id'])){ echo $kalahedit; } ?>" required><br>
						  Gol Kandang <br><input type="text" name="golk" class="form-control" id="inputGolk" placeholder="Gol Kandang" value="<?php if(isset($_GET['id'])){ echo $golkedit; } ?>" required><br>
						  Gol Tandang <br><input type="text" name="golt" class="form-control" id="inputGolt" placeholder="Gol Tandang" value="<?php if(isset($_GET['id'])){ echo $goltedit; } ?>" required><br>
						  Selisih Gol <br><input type="text" name="selisih" class="form-control" id="inputSelisih" placeholder="Selisih Gol" value="<?php if(isset($_GET['id'])){ echo $selisihedit; } ?>" <?php if(isset($_GET['id'])){ echo "disabled='disabled'"; } ?> required><br>
						  Poin <br><input type="text" name="poin" class="form-control" id="inputPoin" placeholder="Poin" value="<?php if(isset($_GET['id'])){ echo $poinedit; } ?>" <?php if(isset($_GET['id'])){ echo "disabled='disabled'"; } ?> required><br>
						  Liga <br><select name="liga" id="inputLiga" class="form-control" placeholder="Liga" value="<?php if(isset($_GET['id'])){ echo $ligaedit; } ?>" required>
							<option disabled selected>Pilih</option>
							<option <?php if(isset($_GET['id']) && $ligaedit == 'Inggris'){ echo 'selected'; } ?>>Inggris</option>
							<option <?php if(isset($_GET['id']) && $ligaedit == 'Spanyol'){ echo 'selected'; } ?>>Spanyol</option>
							<option <?php if(isset($_GET['id']) && $ligaedit == 'Italy'){ echo 'selected'; } ?>>Italy</option>
							<option <?php if(isset($_GET['id']) && $ligaedit == 'German'){ echo 'selected'; } ?>>German</option>
							</select><br>
					  </div><br><br>
						  <div class="modal-footer">
							<a href="klasmen.php"><button type="reset" class="btn btn-default">Reset</button></a>
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
				$total = mysqli_query($koneksi, "SELECT * FROM klasmen");
				$total_data = mysqli_num_rows($total);

				//2. tentukan banyak data yg diinginkan tampil
				$hal = 10;

				//3. cari jumlah banyak halaman
				$jum_hal = ceil($total_data/$hal);

				if(isset($_GET['awal'])) $awal = $_GET['awal'];
				else $awal = 0;
				?>
				<div class="table-responsive">
				  <table class="table table-bordered">
					<tr class="active">
						<th style="text-align:center;">ID Klasmen</th>
						<th style="text-align:center;">Klub</th>
						<th style="text-align:center;">Main</th>
						<th style="text-align:center;">Menang</th>
						<th style="text-align:center;">Seri</th>
						<th style="text-align:center;">Kalah</th>
						<th style="text-align:center;">Gol Kandang</th>
						<th style="text-align:center;">Gol Tandang</th>
						<th style="text-align:center;">Selisih Gol</th>
						<th style="text-align:center;">Poin</th>
						<th style="text-align:center;">Liga</th>
						<th colspan="2" style="text-align:center;">Aksi</th>
					</tr>
					<?php
						if(isset($_POST['cari'])) $kata = $_POST['cari'];
						else $kata = "";
						//4. batasi query dg Limit
						$str = "SELECT k.id_klasmen, t.nama_tim, k.main, k.menang, k.seri, k.kalah, k.gol_kandang, k.gol_tandang, k.selisih_gol, k.poin, k.liga 
						FROM klasmen k
						INNER JOIN tim t ON k.id_tim = t.id_tim
						WHERE k.liga LIKE '%$kata%'
						LIMIT $awal, $hal ";
						$query = mysqli_query ($koneksi, $str) or die (mysqli_error());
						$jumlah = mysqli_num_rows($query);
						if($jumlah == '0'){
						echo "<tr><td colspan='12' align='center'>Data kosong</td></tr>";
						} else {
						while(list($id, $nama_tim, $main, $menang, $seri, $kalah, $golk, $golt, $selisih, $poin, $liga) = mysqli_fetch_row($query)) {
					?>
					<tr style="text-align:center;">
						<td><?php echo $id; ?></td>
						<td><?php echo $nama_tim; ?></td>
						<td><?php echo $main; ?></td>
						<td><?php echo $menang; ?></td>
						<td><?php echo $seri; ?></td>
						<td><?php echo $kalah; ?></td>
						<td><?php echo $golk; ?></td>
						<td><?php echo $golt; ?></td>
						<td><?php echo $selisih; ?></td>
						<td><?php echo $poin; ?></td>
						<td><?php echo $liga; ?></td>
						<td><a href="klasmen.php?id=<?php echo $id; ?>"><button class="btn btn-success">Edit</button></a></td>
						<td><a href="#" onclick="javascript: if (confirm('Yakin dihapus?')){
						window.location.href='klasmen_proses.php?aksi=Hapus&id=<?php echo $id ?>';}"><button class="btn btn-danger">Hapus</button></a></td>
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
						<?php if($awal != 0){ echo "<a href='klasmen.php?awal=".($awal-$hal)."' aria-label='Previous'>
							<span aria-hidden='true'>&laquo;</span>
							</a>";
							}
						?>
					</li>
					<li>
						<?php for($i=0; $i <  $jum_hal; $i++){
							$x = $i * $hal;
							if($awal == $x){ echo "<span aria-hidden='true' class='disabled' style='color:black;'>".($i+1)."</span>"; }else{ echo" <a href='klasmen.php?awal=$x'>
							".($i+1)."
							</a>";
							}
							}
						?>
					</li>
					<li>
						<?php if($awal != $x){ echo "<a href='klasmen.php?awal=".($awal+$hal)."' aria-label='Next'>
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