<?php

require_once "Controller/PostsController.php";
$news = new PostController();
$allNews = $news->getAllNews();

?>


<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>
<div class="container mt-3">
  <h4>Список вакансий</h4>
  <div class="row">
    <?php foreach ($allNews as $news) : ?>
      <div class="col-4 mt-3">
        <div class="card">
          <img src="/<?= $news->image; ?>" class="card-img-top" alt="..." style="height: 300px;">
          <div class="card-body">
            <h5 class="card-title"><?= $news->title; ?></h5>
            <p class="card-text"><?= $news->textinfo; ?></p>
            <a href="/blog/<?= $news->id; ?>" class="btn btn-primary">Подробнее</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include "layout/footer.php"; ?>