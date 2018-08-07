<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Brechó</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
</head>
<body>
    <div>
        <!-- Botao para cadastrar novo produto -->
        <h1>Cadastrar um produto</h1>
        <a href="paginas/cadastrarProdutos.html">Clique aqui para cadastrar um novo produto<a/><br>

        <!-- Botoes para selecionar a categoria -->
        <h1>Categorias</h1>
        <a href="php/listarProdutos.php?categoria=aulas">Aulas Particulares<a/><br>
        <a href="php/listarProdutos.php?categoria=comidas">Comidas<a/><br>
        <a href="php/listarProdutos.php?categoria=eletronicos">Eletrônicos<a/><br>
        <a href="php/listarProdutos.php?categoria=materiais">Material Escolar<a/><br>
        <a href="php/listarProdutos.php?categoria=outros">Outros<a/><br>

        <!-- Listar os produtos mais recentes-->
        <h1>Mais Recentes (todas categorias)</h1>
        <?php include('php/listarProdutos.php'); ?>
    </div>
</body>
</html>