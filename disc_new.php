<?php
    include ("db.php");
    $db = connexionBase();
    $requete = $db->query("SELECT artist_name, artist_id FROM artist");
    $requete->execute(); 
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet'href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Formulaire d'ajout</title>
</head>
<body>
<div class="container">
<header>
</header>
<form action="script_disc_ajout.php" method="POST" id="formulaire_ajout" >    
<fieldset>
        <legend class="h1">Ajouter un vinyle</legend>
            <label for="title">Title</label>
            <input name="title" type="text" placeholder="Enter title" class="form-control"><br>
            <label for="artist">Artist</label>
            <select name='artist' id="artist" size='1'class='form-control'>
                <option selected>Select artist</option>
                <?php foreach($tableau as $artist) : ?>
                <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                <?php endforeach ?>
            </select>    
            <br>
            <label for="year">Year</label><input name='year' type="text" placeholder="Enter year" class="form-control"><br>
            <label for="genre">Genre</label><input name='genre' type="text" placeholder="Enter genre (Rock,Pop,Prog...)" class="form-control"><br>
            <label for="label">Label</label><input name='label' type="text" placeholder="Enter label (EMI,Warner,PolyGram,Universale...)" class="form-control"><br>
            <label for="price">Price</label><input name='price' type="text" class="form-control"><br>
            <label for="picture">Picture</label><br>
            <input name='picture' type="file" accept="image/png,image/jpeg"><br><br>
            <input class="btn btn-primary btn-sm" type="submit" value="Ajouter">
            <a class="btn btn-primary btn-sm" href="discs.php"role="button">Retour</a>        
</fieldset>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>