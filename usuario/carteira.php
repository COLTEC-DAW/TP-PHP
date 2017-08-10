<?php
    ob_start(); // Initiate the output buffer
    require "../utils/functions.php";
    require "class_user.inc";
    require '../doacoes/class_doacao.inc';
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  	
    <!--Import Google Icon Font-->
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<!--Import materialize.css-->
  	<link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <script type="text/javascript" src="../js/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    
    <?php include_once '../utils/nav.inc' ?>
      
    <div class="container">
        <form action="deposita.php" method="post">
            <label>Valor que deseja depositar</label>
            <input type="number" class="form-control" name="valor">
            <input type="submit" class="btn btn-default" name="Verificar" value="Depositar">
        </form>
        <?php
            if(Errors()){
                $resposta = Errors();
                $_SESSION['error'] = "valido";
            ?>
                <div class="card-panel red lighten-4">
                    <span><?=$resposta?></span>
                </div>
            <?php
            }
        ?>
    </div>                 
</body>
</html>