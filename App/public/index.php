<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
use App\Autoloader;
use App\Core\Router;

//On importe les namespaces de l'autoloader et du router.


//On inclut l'autoloader.
include '../Autoloader.php';
Autoloader::register();

//On instancie le routeur.
$route = new Router();

//On lance l'application.
$route->routes();
