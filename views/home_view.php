<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?></title>
  </head>

  <body>
    <div class="container">
      <?php include_once 'views/includes/nav.php'?>


      <header class="jumbotron p-4 p-md-5 text-white text-right rounded bg-home d-flex align-items-end flex-column">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Billet simple pour l'Alaska</h1>
          <p class="lead my-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dignissim turpis magna, sed porttitor purus lobortis et. Mauris et rhoncus purus. Proin ornare tristique enim ac euismod. Sed bibendum ut orci sit amet iaculis. Maecenas sollicitudin eu nisi vitae commodo.</p>
        </div>
      </header>

      <div class="row mb-2">
        <?php foreach ($listArticles as $index => $article) : ?>
          <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0"><?= $article['title'] ?></h3>
                <div class="mb-1 text-muted"><?= date_format(date_create($article['date_article']), 'd/m/Y') ?></div>
                <p class="card-text mb-auto"><?= substr($article['content'], 0, 100) ?></p>
                <a href="chapitre?title=<?= format_space($article['title']) ?>" class="stretched-link">Lire la suite ...</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>

    <?php include_once 'views/includes/footer.php'?>
    </div>

  </body>
</html>
