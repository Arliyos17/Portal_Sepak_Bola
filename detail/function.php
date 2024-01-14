<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sport Zone - The Biggest Site Of Football</title>

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
	<?php
	include "../koneksi.php";
	function artikelTerkait($id){
		// threshold 40%
		$threshold = 40;
		// jumlah artikel terkait
		$maksArtikel = 3;
		
		$listArtikel = Array();
		$query = "SELECT judul FROM berita WHERE id_berita = $id";
		$hasil = mysql_query($query);
		$data = mysql_fetch_array($hasil);
		$judul = $data['judul'];
		
		$query = "SELECT * FROM berita WHERE id_berita<>'$id'";
		$hasil = mysql_query($query);
		while($data=mysql_fetch_array($hasil)){
		similar_text($judul, $data['judul'], $percent);
			if($percent >= $threshold){
				if(count($listArtikel) <= $maksArtikel){
					$listArtikel[]="
					<div class='media'>
						<div class='media-left'>
							<a href='../detail/?id=".$data['id_berita']."'>
							  <img class='media-object' src='../images/berita/".$data['id_berita'].".jpg' width='190px' height='90px alt='...'>
							</a>
						</div>
					<div class='media-body'><font color='gray'>Liga ".$data['liga']."</font>
					<h4 class='media-heading'><a href='../detail?id=".$data['id_berita']."'>".$data['judul']."</a></h4>
					</div><hr>
					</div>
					";
				}
			}
		}
			if(count($listArtikel) > 0){
				for($i=0;$i<=count($listArtikel)-1;$i++){
					echo $listArtikel[$i];
				}echo "</ul><br>";
			}else echo "Tidak Ada Artikel Terkait<br>";
	}
	?>
		<script src="../js/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
</body>
</html>