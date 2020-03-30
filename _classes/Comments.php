<?php
class Comments
{
    public $id;
    public $user_id;
    public $pseudo;
    public $id_article;
    public $date_com;
    public $content;
    public $reported;

    /**
    * Récupération de tous les commentaires
    * @param $article
    */
    public static function getAllComments($article)
    {
        global $db;

        $article = str_secur($article);

        $reqComments = $db->prepare('SELECT c.*, u.pseudo
          FROM comments c
          INNER JOIN users u ON u.id = c.user_id
          WHERE c.id_article = ?
        ');
        $reqComments->execute([$article]);

        return $reqComments->fetchAll();
    }

    public static function addComment($user, $article, $content)
    {
        global $db;

        $user = str_secur($user);
        $article = str_secur($article);
        $content = str_secur($content);

        $reqComment = $db->prepare('INSERT INTO comments(user_id, id_article, date_com, content, reported) VALUES (:user, :article, NOW(), :content, 0)');
        $reqComment->execute([':user' => $user, ':article' => $article, ':content' => $content]);

        header("Location: #");
    }

    /**
    * Signalement d'un commentaire
    * @param $id
    */
    public static function reportComment($id)
    {
        global $db;

        $id = str_secur($id);

        $reqComment = $db->prepare('UPDATE comments
          SET reported = 1
          WHERE id = ?
          ');
        $reqComment->execute([$id]);

        header("Location: #");
    }

    public static function ignoreComment($id)
    {
        global $db;

        $id = str_secur($id);

        $reqComment = $db->prepare('UPDATE comments
          SET reported = 0
          WHERE id = ?
          ');
        $reqComment->execute([$id]);

        header("Location: #");
    }

    /**
    * Suppression d'un commentaire
    * @param $id
    */
    public static function deleteComment($id)
    {
        global $db;

        $id = str_secur($id);

        $reqComment = $db->prepare('DELETE FROM comments
          WHERE id = ?');
        $reqComment->execute([$id]);

        header("Location: #");
    }

    public static function getAllReported()
    {
        global $db;

        $reqReported = $db->prepare('SELECT c.*, u.pseudo, a.id as id_article
        FROM comments c
        INNER JOIN users u ON u.id = c.user_id
        INNER JOIN articles a ON a.id = c.id_article
        WHERE reported = 1');
        $reqReported->execute([]);

        return $reqReported->fetchAll();
    }

    public static function updateComment($id, $content)
    {
        global $db;
        $reqComment = $db->prepare('UPDATE comments
        SET content = :content, date_com = NOW()
        WHERE id = :id');
        $reqComment->execute([':id' => $id, ':content' => $content]);
    }
}
