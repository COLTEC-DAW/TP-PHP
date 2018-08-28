<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Brechó</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/meusProdutos.css" rel="stylesheet">
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

                <li class="nav-item"><a class="nav-link" href="/"><?php bemvindo(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="../paginas/cadastrarProdutos.php"><?php anunciar(); ?></a></li>
                <li class="nav-item active"><a class="nav-link" href="#"><?php meusprodutos(); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="../php/logoff.php"><?php sair(); ?></a></li>
            
            </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Categorias -->
            <div class="col-lg-2"></div>

            <div class="col-lg-8">
                <h1>Meus Produtos</h1>
                <!-- Listar Produtos -->
                <div class="row">
                    <?php include('../php/meusProdutos.php'); ?>
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
    <script src="../bootstrap/jquery.min.js"></script>
	<script src="../bootstrap/bootstrap.min.js"></script>
	<script src="../bootstrap/popper.min.js"></script>

</body>
</html>