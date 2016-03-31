<?php

$pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');

if (isset($_POST["username2"], $_POST["realname2"], $_POST["passwort2"])) {

    $uname = $_POST["username2"];

    $rlname = $_POST["realname2"];

    $pword = $_POST["passwort2"];

    $statement = $pdo->prepare("INSERT INTO Username (username, password, realname) VALUES (:username, :password, :realname)");

    $statement->execute(array('username' => $uname, 'password' => $pword, 'realname' => $rlname));


    header('Location: http://192.168.1.252/Login.php');

}
?>

<form name="registerform" action="Register.php" method="post">

    Neuer Echtname:<br/>
    <input type="Text" name="realname2"/><br/>

    Neuer Benutzername:<br/>
    <input type="Text" name="username2"><br/><br/>

    Neues Passwort:<br/>
    <input type="Password" name="passwort2"/><br/>

    <input type="Submit" value="Register"/>

</form>