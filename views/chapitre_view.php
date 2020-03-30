<!DOCTYPE html>
<html>

<head>
  <?php include_once 'views/includes/head.php'?>

  <title><?= ucfirst($page) ?></title>
</head>

<body>
  <div class="container">
    <?php include_once 'views/includes/nav.php'?>

    <div class="jumbotron">
      <h1 class="display-2 text-center"><?= $article->title; ?></h1>
      <hr class="my-4">
      <p><?= $article->content; ?></p>

      <div class="jumbotron bg-light">
        <h2 class="display-4 text-center">Commentaires</h2>
        <hr class="my-4">

        <?php foreach ($comments as $index => $comment): ?>
        <div class="jumbotron p-1">
          <h3 class="display-5"><?= $comment['pseudo'] ?></h3>
          <p class="lead">Posté le <?= date_format(date_create($comment['date_com']), 'd/m/Y H:i') ?></p>
          <p><?= $comment['content']?></p>
          <?php
               if ($_SESSION) {
                   if ($_SESSION['id'] !== null) {
                       ?>
          <?php if ($_SESSION['id'] == $comment['user_id']) {
                           ?>
          <div class="row p-2">
            <button class="btn btn-link" data-toggle="collapse" data-target="#comment-edit<?= $comment['id'] ?>" aria-expanded="true" aria-controls="comment-edit<?= $comment['id'] ?>">
              Editer
            </button>
            <form class="m-1" action="chapitre?title=<?= format_space($article->title) ?>&amp;delete=<?=$comment['id']?>" method="post">
              <button type="submit" class="btn btn-danger btn-sm" href="#" name="delete">Supprimer</button>
            </form>
          </div>
          <div id="comment-edit<?= $comment['id'] ?>" class="collapse">
            <div class="card-body">
              <form class="" action="chapitre?title=<?= format_space($article->title) ?>&amp;edit=<?=$comment['id']?>" method="post">
                  <div class="form-group">
                <textarea name="content-edit" class="form-control" rows="8" cols="80"> <?= $comment['content'] ?></textarea>
              </div>
              <p class="text-right">
                <button type="confirm" class="btn btn-primary btn-sm" name="confirm-edit">Confirmer</button>
              </p>
              </form>
            </div>
            <?php
                       } else {
                           if ($comment['reported'] == 0) {
                               ?>
            <form class="m-1" action="chapitre?title=<?= $article->title ?>&amp;report=<?=$comment['id']?>" method="post">
              <button type="submit" class="btn btn-secondary btn-sm" href="#" name="report">Signaler</button>
            </form>
            <?php
                           } else {
                               ?>
            <p class="btn-sm" style="color:red">Signalé</p>
            <?php
                           }
                       } ?>
          </div>
          <?php
                   }
               }
             ?>

          <?php endforeach; ?>
        </div>
        <?php
           if ($_SESSION) {
               if ($_SESSION['id'] !== null) {
                   ?>
        <div class="jumbotron bg-light p-1">
          <form action="#" method="post">
            <textarea class="form-control" name="message" rows="5"></textarea>
            <p class="text-right">
              <button type="submit" name="send" class="btn btn-primary m-2">Envoyer</button>
            </p>
          </form>
        </div>
        <?php
               }
           } ?>
      </div>

      <?php include_once 'views/includes/footer.php'?>
    </div>
</body>

</html>
