<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  //server configuration
  include_once'app/config/config.php';

  define('ROOT', getcwd());

  spl_autoload_register(function($class){
    include_once 'system/lib/'.$class.'.php';
  });

  Main::construct();

?>