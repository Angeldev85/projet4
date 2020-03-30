<?php
class Articles
{
    public $id;
    public $user_id;
    public $title;
    public $content;
    public $date_article;

    /**
    * Récupération d'un article
    */
    public function __construct($title)
    {
        global $db;

        $title = str_secur($title);

        $reqArticle = $db->prepare('SELECT *
        FROM articles
        WHERE title = ?');
        $reqArticle->execute([$title]);

        $data = $reqArticle->fetch();

        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->date_article = $data['date_article'];
    }

    /**
    * Récupération du dernier article pour la page d'accueil
    * @return array
    */
    public static function getAllArticles()
    {
        global $db;

        $reqArticle = $db->prepare('SELECT *
        FROM articles
        ORDER BY id DESC');
        $reqArticle->execute([]);

        return $reqArticle->fetchAll();
    }

    /**
    * Récupération du dernier article pour la page d'accueil
    * @return array
    */
    public static function getLastArticles()
    {
        global $db;

        $reqArticle = $db->prepare('SELECT *
        FROM articles
        ORDER BY id DESC
        LIMIT 4');
        $reqArticle->execute([]);

        return $reqArticle->fetchAll();
    }

    /**
    * Ajout d'un article
    */
    public static function addArticle($user, $title, $content)
    {
        global $db;

        $user = str_secur($user);
        $title = str_secur($title);

        $reqArticle = $db->prepare('INSERT INTO articles(user_id, title, content, date_article) VALUES ( :user, :title, :content, NOW())');
        $reqArticle->execute(['user' => $user, 'title' => $title, 'content' => $content]);

        header('Location: #');
    }

    /**
    * Suppression d'un article
    * @param $id
    */
    public static function deleteArticle($id)
    {
        global $db;

        $id = str_secur($id);

        $reqArticle = $db->prepare('DELETE FROM articles
        WHERE id = ?');
        $reqArticle->execute([$id]);

        header("Location: #");
    }

    /**
    * Mise à jour d'un article
    * @param $id
    */
    public static function updateArticle($id, $title, $content)
    {
        global $db;

        $id = str_secur($id);
        $title = str_secur($title);

        $reqComment = $db->prepare('UPDATE articles
          SET title = :title , content = :content, date_article = NOW()
          WHERE id = :id');
        $reqComment->execute([':id' => $id, ':title' => $title, ':content' => $content]);
    }
}
