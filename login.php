<?php 

session_start();

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}

require 'function.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result =mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	if(mysqli_num_rows($result) === 1) {

		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {

			$_SESSION["login"] = true;
			header("Location: index.php");
			exit;

		}
	}

	$error = true;
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>halaman Login</title>
</head>
<body>
<h1>Halaman Login</h1>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;"> username / password yang anda masukan SALAH!!!</p>
<?php endif; ?>

<form action="" method="post">
	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<button type="submit" name="login">Masuk</button>
		</li>
	</ul>

</form>
</body>
</html>