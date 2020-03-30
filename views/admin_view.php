<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?></title>
  </head>

  <body>
    <div class="container">
      <?php include_once 'views/includes/header.php'?>
      <?php include_once 'views/includes/nav.php'?>

<?php if ($_SESSION) {
    if ($_SESSION['admin'] == 1) {
        ?>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="chapter">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#chapter_list" aria-expanded="true" aria-controls="chapter_list">
              Chapitres
            </button>
          </h5>
        </div>

        <div id="chapter_list" class="collapse" aria-labelledby="chapter" data-parent="#accordion">
          <div class="card-body">
            <ul>

              <?php foreach ($listArticles as $index => $article):?>
                <div class="card w-100">
                  <div class="card-body">
                    <h5 class="card-title"><?= $article['title'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= date_format(date_create($article['date_article']), 'd/m/Y H:i') ?></h6>
                    <p class="card-text"><?= $article['content']?></p>
                    <div class="d-flex justify-content-end align-items-center mb-2">
                      <button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#chapter-edit<?= $article['id'] ?>" aria-expanded="true" aria-controls="chapter-edit<?= $article['id'] ?>">
                        Editer
                      </button>
                      <form action="admin?delete=<?= $article['id']?>" class="" method="post">
                        <button type="submit" class="btn btn-danger btn-sm"name="delete_article">Supprimer</button>
                      </form>
                    </div>
                    <div id="chapter-edit<?= $article['id'] ?>" class="collapse jumbotron p-1">
                        <form action="admin?edit=<?= $article['id'] ?>" method="post">
                          <div class="form-group">
                            <input type="text" class="form-control" name="title-edit" value="<?= $article['title'] ?>">
                          </div>

                          <div class="form-group">
                            <textarea name="content-edit" class="article-tiny form-control m-1" rows="8" cols="80"> <?= $article['content'] ?></textarea>
                          </div>
                            <p class="text-right">
                              <button type="confirm" class="btn btn-primary btn-sm" name="confirm-edit">Confirmer</button>
                            </p>
                        </form>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </ul>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="users">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#user_list" aria-expanded="true" aria-controls="user_list">
              Liste des utilisateurs
            </button>
          </h5>
        </div>

        <div id="user_list" class="collapse" aria-labelledby="users" data-parent="#accordion">
          <div class="card-body">
            <ul>
              <?php foreach ($listUsers as $index => $user):?>
              <li>ID :<?= $user['id'] ?> <br/>
                Pseudo : <?= $user['pseudo'] ?>
              </li>
            <?php endforeach; ?>
            </ul>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="reported">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#reported_list" aria-expanded="false" aria-controls="reported_list">
              Commentaires signalés
            </button>
          </h5>
        </div>
        <div id="reported_list" class="collapse" aria-labelledby="reported" data-parent="#accordion">
          <div class="card-body">
            <ul>
            <?php foreach ($listReported as $index => $reported) :?>
              <li>
                Pseudo :  <?= $reported['pseudo'] ?> <br/>
                Commentaire : <?= $reported['content'] ?> <br/>
                Posté le : <?= date_format(date_create($reported['date_com']), 'd/m/Y H:i') ?>, sur le chapitre n:<?= $reported['id_article']?>
                <div class=" d-flex justify-content-end align-items-center">
                  <form action="admin?delete=<?= $reported['id']?>" class="m-2" method="post">
                    <button type="submit" class="btn btn-danger btn-sm"name="delete_com">Supprimer</button>
                  </form>
                  <form action="admin?ignore=<?= $reported['id']?>"  class="m-2"method="post">
                    <button type="submit" class="btn btn-info btn-sm"name="ignore">Ignorer</button>
                  </form>
                </div>
              </li>
            <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="new_chapter">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#add_chapter" aria-expanded="false" aria-controls="add_chapter">
              Ajouter un nouveau chapitre
            </button>
          </h5>
        </div>
        <div id="add_chapter" class="collapse" aria-labelledby="new_chapter" data-parent="#accordion">
          <div class="card-body">
            <form class="" action="#" method="post">
              <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="title" id="title">
              </div>
              <div class="form-group">
                <label for="content">Contenu</label>
                <textarea class="form-control article-tiny" id="content" name="content" rows="10"></textarea>
              </div>
                <button type="submit" class="btn btn-primary mb-2" name="publish">Publier</button>
            </form>
          </div>
        </div>
      </div>

    </div>
    <?php
    } else {
        ?>
    <p class="display-4 text-center">Vous devez être administrateur pour pouvoir accèder à cette page.</p>
    <?php
    }
} ?>




      <?php include_once 'views/includes/footer.php'?>
    </div>

  </body>
</html>
