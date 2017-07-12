<?php
    ob_start(); // Initiate the output buffer
    require "usuario/class_user.inc";
    require 'doacoes/class_doacao.inc';
    require_once 'doacoes/verifica_data.php';
    require 'utils/functions.php';
    session_start();
    verifica_data();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  	<!--Import Google Icon Font-->
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<!--Import materialize.css-->
  	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <script type="text/javascript" src="js/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>

    <nav>
        <div class="container center-align">
            <a class="brand-logo" href="index.php">TratoFeito</a>



            <?php
                if(IsLogado("usuario/users.json")){
                    $usuario = $_SESSION['user'];
                ?>
                    <ul class="left">
                        
                        <li><a href="usuario/pedido.php">Fazer Pedido</a></li>
                        <li><a href="usuario/historico_doacao.php">Histórico de Doações</a></li>
                    </ul>

                    <ul class="right">
                        <li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$usuario->nome?></a></li>
                        <li><a href="usuario/carteira.php"><i class="fa fa-money" aria-hidden="true"></i> R$:<?=$usuario->carteira?></a></li>
                        <li><a href="usuario/deslogar.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
                    </ul>
                <?php
                }
                else if($_SESSION["user"]->login=="admin"){
                ?>
                    <ul class="left">
                        <li><a href="historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
                    </ul>
                    <ul class="right">
                        <li><a href="usuario/deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                    </ul>

                <?php
                }   
                else{
                    echo $_SESSION['user'];
                ?>
                    <ul class="right">
                        <li><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span>Cadastrar</a></li>
                        <li><a href="usuario/login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                    </ul>
                <?php
                }
                ?>
        </div>
    </nav>
      
    <div class="container center-align">
		<h3 id="welcome" class="center-align">Bem Vindo(a) !</h3>
        <div class="card-panel red lighten-2">
			<p id="apresentacao" class="white-text"> Está pensando em fazer um super-projeto inovador que irá mudar o mundo, mas está sem o incentivo financeiro inicial?
			Quer comprar um caminhão de balas mas não possui dinheiro o sufuciente? Nós podemos te ajudar.
			O TratoFeito é um site de financiamento coletivo que busca apoiar e incentivar projetos por meio de doações de usuários do site. Crie já sua conta e abra um pedido de doação!
			</p>
        </div>
        <?php
            if(IsLogado("usuario/users.json")){//printa doações disponíveis
                $arquivo = file_get_contents('doacoes/doacoes.json');
                $json = json_decode($arquivo);
                if (filesize('doacoes/doacoes.json') != 0){
                    if (!empty($json)) {
					?>
					<div class="row center-align">			
					<?php
                        foreach($json as $dados){
                            $descricao = $dados->finalidade;
                            $meta = $dados->meta;
                            $autor = $dados->autor;
                            $aprovado = $dados->aprovado;
                            $arrecadado = $dados->arrecadado;
                            $id = $dados->id;

                            if($aprovado==1){// && $arrecadado<$meta
                            ?>
							<div class="card-panel doacoes col s6">
								<h3 class="conteudo truncate"><?=$descricao?></h3>
								<h5 class="conteudo">Meta: <?=$meta?></h5>
								<h5 class="conteudo">Arrecadado: <?=$arrecadado?></h5>
								<form action="doar.php" method="post">
									<input type="hidden" name="id" value=<?=$id?>>
									<input type="submit" class="btn btn-default botao" name="Verificar" value="Doar">
								</form>
								<form action="pag_doacoes.php" method="post">
									<input type="hidden" name="id" value=<?=$id?>>
									<input type="submit" class="btn btn-default botao" name="Verificar2" value="Leia mais">
								</form>
							</div>
							
                            <?php
                            }
                        }
						?>
					</div>
						<?php
                    }
                }
            }
            if(Eh_Admin()){
                $arquivo = file_get_contents('doacoes.json');
                $json = json_decode($arquivo);
                if (filesize('doacoes.json') != 0){
                    if(!empty($json)){
                        foreach($json as $dados){
                            $descricao = $dados->finalidade;
                            $meta = $dados->meta;
                            $autor = $dados->autor;
                            $aprovado = $dados->aprovado;
                            $id = $dados->id;

                            //colocar na classe e na seção.
                            $doacao_pendente = new Doacao($descricao, $meta, $autor, $aprovado, $id);
                            $_SESSION["doacao"] = $doacao_pendente;

                            if($aprovado==0){
                            ?>
                            <div class="col-sm-3 conteudo">
                                <h3 class="conteudo"><?=$descricao?></h3>
                                <h5 class="conteudo">Meta: <?=$meta?></h5>
                                <form action="pag_doacoes.php" method="post">
                                    <input type="hidden" name="id" value=<?=$id?>>
                                    <input type="submit" class="btn btn-default" name="Verificar2" value="Leia mais">
                                </form>
                                <form action="aprovar.php" method="post">
                                    <input type="hidden" name="controle" value=<?=$id?>>            
                                    <input type="submit" class="btn btn-default" name="Verificar" value="Aceitar">
                                </form>
                                <form action="reprovar.php" method="post">
                                    <input type="hidden" name="controle" value=<?=$id?>>
                                    <input type="submit" class="btn btn-default" name="Verificar" value="Recusar">
                                </form>

                            </div>
                            <?php
                            }
                        }
                    }
                }
            }
        ?>  
    </div>
</body>
</html>