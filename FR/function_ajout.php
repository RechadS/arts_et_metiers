<?php

$link = mysql_connect("localhost", "root", "") or die("Impossible de se connecter : " . mysql_error());
mysql_select_db("am");

if(isset($_POST["submit"])) {
$target_dir = "images/uploads/";
$target_file = $target_dir . basename($_FILES["imageLieu"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imageLieu"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imageLieu"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageLieu"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// on exécute maintenant la requete sql pour tester si les parametres de connexion sont ok
$result = mysql_query("INSERT INTO lieu (titre, contenu, image, categorie) VALUES ($_POST[titreLieu], $_POST[descriptionLieu] , $target_file, $_POST[categorieLieu])");

return $result;
}
?>