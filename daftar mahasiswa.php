<?php  

$koneksi= new mysqli("localhost", "root", "", "mahasiswa"); /* baris ini untuk menghubungkan kedatabase */

$cek=mysqli_query($koneksi, "SELECT * FROM datamahasiswa");/* baris ini menampilkan semua data dari tabel kendaraan */
?>
<?php 

if (isset($_POST['cari'])) {
	$cari=$_POST['car'];
	$cek= mysqli_query($koneksi,"SELECT * FROM datamahasiswa WHERE npm like '%".$cari."%' 

		"); /* baris ini menampilkan semua data dari tabel kendaraan berdasarkan nomer mesin yang diinput, minimal mempunyai kemiripan 1 huruf */
}

else{
	$cek= mysqli_query($koneksi,"SELECT * FROM datamahasiswa"); /* baris ini menampilkan semua data dari tabel kendaraan  ketika tombol cari tidak ditekan*/
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>daftar mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="gaya.css">
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<form action="" method="post">
		<input type="text" name="car" id="car" size="50px" autofocus autocomplete="on" placeholder="ketik NPM yang ingin dicari">
		<button type="submit"  name="cari"> cari</button>
		<b><button><a href="inputdata.php" style="text-decoration: none;">Tambah data</a></button></b>
				<b><button><a href="keluar.php" style="text-decoration: none;">logout</a></button></b>
				<b><button><a href="print.php" style="text-decoration: none;">cetak</a></button></b>
				<b><button><a href="login.php" style="text-decoration: none;">login</a></button></b>


	</form>
	<br>
<table border="1px" cellpadding="15px" cellspacing="0" width="100%">	
<tr>
	<th>No</th>
	<th>Aksi</th>
	<th>Npm</th>
	<th>Nama</th>
	<th>Nilai Bahasa Indonesia</th>
	<th>Nilai Agama  </th>
	<th>Nilai Matematika</th>
	<th>Nilai Pkn</th>

</tr>
<?php $i=1; ?>
	<?php  while ($row=mysqli_fetch_assoc($cek) )/* baris ini mengambil  semua data dari variabel $cek menjadi menjadi array asosiatip atau keynya berdasarkan name atau nama, dan melakukan perulangan */ :{
		} ?>
<tr>
	<td> <?php echo $i; ?></td>
	<td><button><a href="hapus.php?npm=<?=$row["npm"]; ?>" onclick="return confirm('yakin');" style="text-decoration: none;">hapus data</a></button>
	<button><a href="ubah.php?npm=<?= $row["npm"]; ?>" style="text-decoration: none;"> ubah data</a></button>
</td>

	<td><?php echo$row["npm"]; ?></td><?php /* baris ini menampikan data dari  dari tabel kendaraan berdasarkan name atau nama */ ?>
	<td><?php echo$row["nama"]; ?></td>
	<td><?php echo$row["nilai_bahasa"]; ?></td>
	<td><?php echo$row["nilai_agama"]; ?></td>
	<td><?php echo$row["nilai_mm"]; ?></td>
	<td><?php echo$row["nilai_pkn"]; ?></td>
</tr>
<?php $i++; ?>
<?php  endwhile;  /* baris ini berfungsi mengakhiri perulangan while */?>
</table>
</body>
<footer >
 <p style="text-align: center; color: yellow;"> &copy;Eri Yulian Hidayat 2021</p>
</footer>
</html>





