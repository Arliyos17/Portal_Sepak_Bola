<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Berita Internasional- SportNews</title>

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
	<!--container-->
	<div class="container-fluid">
		<!--header-->
		<div class="row">
			<div class="col-md-12" style="height:80px;background:black;">
				<header>
					<center><a href="index.php" style="font-size:35px;">SportNews</a><br>
						<font color="white" size="3">Portal Sepak Bola Terkini</font>
					</center>
				</header>
			</div>
		</div>
		<!--end header-->
		<!--nav-->
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="../index.php">SportNews</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="../berita-indonesia/">Berita Indonesia</a></li>
								<li class="active"><a href="../berita-internasional/">Berita Internasional</a></li>
								<li><a href="../klasmen/">Klasemen</a></li>
								<li><a href="../jadwal/">Jadwal</a></li>
								<li><a href="../hasil.php">Hasil Pertandingan</a></li>
							</ul>
							<form method="POST" action="../cari/" class="navbar-form navbar-right" role="search">
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
		<!--end nav-->
		<!--konten-->

		<!--end konten-->
		<!--kiri--->
		<div class="row">
			<div class="col-md-12" style="background:white;height:200px auto;">
				<div class="row">
					<div class="col-md-3" style="height:700px auto;">
						<div class="page-header">
							<h3>BERITA TERHANGAT</h3>
						</div>
						<?php

						$query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY rand() LIMIT 10");
						while ($row = mysqli_fetch_array($query)) {
						?>
							<div class="media">
								<div class="media-left">
									<a href="../detail/?id=<?php echo $row['id_berita']; ?>">
										<img class="media-object" src="../images/berita/<?php echo $row['id_berita']; ?>.jpg" width="100px" height="50px" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="../detail/?id=<?php echo $row['id_berita']; ?>"><?php echo $row['judul']; ?></a></h4>
								</div>
							</div>
							<hr>
						<?php
						}
						?>
					</div>
					<?php
					//pagging
					//1. cari banyak total data
					$total = mysqli_query($koneksi, "SELECT * FROM berita WHERE kategori='Internasional'");
					$total_data = mysqli_num_rows($total);

					//2. tentukan banyak data yg diinginkan tampil
					$hal = 4;

					//3. cari jumlah banyak halaman
					$jum_hal = ceil($total_data / $hal);

					if (isset($_GET['awal'])) $awal = $_GET['awal'];
					else $awal = 0;
					?>
					<div class="col-md-6" style="height:700px auto;">
						<div class="page-header">
							<h3 class="text-uppercase">Berita Internasional</h3>
							<?php
							$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE kategori='Internasional' ORDER BY tanggal DESC LIMIT $awal, $hal");
							while ($row = mysqli_fetch_array($query)) {
							?>
						</div>
						<div class="media">
							<div class="media-left">
								<a href="../detail/?id=<?php echo $row['id_berita']; ?>">
									<img class="media-object" src="../images/berita/<?php echo $row['id_berita']; ?>.jpg" width="130px" height="80px alt=" ...">
								</a>
							</div>
							<div class="media-body">
								<font color="gray">Liga <?php echo $row['liga']; ?></font>
								<h4 class="media-heading"><a href="../detail/?id=<?php echo $row['id_berita']; ?>"><?php echo $row['judul']; ?></a></h4>

								<p>
								<div style="text-align:justify;"><?php echo substr($row['isi'], 0, 200); ?> ...</div><br><a href="../detail/?id=<?php echo $row['id_berita']; ?>">Baca Lengkap >></a></p>
							</div>
							<hr>
						<?php
							}
						?>
						</div>
						<nav>
							<ul class="pagination">
								<li>
									<?php if ($awal != 0) {
										echo "<a href='../berita-internasional/?awal=" . ($awal - $hal) . "' aria-label='Previous'>
							<span aria-hidden='true'>&laquo;</span>
							</a>";
									}
									?>
								</li>
								<li>
									<?php for ($i = 0; $i <  $jum_hal; $i++) {
										$x = $i * $hal;
										if ($awal == $x) {
											echo "<span aria-hidden='true' class='disabled' style='color:black;'>" . ($i + 1) . "</span>";
										} else {
											echo " <a href='../berita-internasional/?awal=$x'>
							" . ($i + 1) . "
							</a>";
										}
									}
									?>
								</li>
								<li>
									<?php if ($awal != $x) {
										echo "<a href='../berita-internasional/?awal=" . ($awal + $hal) . "' aria-label='Next'>
							<span aria-hidden='true'>&raquo;</span>
							</a>";
									}
									?>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-md-3" style="height:auto;">
						<div class="page-header">
							<h3>SIDEBAR</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end kiri-->
		<!--footer-->
		<div class="row">
			<div class="col-md-12" style="height:30px;background:black;color:white;">
				<center>
					<footer>&copy; SportNews - Portal Sepak Bola Terkini</footer>
				</center>
			</div>
		</div>
		<!--end footer-->
	</div>
	<!--end container-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/bootstrap.min.js"></script>
</body>

</html>