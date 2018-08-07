<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!-- Mostrar detalhes do produto -->
    <?php include('../php/detalhesProduto.php'); ?>
    
    <!-- Pegar o id do produto -->
    <?php $idProduto = $_GET['produto']; ?>

    <!-- Botao excluir produto -->
    <!-- enviar o id do produto para saber qual produto deve ser excluido -->
    <form method="POST" action="../php/excluirProduto.php?produto=<?php echo $idProduto ?>">
        <input type="hidden" name="name" value="">
        <input type="submit" name="submit" value="Delete">
    </form>
    
    <!-- Botao editar produto -->
    <!-- enviar o id do produto para saber qual produto deve ser editado -->
    <form method="POST" action="paginaEditarProduto.php?produto=<?php echo $idProduto ?>">
        <input type="hidden" name="name" value="">
        <input type="submit" name="submit" value="Editar">
    </form>

</body>
</html>