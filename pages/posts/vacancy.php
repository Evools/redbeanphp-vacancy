<?php

require_once "Controller/PostsController.php";

$get_one_job = new PostController();
$job = $get_one_job->selectVacancies($id);

?>


<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>
<div class="container mt-3">
  <div class="posts">
    <h4> <?= $job->title ?> </h4>
    <p><?= $job->text ?></p>
  </div>
</div>
<?php include "layout/footer.php"; ?>