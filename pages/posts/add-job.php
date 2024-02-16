<?php

if (!isset($_SESSION['auth'])) {
  header('Location: /');
  exit;
}

require_once "Controller/PostsController.php";

$err_img = $err_title = $err_textinfo = $err_text = '';

if (isset($_POST['add-job'])) {
  $title = $_POST['title'];
  $textinfo = $_POST['textinfo'];
  $text = $_POST['text'];
  $jobs = new PostController();
  $jobs->addVacancy($title, $textinfo, $text);
  header("Location: /");
}
?>

<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>



<div class="container mt-3">
  <h4>Добавить вакансию</h4>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="formFile" class="form-label">Заголовок темы</label>
      <input type="text" name="title" class="form-control" placeholder="Введите вакансию">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Краткое описание вакансии</label>
      <input type="text" name="textinfo" class="form-control" placeholder="Введите краткое название">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Полное описание вакансии</label>
      <textarea id="editor" class="form-control" name="text" rows="3" placeholder="описание вакансии"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="add-job">Добавить вакансию</button>
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