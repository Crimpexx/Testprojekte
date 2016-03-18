<?php
session_start();
$name = $_SESSION['name'];
echo "Willkommen ".$name;
?>