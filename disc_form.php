<?php

include "db.php";
$db = connexionBase();

$disc_id = $_GET["disc_id"];
$requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id =:disc_id");
$requete2 = $db->prepare("SELECT * FROM artist");

$requete->bindValue(":disc_id",$disc_id,PDO::PARAM_INT);
$requete->execute();
$requete2->execute();
$disc = $requete->fetch(PDO::FETCH_OBJ);
$artistes = $requete2->fetchAll(PDO::FETCH_OBJ);

$requete->closeCursor();
$requete->closeCursor();



?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet'href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Modifier un vinyle</title>
    </head>
    <body>
<div class="container">
    <form action="script_disc_modif.php" method="post">
        <fieldset>
            <legend class="h1">Modifier un vinyle</legend>
            <label for="title">Title</label>
            
            <input name="disc_title" type="text" value="<?= $disc->disc_title?>" class="form-control"><br>
            
            <label for="artist">Artist</label>
            <select name='disc_artist' id="artist" size='1'class='form-control'>
            <option selected><?=$disc->artist_name?></option>
                <?php foreach($artistes as $ligne):?>
                    <option value="<?= $ligne->artist_id ?>"><?= $ligne->artist_name ?></option>
                <?php endforeach ?>
            </select>       
            <br>
            <input type="hidden" name="disc_id" value="<?= $disc->disc_id ?>">
            <label for="year">Year</label><input name='disc_year' type="text" value="<?=$disc->disc_year?>" class="form-control"><br>
            <label for="genre">Genre</label><input name='disc_genre' type="text" value="<?=$disc->disc_genre?>" class="form-control"><br>
            <label for="label">Label</label><input name='disc_label' type="text" value="<?=$disc->disc_label?>" class="form-control"><br>
            <label for="price">Price</label><input name='disc_price' type="text" value="<?=$disc->disc_price?>" class="form-control"><br>
            <label for="picture">Picture</label><br>
            <input name='disc_picture' type="file" value="<?=$disc->disc_id?><?=$disc->disc_picture?>" accept="image/png,image/jpeg"><br>
            <img src="img_jaquettes/<?= $disc->disc_picture ?>" alt="pochette" class="img-fluid"><br><br>
            <input class="btn btn-primary btn-sm" href="script_disc_modif.php?disc_id=<?=$disc->disc_id?>" type="submit" value="Modifier">
            <a class="btn btn-primary btn-sm" href="discs.php" role="button">Retour</a>        
        </fieldset>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>