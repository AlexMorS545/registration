<?php
//
// Конттроллер страницы чтения.
//
//include_once 'm/UserM.class.php';

class UserC extends BaseC {
  //
  // Конструктор.
  //

  public function action_account() {

    $getUser = new UserM();
    $user = $getUser->getUser($_SESSION['userId']);

    foreach ($user as $u) {
      $this->title .= ' | Личный кабинет :'. $u['login'];
    }
    $this->content = $this->Template('v/v_account.php', array('user'=>$user));
  }

  public function action_reg() {
    $this->title .= ' | Регистрация';
    $this->content = $this->Template('v/v_reg.php', array());

    if ($this->IsPost()) {
      $newUser = new UserM();
      $res = $newUser->newUser($_POST['name'], $_POST['email'], $_POST['pass']);
      $this->content = $this->Template('v/v_reg.php', array('user'=>$res));
    }

  }

  public function action_login() {
    $this->title .= ' | Вход';
    $this->content = $this->Template('v/v_login.php', array());

    if ($this->IsPost()) {
      $user = new UserM();
      $res = $user->login($_POST['name'], $_POST['pass']);
      $this->content = $this->Template('v/v_login.php', array('user'=>$res));
    }
  }

  public function action_logout() {
    $logout = new UserM();
    $res = $logout->logout();
    header('location: index.php');
  }

}