<?php

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'function.php';

$id =$_GET['id'];

$tk = query("SELECT * FROM toko WHERE id = $id")[0];


if( isset($_POST["submit"]) ) {
	
	if( edit($_POST) > 0) {
		echo "<script>

				alert('data BERHASIL diedit');
				document.location.href = 'index.php';

			 </script>";
	}else{
		echo "<script>

				alert('data GAGAL diedit');
				document.location.href = 'index.php';

			 </script>"; 
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Menu</title>
</head>
<body>
	<h1>Edit Menu</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $tk["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $tk["gambar"]; ?>">

		<ul>
			<li>
				<label for="nama">Nama :</label>
					<input type="text" name="nama" id="nama" required value="<?= $tk["nama"]; ?>">
			</li>
			<li>
				<label for="harga">Harga :</label>
					<input type="text" name="harga" id="harga" required value="<?= $tk["harga"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<img src="img/<?= $tk['gambar']; ?>" width="60">
					<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Menu</button>
			</li>
		</ul>
	</form>
</body>
</html>