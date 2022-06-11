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
  <title>Jadwal Terawih</title>
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
  <div>
<?php 
session_start(); // session untuk notifikasi pesan
echo @$_SESSION['pesan'];
session_destroy();
  ?>
  </div>
  <div class="check">
      <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert"><p>Data berhasil di-update</p></div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert"><p>Data gagal di-update</p></div>';
              }

            }
           ?>
  </div>
  <div class="jadwalterawih">
    <?php echo "<p> Jadwal Sholat Terawih:</p>"?>
    <center>
    <table>
    <thead>
      <tr>
         <th>tanggal</th>
          <th>imam</th>
          <th>masjid</th>
          <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      //proses menampilkan data dari database:
      //siapkan query SQL
      $query = "SELECT * FROM sholat_terawih";
      $result = mysqli_query(connection(),$query);
      ?>

      <?php while($row = mysqli_fetch_assoc($result)): ?>
      <tr>
      <td><?php echo $row['tanggal'];  ?></td>
      <td><?php echo $row['imam'];  ?></td>
      <td><?php echo $row['masjid'];  ?></td>
      <td><a href="<?php echo "update.terawih.php?tanggal=".$row['tanggal']; ?>" class="update_button"> Edit</a>
          /
          <a href="<?php echo "hapus_terawih.php?tanggal=".$row['tanggal']; ?>" class="delete_button"> Delete</a>
      </tr>
      <?php endwhile ?>
    </tbody>
    </table></center>
  </div>
<div class="form">
<?php echo "<p>Tambah Data Jadwal Sholat Terawih</p>"; ?>
<form action='form_terawih.php' method='POST'>

<input type='submit' name='tambah' value='Tambah Data'> </td>

</form>
</div>

  <div class="footer">
    <?php echo "<p>20081010161 - fenti agil sakinah</p>"; ?>
  </div>
</div>
</body>
</html>