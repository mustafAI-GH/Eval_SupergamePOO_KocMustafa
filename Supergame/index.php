<?php

include('./env.php');
include('./utils/utils.php');
include('./Model/Model.php');
include('./Model/ModelPlayer.php');
include('./View/View.php');
include('./View/ViewHome.php');
include('./Controller/Controller.php');
include('./Controller/ControllerHome.php');

//1. Récupérer l'url demandé par l'utilisateur
$url = parse_url($_SERVER['REQUEST_URI']);

//2. Récupérer le path de l'url : ceux qui vient après le nom de domaine
$path = isset($url['path']) ? $url['path'] : '/';


switch ($path) {
    case '/':
        $controllerHome = new ControllerHome(new ViewHome(), new ModelPlayer(connect()));
        $controllerHome->render();
        break;
    default:
        http_response_code(404);
        echo "Page not found";
        break;
}