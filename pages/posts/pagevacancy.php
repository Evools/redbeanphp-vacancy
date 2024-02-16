<?php

require_once "Controller/PostsController.php";
$jobs = new PostController();
$allJobs = $jobs->getAllVacancies();

?>


<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>
<div class="container mt-3">
  <h4>Список вакансий</h4>
  <div class="row">
    <?php foreach ($allJobs as $job) : ?>
      <div class="col-4 mt-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= $job->title; ?></h5>
            <p class="card-text"><?= $job->textinfo; ?></p>
            <a href="/vacancy/<?= $job->id; ?>" class="btn btn-primary">Подробнее</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include "layout/footer.php"; ?>