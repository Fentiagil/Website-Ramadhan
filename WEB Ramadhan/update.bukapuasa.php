<?php 
  //memanggil file koneksi.php yang berisi koneski ke database
  include ('koneksi.php'); 

$status = '';
$result = '';
 //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tanggal = $_POST['tanggal'];
      $menu_takjil = $_POST['menu_takjil'];
      $menu_berbuka = $_POST['menu_berbuka'];
      $tempat = $_POST['tempat'];
      //query SQL
      $sql = "UPDATE menu_berbuka SET menu_takjil='$menu_takjil', tempat='$tempat', menu_berbuka='$menu_berbuka' WHERE tanggal='$tanggal'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
          header('Location: jadwalbukapuasa.php?status='.$status);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Update Jadwal Buka Puasa</title>
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
      $result = mysqli_query(connection(),"select * FROM `menu_berbuka` WHERE tanggal='$tanggal'");
      
      ?>
  	 <?php while($row = mysqli_fetch_array($result)): ?>
  <div class="form">
  	<form action="update.bukapuasa.php" method="POST">
  		<?php echo "<p>Update Jadwal Buka Puasa</p>"; ?>
  	<fieldset>
  	 <label>Tanggal</label>
              <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" value="<?php echo $row['tanggal'];  ?>" required="required" readonly><br><br>
    <label>Menu takjil</label>
              <input type="varchar" class="form-control" placeholder="Menu takjil" name="menu_takjil" value="<?php echo $row['menu_takjil'];  ?>" required="required"><br><br>
    <label>Menu Berbuka</label>
              <input type="varchar" class="form-control" placeholder="Menu berbuka" name="menu_berbuka" value="<?php echo $row['menu_berbuka'];  ?>" required="required"><br><br>
    <label>Tempat</label>
              <input type="varchar" class="form-control" placeholder="tempat" name="tempat" value="<?php echo $row['tempat'];  ?>" required="required"><br><br>
    <?php endwhile; ?>
     <button type="submit" class="btn btn-primary">Update</button><br><br>
     </fieldset>
    </form>
  </div>
</div>
</body>
</html>