<?php
function ConnexionBase() {
$user='admin';
$psd='Afpa1234';

    try 
    {
        $connexion = new PDO('mysql:host=localhost;charset=utf8;dbname=record', $user, $psd);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;

    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
    }
}
?>