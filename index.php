<?php
//INCLUDE CONFIG
include('config.php');

//INCLUDE DATABASE
include('database.class.php');
$db = new db(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

//INCLUDE APP
include('app.class.php');
$app = new App($db);

//PARSE URL 
if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);

    if ($url[0] == $app->language) {  //1st parameter is default language
        array_shift($url);
        header('Location:' . ROOT_URL . implode('/', $url));   //route to location without language parameter
        exit();
    } else if ($url == $app->setLanguage($url[0])) {    //1st parameter is a language
        if (isset($url[1])) {
            define('PAGE', $url[1]);
            array_shift($url);
            array_shift($url);
            if (count($url) > 0) {        //parameters exist
                define('PARAMETERS', $url);
            }
        } else {
            define('PAGE', 'home');
            define("PARAMETERS", array());
        }
        define("BASE_URL", ROOT_URL.$app->language.'/');
    } else {
        define('PAGE', $url[0]);    //evaluate 1st perameter as PAGE
        define("BASE_URL", ROOT_URL.$app->language.'/');
        array_shift($url);
        if (count($url) > 0) {        //parameters left
            define('PARAMETERS', $url);
        }
    }
} else {      
    define('PAGE', 'home'); //default page
    define("PARAMETERS", array());
    define("BASE_URL", ROOT_URL);
}
//LOAD PAGE TEMPLATES
if (file_exists(PAGE_TEMPLATES_DIR . $app->language . '/' . PAGE . '.php')) {
    include(PAGE_TEMPLATES_DIR . $app->language . '/' . PAGE . '.php');
} else {
    header("HTTP/1.0 404 Not Found");
    include(PAGE_TEMPLATES_DIR . $app->language . '/' . PAGE_404);
}
