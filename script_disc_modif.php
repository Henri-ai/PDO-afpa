<?php

    // Récupération des valeurs :
    $id = (isset($_POST['disc_id']) && $_POST ['disc_id']!="") ? $_POST['disc_id'] : Null;
    $title = (isset($_POST['disc_title']) && $_POST['disc_title'] != "") ? $_POST['disc_title'] : Null;
    $artist = (isset($_POST['disc_artist']) && $_POST['disc_artist']!= "") ? $_POST['disc_artist'] : Null;
    $year = (isset($_POST['disc_year']) && $_POST['disc_year'] != "") ? $_POST['disc_year'] : Null ;
    $genre = (isset($_POST['disc_genre']) && $_POST['disc_genre'] != "") ? $_POST['disc_genre'] : Null ;
    $label = (isset($_POST['disc_label']) && $_POST['disc_label'] != "") ? $_POST['disc_label'] : Null ;
    $price = (isset($_POST['disc_price']) && $_POST ['disc_price'] != "") ? $_POST ['disc_price'] : Null ;
    $picture =(isset($_POST['disc_picture']) && $_POST['disc_picture'] != "") ? $_POST ['disc_picture'] : Null ;


    // si erreur on renvoie sur le disc_form.php
    if($id==Null){
            header("Location: discs.php");
                }
    if($title == "" || $artist == "" || $year == "" || $genre == "" || $label== "" || $price == "" || $picture == ""){
            header("Location: disc_form.php?disc_id=".$id);
            exit;
            }

// si OK
require "db.php";
$db = ConnexionBase();


try {
$requete = $db->prepare("UPDATE disc SET disc_title = :title, artist_id = :artname, disc_year = :year, disc_genre = :genre, disc_label = :label, 
disc_price = :price, disc_picture = :picture WHERE disc_id = :id");

$requete->bindValue(":id", $id, PDO::PARAM_INT);
$requete->bindValue(":title", $title, PDO::PARAM_STR);
$requete->bindValue(":artname", $artist, PDO::PARAM_STR);
$requete->bindValue(":year", $year, PDO::PARAM_STR);
$requete->bindValue(":genre", $genre, PDO::PARAM_STR);
$requete->bindValue(":label", $label, PDO::PARAM_STR);
$requete->bindValue(":price", $price, PDO::PARAM_STR);
$requete->bindValue(":picture", $picture, PDO::PARAM_STR);

$requete->execute();
$requete->closeCursor();
    }

catch(Exception $e){
        echo "Erreur : " .$requete->errorInfo()[2]. "<br>";
        die("Fin du script (script_disc_modif.php)");
                }

header("Location:discs_detail.php?disc_id=".$id);
exit;


