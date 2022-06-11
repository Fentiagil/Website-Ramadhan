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
	<title>Jadwal Sholat</title>
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

<div class="jadwalsolat">
	<?php echo "<p> Jadwal Waktu Sholat:</p>"?>
	<center>
	<table>
		<thead>
			<tr>
			   <th>tanggal</th>
			    <th>imsyak</th>
			    <th>subuh</th>
			    <th>dzuhur</th>
			    <th>ashar</th>
			    <th>maghrib</th>
			    <th>isya</th>
                <th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			//proses menampilkan data dari database:
			//siapkan query SQL
			$query = "SELECT * FROM jadwal";
			$result = mysqli_query(connection(),$query);
			?>

			<?php while($row = mysqli_fetch_assoc($result)): ?>
			<tr>
			<td><?php echo $row['tanggal'];  ?></td>
			<td><?php echo $row['imsyak'];  ?></td>
			<td><?php echo $row['subuh'];  ?></td>
			<td><?php echo $row['dzuhur'];  ?></td>
			<td><?php echo $row['ashar'];  ?></td>
			<td><?php echo $row['maghrib'];  ?></td>
			<td><?php echo $row['isya'];  ?></td>
            <td><a href="<?php echo "update.sholat.php?tanggal=".$row['tanggal']; ?>" class="update_button"> Edit</a>
          /
          <a href="<?php echo "hapus_sholat.php?tanggal=".$row['tanggal']; ?>" class="delete_button"> Delete</a>
			</tr>
            <?php endwhile ?>
            <div>
                <?php   
                for ($no1 = 4, $no2 = 5, $im1 = 6, $im2 = 5, $su1 = 16,$su2 = 15, $du1=35, $du2=34,$as1=51, $as2=50, $ma1=35, $ma2=34,$is1=45, $is2=44;  
                            $no1<=16, $no2<=15, $im1 >=0, $im2 >=0, $su1 >= 10, $su2 >= 10, $du1 >= 29, $du2 >= 29, $as1 >= 45 , $as2 >= 45,$ma1 >= 29 , $as2 >= 29, $is1 >= 39, $is2 >=39;
                                    $no1+=2, $no2+=2, $im1-=1, $im2-=1, $su1-=1, $su2-=1,$du1-=1, $du2-=1, $as1-=1, $as2-=1, $ma1-=1, $ma2-=1, $is1-=1, $is2-=1) 
                                    { ?>
 
                        <tr>
                            <td> <?php echo "2022-04-$no1"; ?></td>
                            <td><?php echo "04:0$im1:00"; ?></td>
                            <td><?php echo "04:$su1:00"; ?></td>
                            <td><?php echo "11:$du1:00"; ?></td>
                            <td><?php echo "14:$as1:00"; ?></td>
                            <td><?php echo "17:$ma1:00"; ?></td>
                            <td><?php echo "18:$is1:00"; ?></td>
                            <td><a href="<?php echo "update.sholat.php?tanggal=".$row['tanggal']; ?>" class="update_button"> Edit</a>
                              /
                              <a href="<?php echo "hapus_sholat.php?tanggal=".$row['tanggal']; ?>" class="delete_button"> Delete</a>
                                            </tr>
                        <tr>
                            <td> <?php echo "2022-04-$no2"; ?></td>
                            <td><?php echo "04:0$im2:00"; ?></td>
                            <td><?php echo "04:$su2:00"; ?></td>
                            <td><?php echo "11:$du2:00"; ?></td>
                            <td><?php echo "14:$as2:00"; ?></td>
                            <td><?php echo "17:$ma2:00"; ?></td>
                            <td><?php echo "18:$is2:00"; ?></td>
                            <td><a href="<?php echo "update.sholat.php?tanggal=".$row['tanggal']; ?>" class="update_button"> Edit</a>
                              /
                              <a href="<?php echo "hapus_sholat.php?tanggal=".$row['tanggal']; ?>" class="delete_button"> Delete</a>
                        </tr>

                        <?php } ?>

               <?php  for ($no1 = 17, $no2 = 18, $im1 = 59, $im2 = 59, $su1 = 9,$su2 = 9, $du1=28, $du2=28,$as1=44, $as2=44,$ma1=28, $ma2=28,$is1=38, $is2=38; 
                                    $no1<=30, $no2<=30, $im1 >=0, $im2 >=0, $su1 >= 0, $su2 >= 0, $du1 >= 19, $du2 >= 19, $as1 >= 35 , $as2 >= 35,$ma1 >= 29 , $as2 >= 29, $is1 >= 32; 
                                    $no1+=2, $no2+=2, $im1-=1, $im2-=1, $su1-=1, $su2-=1,$du1-=1, $du2-=1, $as1-=1, $as2-=1, $ma1-=1, $ma2-=1, $is1-=1, $is2-=1) 
                                    { ?>
 
                        <tr>
                            <td> <?php echo "2022-04-$no1"; ?></td>
                            <td><?php echo "03:$im1:00"; ?></td>
                            <td><?php echo "04:0$su1:00"; ?></td>
                            <td><?php echo "11:$du1:00"; ?></td>
                            <td><?php echo "14:$as1:00"; ?></td>
                            <td><?php echo "17:$ma1:00"; ?></td>
                            <td><?php echo "18:$is1:00"; ?></td>
                            <td><a href="<?php echo "update.sholat.php?tanggal=".$row['tanggal']; ?>" class="update_button"> Edit</a>
                              /
                              <a href="<?php echo "hapus_sholat.php?tanggal=".$row['tanggal']; ?>" class="delete_button"> Delete</a>
                        </tr>

                        <tr>
                            <td> <?php echo "2022-04-$no2"; ?></td>
                            <td><?php echo "03:$im2:00"; ?></td>
                            <td><?php echo "04:0$su2:00"; ?></td>
                            <td><?php echo "11:$du2:00"; ?></td>
                            <td><?php echo "14:$as2:00"; ?></td>
                            <td><?php echo "17:$ma2:00"; ?></td>
                            <td><?php echo "18:$is2:00"; ?></td>
                            <td><a href="<?php echo "update.sholat.php?tanggal=".$row['tanggal']; ?>" class="update_button"> Edit</a>
                              /
                              <a href="<?php echo "hapus_sholat.php?tanggal=".$row['tanggal']; ?>" class="delete_button"> Delete</a>
                        </tr>
                        <?php } ?>

                     <?php  for ($no1 = 1, $no2 = 2, $im1 = 52, $im2 = 52, $su1 = 2,$su2 = 2, $du1=21, $du2=21,$as1=37, $as2=37,$ma1=21, $ma2=21,$is1=32, $is2=32; 
                                    $no1<=30, $no2<=30, $im1 >=0, $im2 >=0, $su1 >= 0, $su2 >= 0, $du1 >= 19, $du2 >= 19, $as1 >= 35 , $as2 >= 35,$ma1 >= 19 , $as2 >= 19, $is1 >= 32; 
                                    $no1+=2, $no2+=2, $im1-=1, $im2-=1, $su1-=1, $su2-=1,$du1-=1, $du2-=1, $as1-=1, $as2-=1, $ma1-=1, $ma2-=1, $is1-=1, $is2-=1) 
                                    { ?>
 
                        <tr>
                            <td><?php echo "2022-05-$no1"; ?></td>
                            <td><?php echo "03:$im1:00"; ?></td>
                            <td><?php echo "04:0$su1:00"; ?></td>
                            <td><?php echo "11:$du1:00"; ?></td>
                            <td><?php echo "14:$as1:00"; ?></td>
                            <td><?php echo "17:$ma1:00"; ?></td>
                            <td><?php echo "18:$is1:00"; ?></td>
                            <td><a href="<?php echo "update.sholat.php?tanggal=".$row['tanggal']; ?>" class="update_button"> Edit</a>
                              /
                              <a href="<?php echo "hapus_sholat.php?tanggal=".$row['tanggal']; ?>" class="delete_button"> Delete</a>
                        </tr>
                        <tr>
                            <td> <?php echo "2022-05-$no2"; ?></td>
                            <td><?php echo "03:$im2:00"; ?></td>
                            <td><?php echo "04:0$su2:00"; ?></td>
                            <td><?php echo "11:$du2:00"; ?></td>
                            <td><?php echo "14:$as2:00"; ?></td>
                            <td><?php echo "17:$ma2:00"; ?></td>
                            <td><?php echo "18:$is2:00"; ?></td>
                            <td><a href="<?php echo "update.sholat.php?tanggal=".$row['tanggal']; ?>" class="update_button"> Edit</a>
                              /
                              <a href="<?php echo "hapus_sholat.php?tanggal=".$row['tanggal']; ?>" class="delete_button"> Delete</a>
                        </tr>

                        <?php } ?>
                    </div>
		</tbody>
	</table></center>
</div>

<div class="form">
<?php echo "<p>Tambah Data Jadwal Sholat</p>"; ?>
<form action='form_sholat.php' method='POST'>

<input type='submit' name='tambah' value='Tambah Data'> </td>

</form>
</div>

<div class="footer">
    <?php echo "<p>20081010161 - fenti agil sakinah</p>"; ?>
  </div>
</div>
</body>
</html>