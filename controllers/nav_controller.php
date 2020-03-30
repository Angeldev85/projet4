<?php

$linkArticles = Articles::getAllArticles();


if (isset($_POST['deconnexion'])) {
    $_SESSION['id'] = null;
    $_SESSION['admin'] = null;
    $_SESSION['pseudo'] = null;
    $_SESSION['password'] = null;
}
