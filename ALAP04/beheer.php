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

$sql2 = "SELECT * FROM `accounts`";
$stmt2 = $conn->query($sql2);
$data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["submit2"])) {
  // Prepare sql database
  $sql = "UPDATE `accounts` SET `username` = :username, `email` = :email WHERE `accounts`.`id` = :id;";
  $stmt = $conn->prepare($sql);
  // Bind Params
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':id', $id);
  // Values uit de form
  $username = $_POST["username2"];
  $email = $_POST["email2"];
  $id = $_POST["id2"];
  // Voert uit
  $stmt->execute();
}

if(isset($_POST["submitDel2"])){
  $sql = "DELETE FROM `accounts` WHERE `accounts`.`id` = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id);
  $id = $_POST["id2"];
  $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netfish | Beheer Pagina</title>
    <link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<main class="loggedin">
		<section>
			<div class="topnav">
      <img src="./img/NETFISH_Logo.jpg" style="width: 11%;" alt="">
			<a href="logout.php">Log Uit</a>
      <a class="active">Beheer Pagina</a>
			<a href="adminprofiel.php">Profiel Pagina</a>
			<a href="admin.php">Hoofd Pagina</a>
			</div>
		</section>

		<br><br>
		<h1 style="color:white;">Gebruikers</h1>	
    <form action="" method="post">
  <input type="text" placeholder="Gebruikersnaam" name="username2" id="">
  <input type="text" placeholder="Email" name="email2" id="">
  <input type="text" placeholder="ID" name="id2" id="">
  <input type="submit" class="btn-info" style="border: none;padding: 0.25vw;" value="Pas Aan" name="submit2">
    </form>
<form action="" method="post">
  <input type="text" placeholder="ID" name="id2" id="">
  <input type="submit" class="btn-danger" style="border: none;padding: 0.25vw;" value="Verwijder" name="submitDel2">
</form> 
    <form action="" method="post">
<?php
  echo "<table class='table table-striped table-hover '>";
    foreach($data2 as $product){
        echo "<tr class='table-dark'>";
        echo "<td>";
        echo "<p><strong>ID: </strong>" . $product["id"] . "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p><strong>Username: </strong>" . $product["username"] . "</p>";
        echo "</td>";
        echo "<td>";
        echo "<p><strong>Email: </strong>" . $product["email"] . "</p>";
        echo "</td>";
        echo "</tr>";
    }
  echo "</table>";
  ?>
  </form>
  <br><br>
  <h1 style="color:white;">Films</h1>
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

$sql = "SELECT * FROM `movie`";
$stmt = $conn->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Checks submit knop
if(isset($_POST["submit"])) {
  // Prepare sql database
  $sql = "UPDATE `movie` SET `jaar` = :jaar, `video` = :video, `trailer` = :trailer, `duration` = :duration, `title` = :title, `description` = :description WHERE `movie`.`id` = :id;";
  $stmt = $conn->prepare($sql);
  // Bind Params
  $stmt->bindParam(':jaar', $jaar);
  $stmt->bindParam(':video', $video);
  $stmt->bindParam(':trailer', $trailer);
  $stmt->bindParam(':duration', $duration);
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':id', $id);
  // Values uit de form
  $jaar = $_POST["jaar"];
  $video = $_POST["video"];
  $trailer = $_POST["trailer"];
  $duration = $_POST["duration"];
  $title = $_POST["title"];
  $description = $_POST["description"];
  $id = $_POST["id"];
  // Voert uit
  $stmt->execute();
}

if(isset($_POST["submitAdd"])) {
  // Prepare sql database
  $sql = "INSERT INTO `movie` (`id`, `jaar`, `video`, `trailer`, `duration`, `title`, `description`) VALUES (NULL, :jaar, :video, :trailer, :duration, :title, :description);";
  $stmt = $conn->prepare($sql);
  // Bind Params
  $stmt->bindParam(':jaar', $jaar);
  $stmt->bindParam(':video', $video);
  $stmt->bindParam(':trailer', $trailer);
  $stmt->bindParam(':duration', $duration);
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':description', $description);
  // Values uit de form
  $jaar = $_POST["jaar"];
  $video = $_POST["video"];
  $trailer = $_POST["trailer"];
  $duration = $_POST["duration"];
  $title = $_POST["title"];
  $description = $_POST["description"];
  // Voert uit
  $stmt->execute();
}

if(isset($_POST["submitDel"])){
  $sql = "DELETE FROM `movie` WHERE `movie`.`id` = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id);
  $id = $_POST["id"];
  $stmt->execute();
}
?>
<form action="" method="post">
  <input type="text" placeholder="Jaar" name="jaar" id="">
  <input type="text" placeholder="Video" name="video" id="">
  <input type="text" placeholder="Trailer" name="trailer" id="">
  <input type="text" placeholder="Duration" name="duration" id="">
  <input type="text" placeholder="Title" name="title" id="">
  <input type="text" placeholder="Description" name="description" id="">
  <input type="text" placeholder="ID" name="id" id="">
  <input type="submit" class="btn-info" style="border: none;padding: 0.25vw;" value="Pas Aan" name="submit">
</form>
<form action="" method="post">
<input type="text" placeholder="Jaar" name="jaar" id="">
  <input type="text" placeholder="Video" name="video" id="">
  <input type="text" placeholder="Trailer" name="trailer" id="">
  <input type="text" placeholder="Duration" name="duration" id="">
  <input type="text" placeholder="Title" name="title" id="">
  <input type="text" placeholder="Description" name="description" id="">
  <input type="submit" class="btn-warning" style="border: none;padding: 0.25vw;" value="Voeg Toe" name="submitAdd">
</form>
<form action="" method="post">
  <input type="text" placeholder="ID" name="id" id="">
  <input type="submit" class="btn-danger" style="border: none;padding: 0.25vw;" value="Verwijder" name="submitDel">
</form>
  <?php
			echo "<table class='table table-striped table-hover '>";
				foreach($data as $movie){
			        echo "<tr class='table-default'>";
              echo "<td>";
			        echo "<p style='color: white;'>" . $movie["id"] . "</p>";
			        echo "</td>";
			        echo "<td>";
			        echo "<p style='color: white;'>" . $movie["title"] . "</p>";
			        echo "</td>";
					    echo "<td>";
			        echo "<p style='color: white;'>" . $movie["jaar"] . "</p>";
			        echo "</td>";
			        echo "<td>";
			        echo "<p style='color: white;'>" . $movie["description"] . "</p>";
			        echo "</td>";
			        echo "<td>";
			        echo "<p style='color: white;'>" . $movie["duration"] . " Minuten</p>";
			        echo "</td>";
			        echo "</tr>";
			    }
			  echo "</table>";
  		?>
</html>