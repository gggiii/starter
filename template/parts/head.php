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
        <link rel="icon" type="image/png" href="favicon.ico">

        <!--
                BOOTSTRAP
        -->
        <link rel="stylesheet" href="<?php echo BASE_URL?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL?>assets/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL?>assets/bootstrap/css/bootstrap-reboot.min.css">

        <!--
                STYLES
        -->
        <link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/flickity.css">
        <link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/style.css">
        <!--
                Dynamic STYLE BY PAGE
        -->
        <?php
                $styleUrl = BASE_URL.'assets/css/'.PAGE.'.css';
                if(file_get_contents($styleUrl)){
                        echo '<link rel="stylesheet" href="'.$styleUrl.'">';
                }    
        ?>
    </head>
    <body>