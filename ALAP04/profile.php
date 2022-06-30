<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Netfish | Profiel Pagina</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="styles/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<main class="loggedin">
	<section>
			<div class="topnav">
			<img src="./img/NETFISH_Logo.jpg" style="width: 11%;" alt="">
			<a href="logout.php">Log Uit</a>
			<a class="active">Profiel Pagina</a>
			<a href="home.php">Hoofd Pagina</a>
			</div>
	</section>

	<section>
		<p style="color: white; font-size: 40px;"><strong style="color: red;">Gebruikers ID:</strong> <?=$_SESSION['id']?></p>
		<p style="color: white; font-size: 40px;"><strong style="color: red;">Gebruikersnaam:</strong> <?=$_SESSION['name']?></p>
		<p style="color: white; font-size: 40px;"><strong style="color: red;">Email:</strong> <?=$email?></p>
	</section>
	</main>
	<script src="https://kit.fontawesome.com/9642bd3caa.js" crossorigin="anonymous"></script>
					<!-- Zonder spaties 
						< ?=$_SESSION['name']? >
						< ?=$password? >
						< ?=$email? > 
					-->
</html>