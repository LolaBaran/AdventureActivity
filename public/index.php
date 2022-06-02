<?php
use Router\Router;
require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR); // chemin vers les views
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR); // chemin vers le dossier public

$router = new Router($_GET['url']); // récupération de l'url lors de la navigation

$router->get('/', 'App\Controllers\AssocController@home'); // route de la page d'accueil du site
$router->get('/activites', 'App\Controllers\AssocController@index'); // route principale du site
$router->get('/activites/:id', 'App\Controllers\AssocController@render'); //route de chaque activités proposées
$router->get('/categorie/:id', 'App\Controllers\AssocController@categorie'); //route vers la liste des activités par catégorie.id

$router->run(); // vérification de l'url