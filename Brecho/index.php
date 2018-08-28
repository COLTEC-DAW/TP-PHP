<?php 
    session_start(); 
    include('php/funcoes.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Brechó</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link href="css/index.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
    <!-- Incluir php para pegar os dados do usuario (nome, se ele esta logado etc) -->
    <?php include('php/mensagemBemVindoUsuario.php');?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a id="iconeHome" href="#!"><img src="res/home.png" width="52" height="52"/></a>
        <div class="container">
            <!-- Search Bar -->
            <form class="form-inline my-2 my-lg-0" action="paginas/searchBar.php" method="GET">
                <input class="form-control mr-2" type="text" name="pesquisar" placeholder="Pesquisar">
                <input class="iconeProcurar" type="image" src="res/search.png" alt="Submit">
            </form>

            <!-- Botao menu (para dispositivos moveis) -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!-- Quando o usuario estiver deslogado -->
                <li class="nav-item active"><a class="nav-link" href="paginas/login.php"><?php mensagem(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="paginas/login.php"><?php login(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="paginas/criarConta.php"><?php cadastrar(); ?></a></li>

                <!-- Quando o usuario estiver logado -->
                <li class="nav-item active"><a class="nav-link" href="#"><?php bemvindo(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="paginas/cadastrarProdutos.php"><?php anunciar(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="paginas/meusProdutos.php"><?php meusprodutos(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="php/logoff.php"><?php sair(); ?></a></li>
            </ul>
            </div>
        </div>
    </nav>


    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Categorias -->
            <div class="col-lg-3">
                <h1 class="my-4">Categorias</h1>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Todos</a>
                    <a href="paginas/categoriaProduto.php?categoria=aulas" class="list-group-item">Aulas Particulares</a>
                    <a href="paginas/categoriaProduto.php?categoria=comidas" class="list-group-item">Comidas</a>
                    <a href="paginas/categoriaProduto.php?categoria=eletronicos" class="list-group-item">Eletrônicos</a>
                    <a href="paginas/categoriaProduto.php?categoria=materiais" class="list-group-item">Material Escolar</a>
                    <a href="paginas/categoriaProduto.php?categoria=outros" class="list-group-item">Outros</a>
                </div>
            </div>

            <div class="col-lg-9">
                
                <!-- Selecionar: ordernar por -->
                <div class="row">
                    <div class="col-4 col-sm-5"></div>
                    <div class="form-group row">
                        <form method="POST" action="php/listarProdutos.php">
                            <div class="form-group">
                                <select class="form-control" name="ordernarPor" onchange="javascript:location.href = '?ordernar='+this.value;">
                                    <!-- A funcao php ordernarPor retorna um 'selected', para saber em qual ordenacao esta -->
                                    <option <?php ordernarPor('ORDER BY DataHora DESC');?> value="ORDER BY DataHora DESC">Últimos Anúncios</option>
                                    <option <?php ordernarPor('ORDER BY Preco DESC');?> value="ORDER BY Preco DESC">Maior Preço</option>
                                    <option <?php ordernarPor('ORDER BY Preco');?> value="ORDER BY Preco">Menor Preço</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Listar Produtos -->
                <div class="row">
                    <?php include('php/listarProdutos.php'); ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Rodape -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Brechó Coltec 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/popper.min.js"></script>

</body>
</html>