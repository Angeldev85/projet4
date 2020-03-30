<?php
$article = new Articles(format_dash($_GET['title']));

$comments = Comments::getAllComments($article->id);

if (!empty($_POST) && isset($_POST['send'])) {
    if (isset($_POST['message'])) {
        if (!empty($_POST['message'])) {
            if (isset($_SESSION)) {
                $nouveauCom = Comments::addComment($_SESSION['id'], $article->id, $_POST['message']);
            }
        }
    }
}

if (isset($_POST['delete'])) {
    $deleteCom = Comments::deleteComment($_GET['delete']);
}


if (isset($_POST['report'])) {
    $reportCom = Comments::reportComment($_GET['report']);
}

if (isset($_POST['confirm-edit'])) {
    Comments::updateComment($_GET['edit'], $_POST['content-edit']);
    header('Location: chapitre?title='. format_space($article->title));
}
