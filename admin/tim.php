<?php sleep(1); ?>
<?php session_start(); ?>
<?php if(isset($_SESSION['username'])){ ?>
<?php include "../koneksi.php"; ?>
<?php
if(isset($_GET['id'])){
$a= "SELECT id_tim, nama_tim FROM tim WHERE id_tim = '$_GET[id]'";
$b= mysqli_query($koneksi, $a);
list($idedit, $timedit) = mysqli_fetch_row($b);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TIM - SportNews</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
							<form method="POST" action="tim.php" class="navbar-form navbar-right" role="search">
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
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
			  Tambah Data+
			</button><br><br>
			<?php } ?>
			<div class="<?php if(isset($_GET['id'])){ ?> <?php }else{ ?> modal fade <?php } ?>" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<a href="tim.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
					<h4 class="modal-title" id="myModalLabel"><?php if(isset($_GET['id'])){ ?> Edit Data <?php }else{ ?> Tambah Data <?php } ?></h4>
				  </div>
				  <div class="modal-body">
					<form method="POST" action="tim_proses.php" class="form-inline">
					<?php
					if(isset($_GET['id'])){
					echo "<input type='hidden' name='aksi' value='Update'>";
					}else{
					echo "<input type='hidden' name='aksi' value='Tambah'>";
					}
					?>
				  <div class="form-group">
					  ID Tim <br><input type="number" name="id" class="form-control" id="inputtim" placeholder="ID Tim" value="<?php if(isset($_GET['id'])){ echo $idedit; } ?>" required><br>
					  Nama Tim <br><input type="text" name="nama_tim" class="form-control" id="nama_tim" placeholder="Nama Tim" value="<?php if(isset($_GET['id'])){ echo $timedit; } ?>" required><br>
				  </div><br><br>
				  <div class="modal-footer">
					<a href="tim.php"><button type="reset" class="btn btn-default">Reset</button></a>
					<button type="submit" class="btn btn-primary"><?php if(isset($_GET['id'])){ ?> Update <?php }else{ ?> Simpan <?php } ?></button>
				  </div>
				</form>
				  </div>
				</div>
			  </div>
			</div>
				<?php
				$total = mysqli_query($koneksi, "SELECT * FROM tim");
				$total_data = mysqli_num_rows($total);
				$hal = 10;
				$jum_hal = ceil($total_data/$hal);

				if(isset($_GET['awal'])) $awal = $_GET['awal'];
				else $awal = 0;
				?>
				<div class="table-responsive">
				  <table class="table table-bordered">
					<tr class="active">
						<th style="text-align:center;">ID Tim</th>
						<th style="text-align:center;">nama Tim</th>
						<th colspan="2" style="text-align:center;">Aksi</th>
					</tr>
					<?php
						if(isset($_POST['cari'])) $kata = $_POST['cari'];
						else $kata = "";
						$str = "SELECT id_tim, nama_tim FROM tim WHERE nama_tim LIKE '%$kata%' LIMIT $awal, $hal ";
						$query = mysqli_query ($koneksi, $str);
						$jumlah = mysqli_num_rows($query);
						if($jumlah == '0'){
						echo "<tr><td colspan='11' align='center'>Data kosong</td></tr>";
						} else {
						while(list($id, $namatim) = mysqli_fetch_row($query)) {
					?>
					<tr style="text-align:center;">
						<td><?php echo $id; ?></td>
						<td><?php echo $namatim; ?></td>
						<td><a href="tim.php?id=<?php echo $id; ?>"><button class="btn btn-success">Edit</button></a></td>
						<td><a href="#" onclick="javascript: if (confirm('Yakin dihapus?')){
						window.location.href='tim_proses.php?aksi=Hapus&id=<?php echo $id ?>';}"><button class="btn btn-danger">Hapus</button></a></td>
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
						<?php if($awal != 0){ echo "<a href='tim.php?awal=".($awal-$hal)."' aria-label='Previous'>
							<span aria-hidden='true'>&laquo;</span>
							</a>";
							}
						?>
					</li>
					<li>
						<?php for($i=0; $i <  $jum_hal; $i++){
							$x = $i * $hal;
							if($awal == $x){ echo "<span aria-hidden='true' class='disabled' style='color:black;'>".($i+1)."</span>"; }else{ echo" <a href='tim.php?awal=$x'>
							".($i+1)."
							</a>";
							}
							}
						?>
					</li>
					<li>
						<?php if($awal != $x){ echo "<a href='tim.php?awal=".($awal+$hal)."' aria-label='Next'>
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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
}else{
header("location:login.php");
}
?>