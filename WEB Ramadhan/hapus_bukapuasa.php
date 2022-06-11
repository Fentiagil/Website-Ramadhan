<?php 

  include ('koneksi.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['tanggal'])) {
          //query SQL
          $tanggal = $_GET['tanggal'];
          $query = "DELETE FROM menu_berbuka WHERE tanggal = '$tanggal'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          //redirect ke halaman lain
          header('Location: jadwalbukapuasa.php?status='.$status);
      }  
  }
?>