<html>
<head>
    <title>Startseite</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
<?php

$var = "";
session_start();


if (isset($var)) {
    $pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');
    $name = $_SESSION['name'];
    //$rname = $_SESSION['rname'];
    $paword = $_SESSION['paword'];
    echo "Willkommen " . $name . " ! " . "<br/>";

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    $sql = "SELECT * FROM Username";
    echo "<table border>";

    foreach ($pdo->query($sql) as $row) {


        echo "<tr>" . "<td align='right'>" . $row["id"] . "</td>" . "<td>" . $row["username"] . "</td>" . "<td>" . $row["realname"] . "</td>";


        ?>
        <td><a href="<?php echo "Startb.php?userid=" . $row["id"] ?>">Bearbeitung</a></td>
        <td><a href="<?php echo "Startd.php?userid=" . $row["id"] ?>">Löschen</a></td>

        </tr>


        <?php
    }


}
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
</form>


</body>
</html>