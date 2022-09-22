<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();
    // on lance une requête pour chercher toutes les fiches des disques
    $requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");

    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD 
    $requete->closeCursor();
    $total=count($tableau);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel='stylesheet'href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Liste des disques</title>
</head>
<body>


<div class="container">
    <header>
        <a class="btn btn-primary btn-sm float-right mt-2" href="disc_new.php" role="button">Ajouter</a>
        <h1><strong>Liste des disques (<?=$total?>)</strong></h1>
        
    </header>

    <div class="d-flex row">
            <?php foreach ($tableau as $disc): ?>
                <div class="d-flex col-6 mb-2">
                        <div class="d-flex col-6"> 
                            <img src="img_jaquettes/<?=$disc->disc_picture?>" alt="pochette" class="img-fluid">
                            
                        </div>  

                        <div class="d-flex col-6 mt-4">
                            <div>
                            <div class="font-weight-bold"><?=$disc->disc_title?><br></div>
                            <div class="font-weight-bold"><?=$disc->artist_name?><br></div>
        <b>Label : </b><?= $disc->disc_label ?><br>
        <b>Year : </b><?= $disc->disc_year ?><br>
        <b>Genre : </b><?= $disc->disc_genre ?><br>
                                
                            
                            <a class="btn btn-primary btn-sm mt-4"href="discs_detail.php?disc_id=<?=$disc->disc_id?>" role="button">Details</a>
                                </div>
                            <div> 
                            
                            </div>
                        </div>
                </div>
            <?php endforeach; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>