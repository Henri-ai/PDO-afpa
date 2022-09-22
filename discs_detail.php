<?php
    // On se connecte à la BDD via notre fichier db.php :
    include "db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $disc_id = $_GET["disc_id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id = ".$disc_id);
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute();
    
    // on récupère le 1e (et seul) résultat :
    $mydisc = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet'href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Disques detail</title>
</head>
<body>

<div class="container">
<header>
    <h1>Details</h1><br>
</header>

<div class='row'>
        <div class="col-6">
                        Title<input class="form-control" type="text" value="<?=$mydisc->disc_title?>"readonly><br>
                        Year<input class="form-control" type="text" value="<?=$mydisc->disc_year?>"readonly><br>
                        Label<input class="form-control" type="text" value="<?=$mydisc->disc_label?>"readonly><br>
        </div>  

        <div class="col-6">        
                        Artist<input class="form-control" type="text" value="<?=$mydisc->artist_name?>"readonly><br>
                        Genre<input class="form-control" type="text" value="<?=$mydisc->disc_genre?>"readonly><br>
                        Price<input class="form-control" type="text" value="<?=$mydisc->disc_price?>"readonly><br>
        </div>
</div> 
    <p>Picture</p>    
    <img src="img_jaquettes/<?= $mydisc->disc_picture ?>" alt="pochette" class="img-fluid">

<footer>
<br>
    <a class="btn btn-primary btn-sm"href="disc_form.php?disc_id=<?=$mydisc->disc_id?>"role="button">Modifier</a>
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Supprimer</button>
    <a class="btn btn-primary btn-sm"href="discs.php" role="button">Retour</a>
</footer>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous supprimez cet élément ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <a type="button" class="btn btn-primary" href="script_disc_delete.php?disc_id=<?=$mydisc->disc_id?>">Supprimer</a>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
