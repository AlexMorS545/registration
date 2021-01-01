<?php

class UserM {

  protected $userId, $userName, $userEmail, $userPass;

  private function connect () {
    return PdoM::getInstance();
  }

  private function setPass($name, $pass) {
    return strrev(md5($name).md5($pass));
  }

  public function getUser ($id) {
    $query = "SELECT * FROM users WHERE id='$id'";
    $res = $this->connect()->Select($query);
    return $res;
  }

  public function newUser ($name, $email, $pass) {

    $query = "SELECT * FROM users WHERE login = '$name'";
    $getUser = $this->connect()->Select($query);

    if (!$getUser) {
      $params = [
        'login' => $name,
        'email' => $email,
        'password' => $this->setPass($name, $pass)
      ];
      $newUser = $this->connect()->Insert('users', $params);
      if (is_numeric($newUser) AND filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Регистрация прошла успешно';
      }
      return 'Ошибка!!';
    }
    return 'Пользователь такой есть';
  }

  public function login ($name, $pass) {

    $query = "SELECT * FROM users WHERE login = '$name'";
    $user = $this->connect()->Select($query);
    if ($user) {
      foreach ($user as $u) {
        if($u['password'] == $this->setPass($name, $pass)) {
          $_SESSION['userId'] = $u['id'];
          return 'Добро пожаловать! ' . $u['login'];
        }
        return 'Не правильно ввели пароль!';
      }

    }
    return 'Нет такого пользователя!';
  }

  public function logout () {
    if (isset($_SESSION['userId'])) {
      session_destroy();
      return true;
    }
    return false;
  }
}