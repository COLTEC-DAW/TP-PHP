<?php
    session_start();
    
    //Fazer logoff do usuario
    session_destroy();

    //Redirecionar para a pagina principal
    header('location:../index.php');
?>