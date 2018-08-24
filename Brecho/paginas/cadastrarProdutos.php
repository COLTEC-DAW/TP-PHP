<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Brechó</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php 
        //Iniciar a sessao
	    session_start();
        //Se o usuario nao estiver logado
        if (!isset($_SESSION['ID']) ||(trim ($_SESSION['ID']) == '')) {
            //Mandar ele para a pagina principal
            header('location:../index.php');
            exit();
        }
    ?>

    <form method="POST" action="../php/cadastrarProdutos.php">
        Nome do produto:<input type="text" name="nomeProduto"><br>
        Preço:          <input type="text" name="preco"><br>
        Foto (link):    <input type="text" name="foto"><br>
        Categoria:      <select name="categoria">
                            <option disabled selected value>Nenhuma</option>
                            <option value="aulas">Aulas particulares</option>
                            <option value="comidas">Comidas</option>
                            <option value="eletronicos">Eletrônicos</option>
                            <option value="materiais">Material Escolar</option>
                            <option value="outros">Outros</option>
                        </select><br>
        <input type="submit" name="cadastrarProduto">
    </form>
    
</body>
</html>