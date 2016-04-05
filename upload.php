<?php

$upload_folder = 'upload/files/';
$filname = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


$allowed_extensions = array('jpg');
if (!in_array($extension, $allowed_extensions)) {
    die ("Bitte nur jpg benutzen! ");
}
if (isset($_POST["userid"])) {
    $id = $_POST["userid"];
}

/*$allowed_types = array(IMAGETYPE_JPEG);
$detected_type = exif_imagetype($_FILES['datei']['name']);
if (!in_array($detected_type, $allowed_types)) {
    die("Bitte nur Bilder hochladen!");
}*/

$bild = $upload_folder . $filname . '.' . $extension;

if (file_exists($bild)) {

    $uid = 1;
    do {
        $bild = $upload_folder . $filname . '_' . $id . '_' . $uid . '.' . $extension;
        $uid++;
    } while (file_exists($bild));



}
$pdo = new PDO('mysql:host=localhost;dbname=Daniel_test', 'root', 'root');
$statement = $pdo->prepare("UPDATE Username SET  bild = :bild WHERE id = :id");
//var_dump($statement);
$return = $statement->execute(array('id' => intval($id), 'bild' => $bild));
// var_dump($return);


move_uploaded_file($_FILES['datei']['tmp_name'], $bild);
header('Location: http://192.168.1.252/Start.php');

//echo 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>';
?>

<?php echo "<input type='hidden' name='userid' value='" . $id . "' />"  ?>
