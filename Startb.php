<?php
$var ="";
if(isset($var)) {

    $uname = $_POST["username2"];

    $rlname = $_POST["realname2"];

    $pword = $_POST["passwort2"];

    $pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');
    $statement = $pdo->prepare("UPDATE Username SET username = :username, password = :password, realname = :realname WHERE id = :id");
    $result = $statement->execute(array('username' => $uname, 'password' => $pword, 'realname' => $rlname));




}
?>

<form action="Startb.php" method="post">

    Neuer Echtname:<br />
    <input type="Text" name="realname2" /><br />

    Neuer Benutzername:<br />
    <input type="Text" name="username2"><br /><br />

    Neues Passwort:<br />
    <input type="Password" name="passwort2" /><br />

    <input type="Submit" value="Speichern" />

</form>