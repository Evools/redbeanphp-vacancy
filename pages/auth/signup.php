<?php

require_once "Controller/AuthController.php";

if (isset($_SESSION['auth'])) {
  header('Location: /');
  exit;
}

$err_email = $err_password = $err_confirm = '';

if (isset($_POST['register'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];

  if ($confirm != $password) {
    $err_confirm = "Пароли не совпадают";
  }
  if (empty($confirm)) {
    $err_confirm = "Введите пароль";
  }
  if (empty($email)) {
    $err_email = "Введите email";
  }
  if (empty($password)) {
    $err_password = "Введите пароль";
  }

  if (empty($err_confirm) && empty($err_email) && empty($err_password)) {
    $auth = new AuthController();
    $auth->signUp($email, $password);
    header('Location: /signin');
    exit;
  }
}

?>

<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>
<div class="container mt-3">
  <form action="" method="post">
    <h2>Регистрация</h2>
    <div class="form-group mt-3">
      <label for="exampleInputEmail1">Email адресс</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваш Email">
      <small class="text-danger"> <?= $err_email; ?> </small>
    </div>
    <div class="form-group mt-3">
      <label for="exampleInputPassword1">Пароль</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
      <small class="text-danger"> <?= $err_password; ?> </small>
    </div>
    <div class="form-group mt-3">
      <label for="exampleInputPassword1">Повторить пароль</label>
      <input type="password" name="confirm" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
      <small class="text-danger"> <?= $err_confirm; ?> </small>
    </div>
    <button type="submit" name="register" class="btn btn-primary mt-3">Регистарция</button>
  </form>
</div>
<?php include "layout/footer.php"; ?>