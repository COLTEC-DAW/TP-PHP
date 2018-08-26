<?php 
    session_start(); 
    include('../php/detalhesProduto.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link href="../css/detalhesProduto.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
    <!-- Incluir php para pegar os dados do usuario (nome, se ele esta logado etc) -->
    <?php include('../php/mensagemBemVindoUsuario.php');?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a id="iconeHome" href="/"><img src="../res/home.png" width="52" height="52"/></a>
        <div class="container">

            <!-- Search Bar -->
            <form class="form-inline my-2 my-lg-0" action="../paginas/searchBar.php" method="GET">
                <input class="form-control mr-2" type="text" name="pesquisar" placeholder="Pesquisar">
                <input class="iconeProcurar" type="image" src="../res/search.png" alt="Submit">
            </form>

            <!-- Botao menu (para dispositivos moveis) -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <!-- Quando o usuario estiver deslogado -->
                <li class="nav-item active"><a class="nav-link" href="#!"><?php mensagem(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="login.php"><?php login(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="criarConta.php"><?php cadastrar(); ?></a></li>

                <!-- Quando o usuario estiver logado -->
                <li class="nav-item active"><a class="nav-link" href="#"><?php bemvindo(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="cadastrarProdutos.php"><?php anunciar(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="meusProdutos.php"><?php meusprodutos(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="../php/logoff.php"><?php sair(); ?></a></li>
            
            </ul>
            </div>
        </div>
    </nav>


    <!-- Detalhes do produto -->
    <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
                    <div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <div class="image tab-pane active" id="pic-1"><img src="<?php mostrarFotos(1);?>" /></div>
						  <div class="image tab-pane" id="pic-2"><img src="<?php mostrarFotos(2);?>" /></div>
						  <div class="image tab-pane" id="pic-3"><img src="<?php mostrarFotos(3);?>" /></div>
						  <div class="image tab-pane" id="pic-4"><img src="<?php mostrarFotos(4);?>" /></div>
						  <div class="image tab-pane" id="pic-5"><img src="<?php mostrarFotos(5);?>" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php mostrarFotos(1);?>" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="<?php mostrarFotos(2);?>" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="<?php mostrarFotos(3);?>" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="<?php mostrarFotos(4);?>" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="<?php mostrarFotos(5);?>" /></a></li>
						</ul>
						
					</div>

                    <!-- Dados do produto -->
					<div class="col-md-6">
						<h3><?php mostrarDados('Nome');?></h3>
						<p><?php mostrarDados('Descricao');?></p>
                        <h4>R$: <span><?php mostrarDados('Preco');?></span></h4><br>
                        <h4>Quer comprar?</h4>
                        <p>Vendedor: <?php mostrarDadosVendedor('Nome');?> </p>
                        <p>Email: <?php mostrarDadosVendedor('Email');?> </p>
                        <p>Telefone: <?php mostrarDadosVendedor('Telefone');?> </p>
                        <!-- Botao de excluir e editar (somente admin e quem cadastrou o produto) -->
                        <?php escluirEditar();?>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript -->
    <script src="../bootstrap/jquery.min.js"></script>
	<script src="../bootstrap/bootstrap.min.js"></script>
	<script src="../bootstrap/popper.min.js"></script>
    
</body>
</html>