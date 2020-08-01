<?php
global $app;
?>
<!DOCTYPE html>
<html lang="<?php echo $app->language ?>">

<head>
    <title><?php echo $app->theme->title() ?></title>
    <!--
                META TAGS
        -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php echo $app->theme->charset() ?>">
    <meta name="description" content="<?php echo $app->theme->description() ?>">
    <meta name="keywords" content="<?php echo $app->theme->keywords() ?>">
    <meta name="author" content="<?php echo $app->theme->author() ?>">
    <link rel="icon" type="image/png" href="favicon.ico">

    <!--
                CRITICAL STYLES
        -->
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>assets/css/critical.css">
</head>

<body>