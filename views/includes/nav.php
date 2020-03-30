<nav class="navbar navbar-expand-lg">
  <div class="col-4 d-flex justify-content-start align-items-center">
    <a class="blog-header-logo text-dark" href="home">Billet simple pour l'Alaska</a>
  </div>

  <ul class="nav col-4 d-flex justify-content-center align-items-center">
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Chapitres</a>
      <div aria-labelledby="navbarDropdown" class="dropdown-menu">
        <?php foreach ($linkArticles as $index => $linkArticle) { ?>
            <a class="dropdown-item" href="chapitre?title=<?= format_space($linkArticle['title']) ?>"><?= $linkArticle['title']  ?></a>
        <?php }?>
      </div>
    </li>

    <?php
      if ($_SESSION) {
          if ($_SESSION['admin'] == 1) {?>
        <li class="nav-item">
          <a class="nav-link" href="admin">Administration</a>
        </li>
    <?php }
      }?>
  </ul>

  <?php
      if (!$_SESSION || $_SESSION['id'] == null) { ?>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="btn btn-sm btn-outline-secondary" href="connexion">Se connecter</a>
    </div>
  <?php
  } else { ?>
  <form method="post" action="#" class="col-4 d-flex justify-content-end align-items-center">
    <button class="btn btn-sm btn-outline-secondary" name="deconnexion">Deconnexion</button>
  </form>
<?php } ?>
</nav>
