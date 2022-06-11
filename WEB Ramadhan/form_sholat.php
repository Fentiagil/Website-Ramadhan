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
  <title>Tambah Data Sholat</title>
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
  <?php echo "<p>Tambah Data</p>"; ?>
  <form method="POST" action="tambahdata_solat.php">
  <fieldset>  
    <label>tanggal :</label>
          <input type="date" id="tanggal" name="tanggal" value="" required><br><br>
    <label>imsyak : </label>
          <input type="time" id="imsyak" name="imsyak" value="" required><br><br>
    <label>subuh : </label>
          <input type="time" id="subuh" name="subuh" value="" required><br><br>
    <label>dzuhur : </label>
          <input type="time" id="dzuhur" name="dzuhur" value="" required><br><br>
    <label>ashar : </label>
          <input type="time" id="ashar" name="ashar" value="" required><br><br>
    <label>maghrib : </label>
          <input type="time" id="maghrib" name="maghrib" value="" required><br><br>
    <label>isya : </label>
          <input type="time" id="isya" name="isya" value="" required><br><br>
     <input type="submit" value="Submit">

  </fieldset>
  </div>

</div>
</body>
</html>