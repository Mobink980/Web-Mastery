<?php
define('ROOT', dirname(__DIR__) . '/');
define('APP', ROOT . 'app/');
define('MODEL', ROOT . 'src/Model/');
define('VIEW', ROOT . 'src/View/');
define('CONTROLLER', ROOT . 'src/Controller/');
define('PUBLIC-DIR', ROOT . 'public/');

// echo ROOT;
//The sequence of includes matters!
include APP . 'application.php';
include APP . 'controller.php';
include APP . 'view.php';
include CONTROLLER . 'imageController.php';
include CONTROLLER . 'uploadController.php';
include CONTROLLER . 'userController.php';
include MODEL . 'DbConnection.php';
include MODEL . 'BaseModel.php';
include MODEL . 'User.php';




new Application;
?>