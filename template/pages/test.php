<?php
    //ADD EXCEPTIONS TO HEADE SETUP
    $app->theme->exception(function(){
        if(PARAMETERS[0] == '1'){
            return array('title'=>'123');

        }else{
            return array('title'=>'Test page');
        }
    });
    $app->theme->head();
?>


<h1>TEST</h1>



<?php
    $app->theme->footer();
?>