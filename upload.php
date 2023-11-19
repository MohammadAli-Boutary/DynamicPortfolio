<?php

$uploadDir = "Gallery/";
$galleryNamesFile= "uploaded_images.json";
if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile);
    $imageName = $_FILES["image"]["name"];

    $json_data = file_get_contents($galleryNamesFile);
    $imageNames = json_decode($json_data,true);

    $imageNames[] = $imageName;

    file_put_contents($galleryNamesFile,json_encode($imageNames));

}


?>