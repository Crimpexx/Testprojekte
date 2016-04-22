<?php
$idp = $_POST["userid"];
var_dump($idp);
$pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');

$statement= $pdo -> prepare("DELETE FROM Username WHERE id = :id" );

$statement->execute(array('id' => intval($idp)));

?>

