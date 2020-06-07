<?php
    $app->theme->head();
?>

   <pre>
    <?php 
        print_r($app->stats->get());
    ?>
   </pre>

<?php
    $app->theme->footer();
?>