<?php
    //ADD EXCEPTIONS TO HEADE SETUP
    $app->theme->exception(function(){
        return array('title'=>'Najlepsi pes');
    });
    $app->theme->head();
?>
<h1>PES</h1>
<?php
    $app->theme->footer();
?>