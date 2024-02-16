<?php


if (!isset($_SESSION['auth'])) {
  header('Location: /');
  exit;
}

require_once "Controller/PostsController.php";

$err_img = $err_title = $err_textinfo = $err_text = '';

if (isset($_POST['add-news'])) {
  if (!empty($_FILES['image_url']['name'])) {
    $uploaddir = 'public/images/news/';
    $image_url = $uploaddir . basename($_FILES['image_url']['name']);
    if (copy($_FILES['image_url']['tmp_name'], $image_url)) {
    } else {
      echo "Произошла ошибка копирования";
    }
  } else {
    $image_url = "/assets/img/no-image-import.jpg";
  }
  $title = $_POST['title'];
  $textinfo = $_POST['textinfo'];
  $text = $_POST['text'];
  $news = new PostController();
  $news->addNews($image_url, $title, $textinfo, $text);
  header("Location: /blog");
}

?>


<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>
<div class="container mt-3">
  <h4>Добавить новость</h4>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="formFile" class="form-label">Добавить обложку новости</label>
      <input id="image_url" name="image_url" class="form-control" type="file">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Заголовок темы</label>
      <input type="text" name="title" class="form-control" placeholder="Введите вакансию">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Краткое описание</label>
      <input type="text" name="textinfo" class="form-control" placeholder="Введите краткое название">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Полное описание</label>
      <textarea id="editor" class="form-control" name="text" rows="3" placeholder="Полное описание новости"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="add-news">Добавить новость</button>
  </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>
<?php include "layout/footer.php"; ?>