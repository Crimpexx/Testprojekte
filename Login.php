<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=Daniel_test','root','root');

if(isset($_POST['username'], $_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$_SESSION['name'] = $username;
	//$_SESSION['rname'] = $realname;
	$_SESSION['paword'] = $password;

	$statement = $pdo->prepare("SELECT * FROM Username WHERE username = :username AND password = :password");
	$result = $statement->execute(array('username' => $username, 'password' => $password));
	$user = $statement->fetch();
		

	if ($user !== false ) {
		header('Location: http://192.168.1.252/Start.php');
		
	} else {
		echo "Benutzername oder Passwort war ungültig<br>";
	}
	
}


	
?>





<form action="Login.php" method="post">

Benutzername:<br />
<input type="Text" name="username"><br /><br />
 
Passwort:<br />
<input type="Password" name="password" /><br />
 
<input type="Submit" value="Login" />

</form>

<form action ="Register.php" method = "post">

<input type="Submit" value="Register">
</form>

