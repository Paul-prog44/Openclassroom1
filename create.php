<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>

    <?php if(empty($_SESSION['LOGGED_USER'])): ?>
        <h1>Vous devez vous enregistrer pour poster une recette.</h1>
       <?php include_once('login.php');?>
        
    <?php else: ?>
        <h1>Ajouter une recette</h1>
        <form action="post_create.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Titre de la recette</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="Titre de la recette">
                <div id="email-help" class="form-text">Choisissez un titre alléchant !</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" placeholder="Exprimez vous" id="recipe" name="recipe"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>
    <?php endif; ?>
    
    

    

    <?php include_once('footer.php'); ?>
</body>
</html>