<?php 
function connection() {
   // membuat konekesi ke database system
$server = "localhost";
$username = "root";
$password = "";
$db = "ramadhan";
  $conn = mysqli_connect($server, $username, $password);

   if(! $conn) {
	die('Koneksi gagal: ' . mysqli_error());
   }
   //memilih database yang akan dipakai
   mysqli_select_db($conn,$db);
	
   return $conn;
}

 ?>
