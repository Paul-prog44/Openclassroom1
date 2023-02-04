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

    <?php include_once('login.php'); ?>
        <h1>Site de Recettes !</h1>

<?php
try{
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=we_love_food;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
}
catch (Exception $e)
{
    die('Erreur : '. $e->getMessage());
}

$sqlQuery = 'SELECT * FROM recipes WHERE author = ?' ;
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute(['mathieu.nebra@exemple.com']);
$recipes = $recipesStatement->fetchAll();

?>

    <?php if(isset($loggedUser)) : ?>)
        <?php foreach(get_recipes($recipes, $limit) as $recipe) : ?>
            <article>
                <h3><?php echo($recipe['title']); ?></h3>
                <div><?php echo($recipe['recipe']); ?></div>
                <i><?php echo(display_author($recipe['author'], $users)); ?></i>
            </article>
        <?php endforeach ?>
    <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>