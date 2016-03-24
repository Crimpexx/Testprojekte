<?php

$var ="";
session_start();
if(isset($var)){
    $pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');
    $name = $_SESSION['name'];
    $rname = $_SESSION['rname'];
    $paword = $_SESSION['paword'];
    echo "Willkommen " . $name." ! "."<br/>";

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    $sql = "SELECT * FROM Username";

    foreach ($pdo->query($sql) as $row) {

        echo $row["id"] . "   |     ".$row["username"]."   |    ". $row["realname"];
     /*  <!--
        </form>

        <form action ="Startb.php" method = "post">

        <input type="Submit" value="Bearbeiten">
        </form>


        <form action ="Startd.php" method = "post">

            <input type="Submit" value="Delete">
        </form>
        -->*/


        ?>
<a href="<?php echo "Startb.php?userid=".$row["id"]?>">Bearbeitung</a>
<a href = "Startd.php">Löschen</a>
        <hr/>
<?php
}
}
?>

