<?php


class AuthController
{
  public function signUp($email, $password)
  {
    $user = R::dispense('users');
    $user->email = $email;
    $user->password = password_hash($password, PASSWORD_DEFAULT);
    R::store($user);
  }

  public function signIn($email, $password)
  {
    $user = R::findOne('users', 'email = ?', [$email]);
    if ($user) {
      if (password_verify($password, $user->password)) {
        $_SESSION['auth'] = true;
        $_SESSION['email'] = $user->email;
        header('Location: /');
        exit;
      }
    }
  }
}
