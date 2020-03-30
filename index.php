<?php
// Inclusion des fichiers principaux
include_once '_config/config.php';
include_once '_config/db.php';
include_once '_functions/functions.php';
include_once '_classes/Autoloader.php';
Autoloader::register();

// Définition de la page courante
if (isset($_GET['page']) and !empty($_GET['page'])) {
    // function trim pour ignorer les espaces dans le nom du fichier
    // strtolower pour s'assurer que le nom du fichier est bien en miniscule
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}

// Array contenant toutes les pages
$allPages = scandir('controllers/');

// Vérification de l'existance de la page
if (in_array($page . '_controller.php', $allPages)) {

  // Inclusion de la page
    include_once 'models/' .$page. '_model.php';
    include_once 'controllers/nav_controller.php';
    include_once 'controllers/' .$page. '_controller.php';
    include_once 'views/' .$page. '_view.php';
} else {
    // Retour d'une erreur
    echo 'Erreur 404';
}
