<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?></title>
  </head>

  <body>
    <div class="container position-relative vh-100">

      <?php include_once 'views/includes/header.php'?>
      <div class="postion-absolute" style="top:0;">
        <?php include_once 'views/includes/nav.php'?>
      </div>
      <form class="card p-4 bg-light border position-absolute" style="width: 30rem;top:50%;left:50%;transform:translate(-50%, -50%);" action="#" method="post">
        <p class="lead text-center"> <?= $connecte ?></p>
        <?php if (!$_SESSION || $_SESSION['id'] == null) {?>
        <div class="form-group">
          <label for="pseudo">Pseudo :</label>
          <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe :</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary mb-2"name="connexion">Se connecter</button>
      <?php } ?>
      </form>

      <div class="position-absolute w-100" style="bottom:0; left:0;">
        <?php include_once 'views/includes/footer.php'?>
      </div>
    </div>

  </body>
</html>
