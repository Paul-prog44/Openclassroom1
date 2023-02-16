<?php
session_start();

include_once('connexionDB.php');

    $retrieveRecipeStatement = $database->prepare('DELETE FROM recipes WHERE recipe_id = :id');
    $retrieveRecipeStatement->execute([
        'id' => $_GET['id'],
    ]);
    $recipeStatement = "La recette a bien été supprimée !";
 

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

    <h1>La recette a bien été supprimé</1>

    <?php include_once('footer.php'); ?>
</body>
</html>