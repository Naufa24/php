<?php
require 'function.php';
$toko = query("SELECT * FROM toko");
if( isset($_POST["cari"]) ) {
	$toko = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Belajar Php</title>
</head>
<body>
	<h1>Daftar Menu</h1>
	<a href="tambah.php">Tambah Menu</a>
	<br><br>
	<form action="" method="post">
	  <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian" autocomplete="off">
	  <button type="submit" name="cari">Cari</button>
	</form>
	<br>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Gambar</th>
			
		</tr>
		<?php $i = 1; ?>
		<?php foreach( $toko as $row ): ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="edit.php?id=<?= $row['id']; ?>">Edit</a>  |
				<a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin???');">Hapus</a>
			</td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["harga"]; ?></td>
			<td><img src="img/<?= $row["gambar"]; ?>"width="50"></td>
			
		</tr>
		<?php $i++ ;?>

<?php endforeach; ?>

	</table>

</body>
</html>