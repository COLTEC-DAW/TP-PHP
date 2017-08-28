<?php 
ob_start();
session_start();
session_destroy(); ?>
<!DOCTYPE>
<html>
    <body>
        <?php header("location: index.php"); ?>
    </body>
</html>