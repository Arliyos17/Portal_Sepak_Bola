<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SportNews - Portal Sepak Bola Terkini</title>

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
								<li><a href="../berita-internasional/">Berita Internasional</a></li>
								<li><a href="../klasmen/">Klasemen</a></li>
								<li class="active"><a href="../jadwal/">Jadwal</a></li>
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
					<div class="col-md-6" style="height:700px auto;">
						<div class="page-header">
							<h3>JADWAL PERTANDINGAN</h3>
						</div>
						<?php
						$hari = date('l');
						$hari1 = array(
							'Sunday' => 'Minggu',
							'Monday' => 'Senin',
							'Tuesday' => 'Selasa',
							'Wednesday' => 'Rabu',
							'Thursday' => 'Kamis',
							'Friday' => 'Jumat',
							'Saturday' => 'Sabtu',
						);
						$tgl = date('d');
						$bulan = date('m');
						$bulan1 = array(
							'01' => 'Januari',
							'02' => 'Februari',
							'03' => 'Maret',
							'04' => 'April',
							'05' => 'Mei',
							'06' => 'Juni',
							'07' => 'Juli',
							'08' => 'Agustus',
							'09' => 'September',
							'10' => 'Oktober',
							'11' => 'November',
							'12' => 'Desember',
						);
						$thn = date('Y');
						?>
						
						<font color="gray"><?php echo $hari1[$hari]; ?>,
							<?php echo $tgl; ?> <?php echo $bulan1[$bulan]; ?> <?php echo $thn ?></font><br><br>
						<div role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#inggris" aria-controls="inggris" role="tab" data-toggle="tab">Liga Inggris</a></li>
								<li role="presentation"><a href="#spanyol" aria-controls="spanyol" role="tab" data-toggle="tab">Liga Spanyol</a></li>
								<li role="presentation"><a href="#italy" aria-controls="italy" role="tab" data-toggle="tab">Liga Italy</a></li>
								<li role="presentation"><a href="#german" aria-controls="german" role="tab" data-toggle="tab">Liga German</a></li>
							</ul><br>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="inggris">
									<div class="table-responsive">
										<table class="table table-striped">
											<?php
											$tanggalsekarang = date('Y-m-d');
											$query = mysqli_query($koneksi, "SELECT t1.nama_tim, t2.nama_tim, jadwal.tanggal, HOUR(jadwal.waktu), MINUTE(jadwal.waktu), stadion.nama_stadion, jadwal.link_siaran 
											FROM stadion 
											INNER JOIN jadwal ON stadion.id_stadion = jadwal.id_stadion
											INNER JOIN tim AS t1 ON jadwal.id_tim1 = t1.id_tim
											INNER JOIN tim AS t2 ON jadwal.id_tim2 = t2.id_tim
											WHERE liga='Inggris'
											AND tanggal >= CURDATE() 
											ORDER BY tanggal ASC");

											while (list($nama_tim1, $nama_tim2, $tanggal, $jam, $menit, $stadion, $link_siaran) = mysqli_fetch_array($query)) {
												$tanggal = date('l, d F Y', strtotime($tanggal));
												$datetime_now = new DateTime();
												$datetime_match = new DateTime($tanggal . ' ' . $jam . ':' . $menit);
												if ($datetime_match < $datetime_now) {
													continue; // Lewatkan jadwal yang sudah selesai
												}

												switch ($jam) {
													case "0";
														$jam = "00";
														break;
													case "1";
														$jam = "01";
														break;
													case "2";
														$jam = "02";
														break;
													case "3";
														$jam = "03";
														break;
													case "4";
														$jam = "04";
														break;
													case "5";
														$jam = "05";
														break;
													case "6";
														$jam = "06";
														break;
													case "7";
														$jam = "07";
														break;
													case "8";
														$jam = "08";
														break;
													case "9";
														$jam = "09";
														break;
												}

												switch ($menit) {
													case "0";
														$menit = "00";
														break;
													case "1";
														$menit = "01";
														break;
													case "2";
														$menit = "02";
														break;
													case "3";
														$menit = "03";
														break;
													case "4";
														$menit = "04";
														break;
													case "5";
														$menit = "05";
														break;
													case "6";
														$menit = "06";
														break;
													case "7";
														$menit = "07";
														break;
													case "8";
														$menit = "08";
														break;
													case "9";
														$menit = "09";
														break;
												}
											?>
												<tr>
													<td style="text-align:right;"><?php echo $nama_tim1; ?></td>
													<td class="info" style="text-align:center; font-size: small;"><p><?php echo $tanggal; ?><br><?php echo $jam, " : ", $menit, " WIB "; ?>
													<br><?php echo "Stadion ", $stadion; ?></p></td>
													<td style="text-align:left;"><?php echo $nama_tim2; ?></td>
													<td style="text-align:left;">
                            						<?php if (!empty($link_siaran)) { ?>
														<a href="<?php echo $link_siaran; ?>" target="_blank">LIVE</a>
                            						<?php } ?></td>
												</tr>
											<?php
											}
											?>
										</table>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="spanyol">

									<div class="table-responsive">
										<table class="table table-striped">
										<?php
											$tanggalsekarang = date('Y-m-d');
											$query = mysqli_query($koneksi, "SELECT t1.nama_tim, t2.nama_tim, jadwal.tanggal, HOUR(jadwal.waktu), MINUTE(jadwal.waktu), stadion.nama_stadion, jadwal.link_siaran 
											FROM stadion 
											INNER JOIN jadwal ON stadion.id_stadion = jadwal.id_stadion
											INNER JOIN tim AS t1 ON jadwal.id_tim1 = t1.id_tim
											INNER JOIN tim AS t2 ON jadwal.id_tim2 = t2.id_tim
											WHERE liga='Spanyol'
											AND tanggal >= CURDATE() 
											ORDER BY tanggal ASC");

											while (list($nama_tim1, $nama_tim2, $tanggal, $jam, $menit, $stadion, $link_siaran) = mysqli_fetch_array($query)) {
												$tanggal = date('l, d F Y', strtotime($tanggal));
												$datetime_now = new DateTime();
												$datetime_match = new DateTime($tanggal . ' ' . $jam . ':' . $menit);
												if ($datetime_match < $datetime_now) {
													continue; // Lewatkan jadwal yang sudah selesai
												}

												switch ($jam) {
													case "0";
														$jam = "00";
														break;
													case "1";
														$jam = "01";
														break;
													case "2";
														$jam = "02";
														break;
													case "3";
														$jam = "03";
														break;
													case "4";
														$jam = "04";
														break;
													case "5";
														$jam = "05";
														break;
													case "6";
														$jam = "06";
														break;
													case "7";
														$jam = "07";
														break;
													case "8";
														$jam = "08";
														break;
													case "9";
														$jam = "09";
														break;
												}

												switch ($menit) {
													case "0";
														$menit = "00";
														break;
													case "1";
														$menit = "01";
														break;
													case "2";
														$menit = "02";
														break;
													case "3";
														$menit = "03";
														break;
													case "4";
														$menit = "04";
														break;
													case "5";
														$menit = "05";
														break;
													case "6";
														$menit = "06";
														break;
													case "7";
														$menit = "07";
														break;
													case "8";
														$menit = "08";
														break;
													case "9";
														$menit = "09";
														break;
												}
											?>
												<tr>
													<td style="text-align:right;"><?php echo $nama_tim1; ?></td>
													<td class="info" style="text-align:center; font-size: small;"><p><?php echo $tanggal; ?><br><?php echo $jam, " : ", $menit, " WIB "; ?>
													<br><?php echo "Stadion ", $stadion; ?></p></td>
													<td style="text-align:left;"><?php echo $nama_tim2; ?></td>
													<td style="text-align:left;">
                            						<?php if (!empty($link_siaran)) { ?>
														<a href="<?php echo $link_siaran; ?>" target="_blank">LIVE</a>
                            						<?php } ?></td>
												</tr>
											<?php
											}
											?>
										</table>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="italy">
									<div class="table-responsive">
										<table class="table table-striped">
										<?php
											$tanggalsekarang = date('Y-m-d');
											$query = mysqli_query($koneksi, "SELECT t1.nama_tim, t2.nama_tim, jadwal.tanggal, HOUR(jadwal.waktu), MINUTE(jadwal.waktu), stadion.nama_stadion, jadwal.link_siaran 
											FROM stadion 
											INNER JOIN jadwal ON stadion.id_stadion = jadwal.id_stadion
											INNER JOIN tim AS t1 ON jadwal.id_tim1 = t1.id_tim
											INNER JOIN tim AS t2 ON jadwal.id_tim2 = t2.id_tim
											WHERE liga='Italy'
											AND tanggal >= CURDATE() 
											ORDER BY tanggal ASC");

											while (list($nama_tim1, $nama_tim2, $tanggal, $jam, $menit, $stadion, $link_siaran) = mysqli_fetch_array($query)) {
												$tanggal = date('l, d F Y', strtotime($tanggal));
												$datetime_now = new DateTime();
												$datetime_match = new DateTime($tanggal . ' ' . $jam . ':' . $menit);
												if ($datetime_match < $datetime_now) {
													continue; // Lewatkan jadwal yang sudah selesai
												}

												switch ($jam) {
													case "0";
														$jam = "00";
														break;
													case "1";
														$jam = "01";
														break;
													case "2";
														$jam = "02";
														break;
													case "3";
														$jam = "03";
														break;
													case "4";
														$jam = "04";
														break;
													case "5";
														$jam = "05";
														break;
													case "6";
														$jam = "06";
														break;
													case "7";
														$jam = "07";
														break;
													case "8";
														$jam = "08";
														break;
													case "9";
														$jam = "09";
														break;
												}

												switch ($menit) {
													case "0";
														$menit = "00";
														break;
													case "1";
														$menit = "01";
														break;
													case "2";
														$menit = "02";
														break;
													case "3";
														$menit = "03";
														break;
													case "4";
														$menit = "04";
														break;
													case "5";
														$menit = "05";
														break;
													case "6";
														$menit = "06";
														break;
													case "7";
														$menit = "07";
														break;
													case "8";
														$menit = "08";
														break;
													case "9";
														$menit = "09";
														break;
												}
											?>
												<tr>
													<td style="text-align:right;"><?php echo $nama_tim1; ?></td>
													<td class="info" style="text-align:center; font-size: small;"><p><?php echo $tanggal; ?><br><?php echo $jam, " : ", $menit, " WIB "; ?>
													<br><?php echo "Stadion ", $stadion; ?></p></td>
													<td style="text-align:left;"><?php echo $nama_tim2; ?></td>
													<td style="text-align:left;">
                            						<?php if (!empty($link_siaran)) { ?>
														<a href="<?php echo $link_siaran; ?>" target="_blank">LIVE</a>
                            						<?php } ?></td>
												</tr>
											<?php
											}
											?>
										</table>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="german">
									<div class="table-responsive">
										<table class="table table-striped">
										<?php
											$tanggalsekarang = date('Y-m-d');
											$query = mysqli_query($koneksi, "SELECT t1.nama_tim, t2.nama_tim, jadwal.tanggal, HOUR(jadwal.waktu), MINUTE(jadwal.waktu), stadion.nama_stadion, jadwal.link_siaran 
											FROM stadion 
											INNER JOIN jadwal ON stadion.id_stadion = jadwal.id_stadion
											INNER JOIN tim AS t1 ON jadwal.id_tim1 = t1.id_tim
											INNER JOIN tim AS t2 ON jadwal.id_tim2 = t2.id_tim
											WHERE liga='German'
											AND tanggal >= CURDATE() 
											ORDER BY tanggal ASC");

											while (list($nama_tim1, $nama_tim2, $tanggal, $jam, $menit, $stadion, $link_siaran) = mysqli_fetch_array($query)) {
												$tanggal = date('l, d F Y', strtotime($tanggal));
												$datetime_now = new DateTime();
												$datetime_match = new DateTime($tanggal . ' ' . $jam . ':' . $menit);
												if ($datetime_match < $datetime_now) {
													continue; // Lewatkan jadwal yang sudah selesai
												}

												switch ($jam) {
													case "0";
														$jam = "00";
														break;
													case "1";
														$jam = "01";
														break;
													case "2";
														$jam = "02";
														break;
													case "3";
														$jam = "03";
														break;
													case "4";
														$jam = "04";
														break;
													case "5";
														$jam = "05";
														break;
													case "6";
														$jam = "06";
														break;
													case "7";
														$jam = "07";
														break;
													case "8";
														$jam = "08";
														break;
													case "9";
														$jam = "09";
														break;
												}

												switch ($menit) {
													case "0";
														$menit = "00";
														break;
													case "1";
														$menit = "01";
														break;
													case "2";
														$menit = "02";
														break;
													case "3";
														$menit = "03";
														break;
													case "4";
														$menit = "04";
														break;
													case "5";
														$menit = "05";
														break;
													case "6";
														$menit = "06";
														break;
													case "7";
														$menit = "07";
														break;
													case "8";
														$menit = "08";
														break;
													case "9";
														$menit = "09";
														break;
												}
											?>
												<tr>
													<td style="text-align:right;"><?php echo $nama_tim1; ?></td>
													<td class="info" style="text-align:center; font-size: small;"><p><?php echo $tanggal; ?><br><?php echo $jam, " : ", $menit, " WIB "; ?>
													<br><?php echo "Stadion ", $stadion; ?></p></td>
													<td style="text-align:left;"><?php echo $nama_tim2; ?></td>
													<td style="text-align:left;">
                            						<?php if (!empty($link_siaran)) { ?>
														<a href="<?php echo $link_siaran; ?>" target="_blank">LIVE</a>
                            						<?php } ?></td>
												</tr>
											<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>
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