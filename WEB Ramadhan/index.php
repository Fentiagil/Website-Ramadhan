<?php 
  //memanggil file koneksi.php yang berisi koneski ke database
  include ('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Ramadhan Kareem</title>
</head>
<body>
<div class="canvas">
	<div class="header">
		 <?php echo "Website Ramadhan"; ?>
	</div>

	<div class="menu">
    <ul>
        <!--MENU -->
        <li><a href="index.php?page=home">Home</a></li> 
        <li><a href="jadwalsolat.php?page=aboutme">Jadwal Sholat</a></li>
        <li><a href="jadwalsolatterawih.php?page=kontak">Jadwal Sholat Terawih</a></li>
        <li><a href="jadwalbukapuasa.php?page=service">Jadwal Buka Puasa</a></li>
    </ul>
  </div>

  <div class="isi">
    <?php
    echo "<p>Marhaban Ya</p>";
    echo "<p>Ramadhan</p>";
    echo "<p>1443 H / 2022 M</p>";
    ?>
    <img alt="model" class="model" src="foto.png"> 
  </div>


  <div class="footer">
    <?php echo "<p>20081010161 - fenti agil sakinah</p>"; ?>
  </div>

</div>
</body>
</html>