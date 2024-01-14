<?php session_start(); ?>
<?php if(isset($_SESSION['username'])){ ?>
<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - SportNews</title>

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
							<li><a href="klasmen.php"style="color:#ffffff;">Klasemen</a></li>
							<li><a href="jadwal.php"style="color:#ffffff;">Jadwal</a></li>
							<li><a href="hasil.php"style="color:#ffffff;">Hasil Pertandingan</a></li>
							<li><a href="stadion.php" style="color:#ffffff;">Stadion</a></li>
							<li><a href="tim.php" style="color:#ffffff;">Tim</a></li>
						  </ul>
						  <ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color:#ffffff;"></span> <b style="color:#ffffff;"><?php echo $_SESSION['username']; ?></b> <span class="caret" style="color:#ffffff;"></span></a>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="logout.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Keluar</a></li>
							  </ul>
							</li>
						  </ul>
						</div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				Selamat Datang di Halaman Administrator...
			</div>
			<br><center><p>SportNews - Portal Sepak Bola Terkini</p></center>
			
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