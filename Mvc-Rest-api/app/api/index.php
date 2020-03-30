<?php
  //server configuration
  include_once'config/config.php';
  
  //api's file
  spl_autoload_register(function($class){
    include_once'lib/'.$class.'.php';
  });

  Main::construct();

?>