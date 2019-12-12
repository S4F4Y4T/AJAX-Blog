<?php
  //server configuration
  include_once'app/api/config/config.php';
  include_once'app/lib/Main.php';
  include_once'app/lib/Route.php';

  //api's file
  spl_autoload_register(function($class){
    include_once'app/api/lib/'.$class.'.php';
  });

  Main::construct();

?>