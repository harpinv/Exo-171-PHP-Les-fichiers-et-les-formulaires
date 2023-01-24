<?php
if(isset($_FILES['fichierUtilisateur']) && $_FILES['fichierUtilisateur']['error'] === 0) {

    $allowedMimeTypes = ['image/jpeg', 'image/png'];
    if(in_array($_FILES['fichierUtilisateur']['type'], $allowedMimeTypes)) {

        $maxSize = 3 * 1024 * 1024;
        if((int)$_FILES['fichierUtilisateur']['size'] <= $maxSize) {

            $tmp_name = $_FILES["fichierUtilisateur"]["tmp_name"];
            $name = $_FILES["fichierUtilisateur"]["name"];
            move_uploaded_file($tmp_name, $name);
        }
        else {
            echo "Le poids du fichier est trop élevé, vous ne pouvez uploader des fichiers que de moins de 3Mo";
        }
    }
    else {
        echo "Vous avez fourni un mauvais type de fichier";
    }
}
else {
    echo "Une erreur s'est produite en uplodant votre fichier";
}