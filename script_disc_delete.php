<?php

//controle id
if(!(isset($_GET['disc_id'])) || intval($_GET['disc_id'])<= 0) GOTO TrtRedirection;
//si ok
require "db.php";
$db = connexionBase();

try {
$requete= $db->prepare("DELETE FROM disc WHERE disc_id = ?");
$requete->execute(array($_GET["disc_id"]));
$requete->execute();
$requete->closeCursor();
    }
catch (Exception $e){
echo "Erreur : ".$requete->errorInfo()[2] . "<br>";
die("Fin du script (script_disc_modif.php)");
}
//si ok redirection page discs.php
TrtRedirection:
header ("Location: discs.php");
exit;