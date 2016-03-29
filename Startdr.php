<?php
if(isset($_GET["userid"])){
    $id = $_GET["userid"];
}
$var ="";
if(isset($var)) {

    $pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');
    $statement = $pdo->prepare("DELETE FROM Username WHERE id = :id");
    $statement->execute(array('id' => $id));
    header('Location: http://192.168.1.252/Start.php');


//header('Location: /Start.php');
}
?>
<form  action="Startd.php" method="post">

    Benutzer löschen?<br />



    <?php echo "<input type='hidden' name='userid' value='".$id."' />"?>
    <input type="Submit" value="Ja" />

</form>