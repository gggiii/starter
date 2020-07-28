<?php
    //ADD EXCEPTIONS TO HEADE SETUP
    $app->theme->exception(function(){
      
            return array('title'=>'Test page');
        
    });
    $app->theme->head();
?>


<h1>TEST</h1>



<?php
    $app->theme->footer();
?>