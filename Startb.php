<html>
<header>
    <title> Bearbeitung </title>
</header>

<body>





<?php
$pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');
session_start();
if (isset($_GET["userid"])) {
    $id = $_GET["userid"];
}


if (isset($_GET["username2"], $_GET["realname2"], $_GET["passwort2"])) {

    $uname = $_GET["username2"];

    $rlname = $_GET["realname2"];

    $pword = $_GET["passwort2"];


    $statement = $pdo->prepare("UPDATE Username SET username = :username, password = :password, realname = :realname WHERE id = :id");
    $statement->execute(array('username' => $uname, 'password' => $pword, 'realname' => $rlname, 'id' => $id));

    header('Location: http://192.168.1.252/Start.php');


}


?>

<form action="Startb.php" method="get">

    Neuer Echtname:<br/>
    <input type="Text" name="realname2"/><br/>

    Neuer Benutzername:<br/>
    <input type="Text" name="username2"><br/><br/>

    Neues Passwort:<br/>
    <input type="Password" name="passwort2"/><br/>
    <?php echo "<input type='hidden' name='userid' value='" . $id . "' />" ?>
    <input type="Submit" value="Speichern"/>

</form>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
    <?php echo "<input type='hidden' name='userid' value='" . $id . "' />"  ?>
</form>

</body>
</html>