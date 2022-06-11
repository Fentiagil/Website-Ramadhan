<?php 
  //memanggil file koneksi.php yang berisi koneski ke database
  include ('koneksi.php'); 

$status = '';
$result = '';
 //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tanggal = $_POST['tanggal'];
      $imam = $_POST['imam'];
      $masjid = $_POST['masjid'];
      //query SQL
      $sql = "UPDATE sholat_terawih SET imam='$imam', masjid='$masjid' WHERE tanggal='$tanggal'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
          header('Location: jadwalsolatterawih.php?status='.$status);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Update Jadwal Terawih</title>
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
      $result = mysqli_query(connection(),"select * FROM `sholat_terawih` WHERE tanggal='$tanggal'");
      
      ?>
  	 <?php while($row = mysqli_fetch_array($result)): ?>
  <div class="form">
  	<form action="update.terawih.php" method="POST">
  		<?php echo "<p>Update Jadwal Sholat Terawih</p>"; ?>
  	<fieldset>
  	 <label>Tanggal</label>
              <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" value="<?php echo $row['tanggal'];  ?>" required="required" readonly><br><br>
    <label>Imam</label>
              <input type="varchar" class="form-control" placeholder="Imam" name="imam" value="<?php echo $row['imam'];  ?>" required="required"><br><br>
    <label>Masjid</label>
              <input type="varchar" class="form-control" placeholder="Masjid" name="masjid" value="<?php echo $row['masjid'];  ?>" required="required"><br><br>
    <?php endwhile; ?>
     <button type="submit" class="btn btn-primary">Update</button><br><br>
     </fieldset>
    </form>
  </div>
</div>
</body>
</html>