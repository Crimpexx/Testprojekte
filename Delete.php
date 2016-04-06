<?php

$pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');

$statment= $pdo -> prepare("DELETE FROM Username WHERE id = :id" );

$statement->execute(array('id' => $_POST["userid"]));
?>