        <!--
                BOOTSTRAP
        -->
        <script src="<?php BASE_URL?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php BASE_URL?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!--
                CONDITIONAL HAMMER.JS INCLUDE
        -->
        <?php
            if(PAGE == 'home'):
        ?>
            <script src="<?php BASE_URL?>assets/js/hammer.js"></script>
        <?php
            endif;
        ?>

        <!--
                CONDITIONAL FLICKITY INCLUDE
        -->
        <?php
            if(PAGE == 'home'):
        ?>
            <script src="<?php BASE_URL?>assets/js/flickity.js"></script>
        <?php
            endif;
        ?>


        <script src="<?php BASE_URL?>assets/js/main.js"></script>
    </body>
</html>