<?php
if(isset($_GET['id'])) {

    $pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');
    $statement = $pdo->prepare("DELETE FROM Username WHERE id = ?");
    $result = $statement->execute(array($_GET['id']));



header('Location: 192.168.1.252/Start.php');
}