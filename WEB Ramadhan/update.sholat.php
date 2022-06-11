<?php 
  //memanggil file koneksi.php yang berisi koneski ke database
  include ('koneksi.php'); 

$status = '';
$result = '';
 //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tanggal = $_POST['tanggal'];
      $imsyak = $_POST['imsyak'];
      $subuh = $_POST['subuh'];
      $dzuhur = $_POST['dzuhur'];
      $ashar = $_POST['ashar'];
      $maghrib = $_POST['maghrib'];
      $isya = $_POST['isya'];
      //query SQL
      $sql = "UPDATE jadwal SET imsyak='$imsyak', subuh='$subuh', dzuhur='$dzuhur', ashar='$ashar', maghrib='$maghrib', isya='$isya' WHERE tanggal='$tanggal'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
          header('Location: jadwalsolat.php?status='.$status);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Update Jadwal Sholat</title>
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
  <?php 
      //proses menampilkan data dari database:
      //siapkan query SQL
      $tanggal = @$_GET['tanggal'];
      $result = mysqli_query(connection(),"select * FROM `jadwal` WHERE tanggal='$tanggal'");
      
      ?>
  	 <?php while($row = mysqli_fetch_array($result)): ?>
  <div class="form">
  	<form action="update.sholat.php" method="POST">
  		<?php echo "<p>Update Jadwal Sholat</p>"; ?>
  	<fieldset>
  	 <label>Tanggal</label>
              <input type="date" class="form-control" placeholder="tanggal" name="tanggal" value="<?php echo $row['tanggal'];  ?>" required="required" readonly><br><br>
    <label>Imsyak</label>
              <input type="time" class="form-control" placeholder="imsyak" name="imsyak" value="<?php echo $row['imsyak'];  ?>" required="required"><br><br>
    <label>Subuh</label>
              <input type="time" class="form-control" placeholder="subuh" name="subuh" value="<?php echo $row['subuh'];  ?>" required="required"><br><br>
    <label>Dzuhur</label>
              <input type="time" class="form-control" placeholder="dzuhur" name="dzuhur" value="<?php echo $row['dzuhur'];  ?>" required="required"><br><br>
    <label>Ashar</label>
              <input type="time" class="form-control" placeholder="ashar" name="ashar" value="<?php echo $row['ashar'];  ?>" required="required"><br><br>
    <label>Maghrib</label>
              <input type="time" class="form-control" placeholder="maghrib" name="maghrib" value="<?php echo $row['maghrib'];  ?>" required="required"><br><br>
    <label>Isya</label>
              <input type="time" class="form-control" placeholder="isya" name="isya" value="<?php echo $row['isya'];  ?>" required="required"><br><br>
    <?php endwhile; ?>
     <button type="submit" class="btn btn-primary">Update</button><br><br>
     </fieldset>
    </form>
  </div>
</div>
</body>
</html>