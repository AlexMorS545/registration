<?php
//spl_autoload_register(function ($classname) {
//  include_once "c/$classname.php";
//});

require_once 'autoload.php';

//site.ru/index.php?act=auth&c=User

$action = 'action_';
$action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';

switch ($_GET['c']) {
  case 'articles':
    $controller = new PageC();
  case 'user':
    $controller = new UserC();
    break;
  default:
    $controller = new PageC();
}

//if (isset($_GET['c'])) {
//  if ($_GET['c'] == 'page') {
//    $controller = new PageC();
//  } else if ($_GET['c'] == 'user') {
//    $controller = new UserC();
//  }
//} else {
//  $controller = new PageC();
//}

$controller->Request($action);