<?php
    global $app;
?>
<!DOCTYPE html>
<html lang="<?php echo $app->theme->lang()?>">
    <head>
        <title><?php echo $app->theme->title()?></title>
        <!--
                META TAGS
        -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="<?php echo $app->theme->charset()?>">
        <meta name="description" content="<?php echo $app->theme->description()?>">
        <meta name="keywords" content="<?php echo $app->theme->keywords()?>">
        <meta name="author" content="<?php echo $app->theme->author()?>">
        <!--
                STYLES
        -->
        <link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/style.css">
    </head>
    <body>