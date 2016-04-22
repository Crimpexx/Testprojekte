<html>
<head>
    <title>Startseite</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<link rel="stylesheet" href="style.css">

<script>
    $(document).ready(function(){
       $("button").click(function(){
           $(this).hide();
       });
    });

    function loeschen(id) {


        if (confirm("Benutzer löschen?") == true) {
            var params = "userid=" + id;
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {

                    alert(id + " wurde gelöscht");
                }
            }
            xhttp.open("POST", "Delete.php", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send(params);
        } else {
            alert("Fehler beim Löschen von " + id);
        }

    }


</script>
<body>
<?php

$var = "";
session_start();


if (isset($var)) {
    $pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');
    if (isset($_SESSION['name'], $_SESSION['paword'])) {
        $name = $_SESSION['name'];
        //$rname = $_SESSION['rname'];

        $paword = $_SESSION['paword'];

    echo "Willkommen " . htmlspecialchars($name) . " ! " . "<br/>";}

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    $sql = "SELECT * FROM Username";
    echo "<table border>";

    foreach ($pdo->query($sql) as $row) {
        $id = $row["id"];
        if (isset($row["bild"])) {
            echo "<tr>" . "<td>" . "<img src=\"" . $row["bild"] . "\">" . "</td>" . "<td align='right'>" . $row["id"] . "</td>" . "<td>" . $row["username"] . "</td>" . "<td>" . $row["realname"] . "</td>";
        } else {
            echo "<tr>" . "<td>" . "</td>" . "<td align='right'>" . $row["id"] . "</td>" . "<td>" . $row["username"] . "</td>" . "<td>" . htmlentities($row["realname"]) . "</td>";
        }

        ?>
        <?php echo "<input type='hidden' name='userid' value='" . $id . "' />" ?>
        <td><a href="<?php echo "Startb.php?userid=" . $row["id"] ?>">Bearbeitung</a></td>
       <!-- <td><a href="<?php echo "Startd.php?userid=" . $row["id"] ?>">Löschen</a></td> -->
        <td><input type="button" value="Löschen" name="Löschen" onclick="loeschen(<?php echo $row["id"] ?>)"></td>

        </tr>


        <?php
    }


}
?>
<button>Test button</button>

</body>
</html>