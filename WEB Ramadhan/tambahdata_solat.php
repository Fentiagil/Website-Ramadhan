<?php 
  //memanggil file koneksi.php yang berisi koneski ke database
  include ('koneksi.php'); 
  session_start();
  //melakukan pengecekan apakah ada form kritik dan saran yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tanggal = $_POST['tanggal'];
      $imsyak = $_POST['imsyak'];
      $subuh = $_POST['subuh'];
      $dzuhur = $_POST['dzuhur'];
      $ashar = $_POST['ashar'];
      $maghrib = $_POST['maghrib'];
      $isya = $_POST['isya'];
      //query SQL
      $query = "INSERT INTO jadwal (tanggal, imsyak, subuh, dzuhur, ashar, maghrib, isya) VALUES('$tanggal','$imsyak','$subuh'
              ,'$dzuhur','$ashar','$maghrib','$isya' )";   

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
       $_SESSION['pesan'] = '<p>Data berhasil di-simpan</p>';
      header("location:jadwalsolat.php");
      }
      else{
       echo "Gagal simpan data!";
      }

  }
?>

