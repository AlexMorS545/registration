<?php
//
// Конттроллер страницы чтения.
//

class PageC extends BaseC {
  //
  // нет конструктора в C_BASE, поэтому убрали конструктор из текущего класса
  //

  public function action_index() {
    $this->title .= '::Чтение';
    $text = TextM::text_get();
    //$today = date();
    $this->content = $this->Template('v/v_index.php', array('text' => $text));
  }


  public function action_edit() {
    $this->title .= '::Редактирование';

    if($this->isPost()) {
      TextM::text_set($_POST['text']);
      header('location: index.php');
      exit();
    }

    $text = TextM::text_get();
    $this->content = $this->Template('v/v_edit.php', array('text' => $text));
  }
}
