<?php
    //INCLUDE CONFIG
    include('config.php');

    //INCLUDE DATABASE
    include('database.class.php');
    $db = new db(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE,DB_PORT);

    //INCLUDE APP
    include('app.class.php');
    global $app;
    $app = new App();
    
    //CREATE STATS RECORD
    $app->stats->record();

    //PARSE FIRST URL ARGUMENT - PAGE
    if(isset($_GET['url'])){
        define("PAGE", $_GET['url']);
    }else{
        define("PAGE", 'home');     //DEFAULT PAGE
    }

    //PARSE URL ARGUMENTS
    if(isset($_GET['res'])){
        $res = explode('/',$_GET['res']);
        array_shift($res);
        define("PARAMETERS", $res);
    }else{
        define("PARAMETERS",null);
    }
    
    //LOAD PAGE TEMPLATES
    if(file_exists(PAGE_TEMPLATES_DIR.PAGE.'.php')){
        include(PAGE_TEMPLATES_DIR.PAGE.'.php');
    }else{
        include(PAGE_TEMPLATES_DIR.PAGE_404);
    }

?>