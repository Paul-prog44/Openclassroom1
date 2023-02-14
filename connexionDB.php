<?php
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