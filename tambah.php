<?php

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'function.php';

// cek tombol submit
if( isset($_POST["submit"]) ) {
	
	
	// cek data apakah berhasil ditambahkan
	if(tambah($_POST) > 0){
		echo "
		<script>
		alert('Data Berhasil Ditambahkan');
		document.location.href='index.php';
		</script>
		" ;
	} else {
		echo "
		<script>
		alert('Data Gagal Ditambahkan');
		document.location.href='index.php';
		</script>
		" ;
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>tambah menu</title>
</head>
<body>
	<h1>Tambah Menu</h1>
	<form action="" method="post" enctype="multipart/form-data">
		
		<label for="nama">Nama :</label>
		<input type="text" name="nama" id="nama">
		<br><br>
		<label for="harga">Harga :</label>
		<input type="text" name="harga" id="harga">
		<br><br>
		<label for="gambar">Gambar :</label>
		<input type="file" name="gambar" id="gambar">
		<br><br>
		<button type="submit" name="submit">Tambah Menu</button>

	</form>

</body>
</html>