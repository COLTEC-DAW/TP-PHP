<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //Pegar o id do produto enviado por get no arquivo
    $idProduto = $_POST['produto'];

    //Pegar os dados editados pelo usuario na tela paginaEditarProduto.php
    $nomeProduto = $_POST["Nome"];
    $preco = $_POST["Preco"];
    $descricao = $_POST["Descricao"];
    $categoria = $_POST["Categoria"];

    //Editar os dados do produto
    $sql = "UPDATE `produtos` SET Nome='$nomeProduto', Preco=$preco, Descricao='$descricao', Categoria='$categoria' WHERE ID=$idProduto";

    if ($conn->query($sql) === TRUE) {
        //Redirecionar para a pagina principal
        header('location:../index.php');
    } else {
        echo "Erro ao editar o produto. Descricao do erro: " . $conn->error;
    }

    $conn->close();
?>