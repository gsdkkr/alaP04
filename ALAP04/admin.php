<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

// <?=$_SESSION['name']? >
?>

<?php
$servername = "localhost";
            $username = "root";
            $password = "";
            
            try {
              $conn = new PDO("mysql:host=$servername;dbname=phplogin", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //   echo 'Connected successfully';
            } catch(PDOException $e) {
              echo '<h1 style="font-size: 50px; color: red;"><strong>Connection failed: </strong></h1>' . $e->getMessage();
            }

$sql2 = "SELECT * FROM `movie`";
$stmt2 = $conn->query($sql2);
$data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>Netfish | Admin Pagina</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="styles/style.css">
		<link rel="icon" href="img/sopranos-logo.png">  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<main class="loggedin">
		<section>
			<div class="topnav">
			<img src="./img/NETFISH_Logo.jpg" style="width: 11%;" alt="">
			<a href="logout.php">Log Uit</a>
            <a href="beheer.php">Beheer Pagina</a>
            <a href="adminprofiel.php">Profiel Pagina</a>
			<a class="active">Hoofd Pagina</a>
			</div>
		</section>

		<br><br>
			
		<section>
		<?php
			echo "<table class='table table-striped table-hover '>";
				foreach($data2 as $movie){
			        echo "<tr class='table-dark'>";
			        echo "<td>";
			        echo "<p>" . $movie["title"] . "</p>";
			        echo "</td>";
					echo "<td>";
			        echo "<p>" . $movie["jaar"] . "</p>";
			        echo "</td>";
			        echo "<td>";
			        echo "<p>" . $movie["description"] . "</p>";
			        echo "</td>";
			        echo "<td>";
			        echo "<p>" . $movie["duration"] . " Minuten</p>";
			        echo "</td>";
					echo "<td>";
			        echo "<a target='_blank' href='" . $movie["trailer"] . "'><button>Bekijk Trailer</button></a>";
			        echo "</td>";
					echo "<td>";
			        echo "<a target='_blank' href='" . $movie["video"] . "'><button>Bekijk Film</button></a>";
			        echo "</td>";
			        echo "</tr>";
			    }
			  echo "</table>";
  		?>
		</section>
	</main>
	<script src="https://kit.fontawesome.com/9642bd3caa.js" crossorigin="anonymous"></script>
</html>