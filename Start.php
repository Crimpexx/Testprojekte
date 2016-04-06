<html>
<head>
    <title>Startseite</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
<script>
    function loeschen(id) {
        alert(id);
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = funtion()
        {
            if (xhttp.readyState == 4 && xhttp.status == 200){
                document.getElementById("id").innerHTML = xhttp.responseText;
            }
                }
        xhttp.open("POST", "Delete.php", true);
        xhttp.send();
    }

</script>
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

        if (isset($row["bild"])) {
            echo "<tr>" . "<td>" . "<img src=\"" . $row["bild"] . "\">" . "</td>" . "<td align='right'>" . $row["id"] . "</td>" . "<td>" . $row["username"] . "</td>" . "<td>" . $row["realname"] . "</td>";
        } else {
            echo "<tr>" . "<td>" . "</td>" . "<td align='right'>" . $row["id"] . "</td>" . "<td>" . $row["username"] . "</td>" . "<td>" . $row["realname"] . "</td>";
        }

        ?>
        <?php echo "<input type='hidden' name='userid' value='" . $id . "' />" ?>
        <td><a href="<?php echo "Startb.php?userid=" . $row["id"] ?>">Bearbeitung</a></td>
        <td><a href="<?php echo "Startd.php?userid=" . $row["id"] ?>">Löschen</a></td>
        <td><input type="button" value="Löschen" name="Löschen" onclick="loeschen(<?php echo $row["id"] ?>)"></td>

        </tr>


        <?php
    }


}
?>


</body>
</html>