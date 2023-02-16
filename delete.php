<?php
session_start();

include_once('connexionDB.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Effacer une page</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
    <?php include_once('header.php'); ?>
    <h3>Etes-vous sur de vouloir effacer la page ?</h3>
    <h4>Attention, toute suppression est définitive</h4>
    <a class="btn btn-danger" href="post_delete.php?id=<?php echo($_GET['id']);?>" role="button">Effacez la recette</a>
</body>

