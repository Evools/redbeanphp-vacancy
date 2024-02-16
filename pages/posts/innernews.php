<?php

require_once "Controller/PostsController.php";

$get_one_news = new PostController();
$news = $get_one_news->selectNews($id);

?>


<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>
<div class="container mt-3">
  <div class="posts">
    <img src="/<?= $news->image; ?>" class="img-fluid" alt="..." style="height: 300px;">
    <h4> <?= $news->title ?> </h4>
    <p><?= $news->text ?></p>
  </div>
</div>
<?php include "layout/footer.php"; ?>