<?php 
  //memanggil file koneksi.php yang berisi koneski ke database
  include ('koneksi.php'); 
session_start();

  //melakukan pengecekan apakah ada form yang dipost
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  	$tanggal = $_POST['tanggal'];
  	$imam = $_POST['imam'];
  	$masjid = $_POST['masjid'];
  	//query SQL
  	$query = "INSERT INTO sholat_terawih (tanggal, imam, masjid) VALUES ('$tanggal','$imam', '$masjid')";

  	//eksekusi query
  	$result = mysqli_query(connection(),$query);
  	if($result){
       $_SESSION['pesan'] = '<p>Data berhasil di-simpan</p>';
  		header("location:jadwalsolatterawih.php");
  	}
  	else{
  		echo "Gagal simpan data!";
  	}
  
  }
?>
