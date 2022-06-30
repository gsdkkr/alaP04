<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Vul alstublieft beide velden uit!');
}
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
                if($_POST['username'] == "admin") {
                    session_regenerate_id();    
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['username'];
                    $_SESSION['id'] = $id;
                    header('Location: admin.php');
                    return;
                } else {
                    session_regenerate_id();    
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['username'];
                    $_SESSION['id'] = $id;
                    header('Location: home.php');
                } 
        } else {
            header('Location: index.html');
            echo '<div class="warninglabel"><h1>De gebruikersnaam die u zojuist heeft ingevoerd, bestaat niet!</h1></div>';
        }
    } else {
        header('Location: index.html');
        echo 'Het wachtwoord dat u zojuist heeft ingevoerd klopt niet!';
    }

	$stmt->close();
}
?>