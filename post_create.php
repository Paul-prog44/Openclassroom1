<?php
session_start();

try{
    $database = new PDO('mysql:host=localhost;dbname=we_love_food;charset=utf8',    //Data Source Name
                'root', //Identifiant
                '',  //mot de passe
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );}
    
    catch (Exception $e)
    
    {
        die('Erreur : '. $e->getMessage());
    }

if (empty($_POST['title']) || empty($_POST['recipe'])) {
    echo "Merci de remplir tous les champs pour soumettre une recette.";
    return;
}

$title = $_POST['title'];
$recipe = $_POST['recipe'];

//insertion en database

$insertRecipe = $database->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
$insertRecipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' => 1,
    'author'=> $_SESSION['LOGGED_USER'],
])
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

<h1>Recette ajoutée avec succès !</h1>
        
        <div class="card">
            
            <div class="card-body">
                <h5 class="card-title">Rappel de votre recette :</h5>
                <p class="card-text"><b>Titre</b> : <?php echo htmlspecialchars($_POST['title']); ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo htmlspecialchars($_POST['recipe']); ?></p>
            </div>
        </div>