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
	<title>Tambah Data Sholat Terawih</title>
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

  <div class="form">
  <?php echo "<p>Tambah Data Jadwal Terawih</p>"; ?>
  <form action="tambah_terawih.php"  method="POST">
  <fieldset>  
    <label>tanggal :</label>
          <input type="date" id="tanggal" name="tanggal" value="" required> <br><br>
    <label>imam : </label>
          <input type="varchar" id="imam" name="imam" value="" required><br><br>
    <label>masjid : </label>
          <input type="varchar" id="masjid" name="masjid" value="" required> <br><br>
    <input type="submit" value="Submit">

  </fieldset>
  </div>
</div>
</body>
</html>