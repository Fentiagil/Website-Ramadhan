<?php 
  //memanggil file koneksi.php yang berisi koneski ke database
  include ('koneksi.php'); 
 session_start();
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tanggal= $_POST['tanggal'];
      $menu_takjil = $_POST['menu_takjil'];
      $menu_berbuka = $_POST['menu_berbuka'];
      $tempat = $_POST['tempat'];
      //query SQL
      $query = "INSERT INTO menu_berbuka (`tanggal`, `menu_takjil`, `menu_berbuka`, `tempat`) VALUES('$tanggal','$menu_takjil','$menu_berbuka','$tempat')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
      $_SESSION['pesan'] = '<p>Data berhasil di-simpan</p>';
      header("location:jadwalbukapuasa.php");
      }
      else{
        echo "Gagal simpan data!";
      }


  }

?>

