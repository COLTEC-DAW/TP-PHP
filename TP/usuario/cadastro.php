<?php
    ob_start(); // Initiate the output buffer
    require '../utils/functions.php';
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
<main>
    <script type="text/javascript" src="js/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>

    <nav class="navbar">
        <div class="container">
            <a class="brand-logo" href="../index.php">TratoFeito</a>
            <ul class="right">
                <li><a href="cadastro.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar</a></li>
                <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a></li>
            </ul>   
        </div>
    </nav>

    <div class="container center-align">

        <div class="col-md-12">
            <form action="conf_cadastro.php" method="post" enctype="multipart/form-data">

                <div class="input-field">
                <input type="text" name="name" required>
                <label>Nome</label>                        
                </div>

                <div class="input-field">
                <input type="text" name="nome" required>
                <label>Login</label>                        
                </div>

                <div class="input-field">
                <input type="password" name="senha" required>
                <label id="label">Senha</label>
                </div>
                                                                
                <div class="input-field">
                <input type="text" name="email" required>
                <label id="label">Email</label>
                </div>

                <div class=" center-align">
                    <input type="submit" name="Enviar" class="btn btn-default">
                </div>
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
    </div>
</main>
</body>
<?php include '../footer.inc' ?>
</html>