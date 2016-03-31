<?php

$upload_folder = 'upload/files/';
$filname = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


$allowed_extensions = array('jpg');
if (!in_array($extension, $allowed_extensions)) {
    die("Bitte nur jpg benutzen!");
}

$allowed_types = array(IMAGETYPE_JPEG);
$detected_type = exif_imagetype($_FILES['datei']['name']);
if (!in_array($detected_type, $allowed_types)) {
    die("Bitte nur Bilder hochladen!");
}

$new_path = $upload_folder . $filname . '.' . $extension;

if (file_exists($new_path)) {

    $id = 1;
    do {
        $new_path = $upload_folder . $filname . '_' . $id . '.' . $extension;
        $id++;
    } while (file_exists($new_path));
}

move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
echo 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>';
?>

