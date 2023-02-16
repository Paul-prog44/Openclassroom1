<?php session_start(); // début de la session ?>

<?php include_once('connexionDB.php');

// On récupère tout le contenu de la table recipes
$recipesStatement = $database->prepare('SELECT * FROM recipes');
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On récupère le contenu de la table Users
$usersdb = $database->prepare('SELECT * FROM users');
$usersdb->execute();
$users = $usersdb->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>
    <!--Formulaire de connexion -->
    <?php include_once('login.php'); ?>
        <h1>Site de recettes</h1>

        
        <!-- inclusion des fonctions -->
            <?php
                include_once('functions.php');
            ?>

            
            <!-- Affichage des recettes si user est logged -->
            <?php if(isset($_SESSION['LOGGED_USER'])) : ?>
               
               <?php foreach(getRecipes($recipes) as $recipe) : ?>
               <article>
                    <h3><?php echo $recipe['title']; ?></h3>
                   <div><?php echo $recipe['recipe']; ?></div>
                   <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                   <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><a class="link-warning" href="update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a></li>
                        <!--On passe l'id de recette dans la superglobal $_GET afin de pouvoir y avoir accès dans la page update-->
                        <li class="list-group-item"><a class="link-danger" href="delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a></li>  
                    </ul>
               </article> 
               <?php endforeach ?>
        <?php endif; ?>
               
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>
