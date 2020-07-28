        <!--
                DEFAULT CSS LOADED ASYNCHRONOUSLY
        -->
        <link rel="preload" as="style" onload="this.rel='stylesheet'" href="<?php echo ROOT_URL ?>assets/css/main.css">


        <!--
                DEFAULT JAVASCRIPT
        -->
        <script defer src="<?php echo ROOT_URL ?>assets/js/main.js"></script>
        

        <?php
        $styleUrl = ROOT_URL . 'assets/css/' . PAGE . '.css';
            if ( fopen($styleUrl, "r")) {
                echo '<link rel="preload" as="style" onload="this.rel=\'stylesheet\'" href="' . $styleUrl . '">';
            }
        ?>

        <!--
                DYNAMICSCRIPT INCLUDE BY PAGE
        -->
        <?php
        $scriptUrl = ROOT_URL . 'assets/js/' . PAGE . '.js';
        if (file_exists($scriptUrl)) {
            echo ' <script async src="' . $scriptUrl . '"></script>';
        }
        ?>
        </body>

        </html>