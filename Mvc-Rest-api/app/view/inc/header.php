<?php
    spl_autoload_register(function($class){
        include_once'app/api/lib/'.$class.'.php';
    });

    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::logout();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Rest Api</title>
    <link rel="stylesheet" href="<?= BASE; ?>resource/css/style.css?v=1.5">
    <link rel="stylesheet" href="<?= BASE; ?>resource/css/font-awesome.js">
</head>
<body>