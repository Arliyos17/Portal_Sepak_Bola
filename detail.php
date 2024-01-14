<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail Berita - SportNews</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

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
			<div class="col-md-12" style="height:55px; z-index:2;">
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
							<a class="navbar-brand" href="index.php">SportNews</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<?php
								$sql = "SELECT * FROM berita_kategori";
								$query = mysqli_query($koneksi, $sql);
								while ($row = mysqli_fetch_array($query)) {
								?>
									<li><a href="berita.php<?php echo $row['url']; ?>">Berita <?php echo $row['nama']; ?></a></li>
								<?php
								}
								?>
								<li><a href="#">Galeri</a></li>
								<li><a href="#">Klasmen</a></li>
								<li><a href="#">Jadwal</a></li>
							</ul>
							<form method="POST" action="cari.php" class="navbar-form navbar-right" role="search">
								<div class="form-group">
									<input type="text" name="cari" class="form-control" placeholder="Search">
								</div>
								<button type="submit" class="btn btn-default">Search</button>
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
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img class="media-object" src="images/berita/berita1.jpg" width="100px" height="100px" alt="...">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="">West Ham dan Tottenham Ingin Comot Pato dari Chelsea</a></h4>
								West Ham tampaknya tertarik dengan ALexander Pato yang merupakan striker dari ....
							</div>
						</div>
						<hr>
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img class="media-object" src="images/berita/berita7.jpg" width="100px" height="100px alt=" ...">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="">Cole: Giggs Harus Dapat Kesempatan Latih MU</a></h4>
								Mantan pemain Manchester United, Cole ingin .....
							</div>
						</div>
						<hr>
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img class="media-object" src="images/berita/berita6.jpg" width="100px" height="100px alt=" ...">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="">Tinggalkan Madrid, Ronaldo Diragukan ke MU</a></h4>
								Pakar La Liga, Guillem Balague, tak percaya Manchester United ...
							</div>
						</div>
					</div>
					<div class="col-md-6" style="height:700px auto;">
						<div class="page-header">
							<?php
							$id = $_GET['id'];
							$query = mysql_query("SELECT * FROM berita WHERE id_berita='$id'");
							while ($row = mysql_fetch_array($query)) {
							?>
								<h3 class="text-uppercase"><?php echo $row['judul']; ?></h3>
						</div>
						<div class="media">
							<div class="media-center">

								<img class="media-object" src="images/berita/<?php echo $row['id_berita']; ?>.jpg" width="100%" height="400px" alt="..."><br>

							</div>
							<div class="media-body">
								<p><?php echo $row['isi']; ?></p>
							</div>
						<?php
							}
						?>
						</div>
					</div>
					<div class="col-md-3" style="height:700px auto;">
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
				<footer>&copy; 2016 - Sport Zone - All Right Reserved. | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a></footer>
			</div>
		</div>
		<!--end footer-->
	</div>
	<!--end container-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>