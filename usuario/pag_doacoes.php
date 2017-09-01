<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    require "../utils/functions.php";
    require '../doacoes/class_doacao.inc';
    session_start();

    $id = $_POST['id'];
    armazena_doacoes_classe($id);

    $doacao_atual = $_SESSION["doacao_atual"];
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
    <script type="text/javascript" src="../js/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>

    <?php include '../utils/nav.inc';?>
      
    <div class="row">
        <div class="card col s6 offset-s3" id="pedido">
            <div class="card-image">
                <?php 
                    $formato=Pega_Formato_Imagem($id,"../imagens/imagens.json");
                    $link = "../imagens/".$id.".".$formato;
                ?>
                <img src="<?=$link?>" id="imgpedido">
            </div>
            <div class="card-content center">
                <h3><?=$doacao_atual->descricao?></h3>
 
                <h5>Autor:</h5>
                <p class="flow-text card-subtitle grey-text text-darken-2"><?=$doacao_atual->autor?></p>
                <h5>Sobre:</h5>
                <div class="col l12">
                    <p class="flow-text card-subtitle grey-text text-darken-2"><?=$doacao_atual->sobre?></p>
                </div>
                <h5>Meta</h5>
                <p class="flow-text card-subtitle grey-text text-darken-2">R$: <?=$doacao_atual->meta?></p>
                <?php
                $ano = $doacao_atual->data[0].$doacao_atual->data[1].$doacao_atual->data[2].$doacao_atual->data[3];
                $mes = $doacao_atual->data[5].$doacao_atual->data[6];
                $dia = $doacao_atual->data[8].$doacao_atual->data[9];
                ?>
                <h5>Data Limite:</h5>
                <p class="flow-text card-subtitle grey-text text-darken-2"><?=$dia?>/<?=$mes?>/<?=$ano?></p>

                <?php
                if(Eh_Admin()){
                ?>
                    <h4 class="flow-text card-subtitle grey-text text-darken-2">Esperando Aprovação</h4>
                <?php
                }
                else{
                ?>
                    <h5>Arrecadado:</h5>
                    <p class="flow-text card-subtitle grey-text text-darken-2">R$: <?=$doacao_atual->valor_acumulado?></p>
                <?php
                }
                ?>

                <form action="../usuario/doar.php" method="post">
                    <input type="hidden" name="id" value=<?=$doacao_atual->id?>>
                    <input type="submit" class="btn btn-default botao" name="Verificar" value="Doar">
                </form>
            </div>
        </div>
    </div>
</main>
</body>
<?php include '../utils/footer.inc' ?>
</html>