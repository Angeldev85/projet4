<?php
$listUsers = Users::getAllUsers();

$listReported = Comments::getAllReported();

if (isset($_POST['publish'])) {
    $newArticle = Articles::addArticle($_SESSION['id'], $_POST['title'], $_POST['content']);
}

if (isset($_POST['delete_com'])) {
    $deleteCom = Comments::deleteComment($_GET['delete']);
}

if (isset($_POST['ignore'])) {
    $ignoreCom = Comments::ignoreComment($_GET['ignore']);
}

$listArticles = Articles::getAllArticles();


if (isset($_POST['delete_article'])) {
    $deleteCom = Articles::deleteArticle($_GET['delete']);
}

if (isset($_POST['confirm-edit'])) {
    Articles::updateArticle($_GET['edit'], $_POST['title-edit'], $_POST['content-edit']);
    header('Location: admin');
}
