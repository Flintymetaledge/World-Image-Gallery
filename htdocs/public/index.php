<?php

session_start();
//define folder paths
define('ROOT', dirname(__DIR__) . '/');
define('APP', ROOT . 'app/');
define('MODEL', ROOT . 'src/Model/');
define('VIEW', ROOT . 'src/View/');
define('CONTROLLER', ROOT . 'src/Controller/');
define('PUBLIC_DIR', ROOT . 'public/');

//include app components and files
include APP . 'Application.php';
include APP . 'Controller.php';
include APP . 'View.php';
include CONTROLLER . 'imageController.php';
include CONTROLLER . 'uploadController.php';
include CONTROLLER . 'userController.php';
include CONTROLLER . 'searchController.php';
include MODEL . 'DbConnection.php';
include MODEL . 'BaseModel.php';
include MODEL . 'Image.php';
include MODEL . 'User.php';
//launch app
new Application();
?>
