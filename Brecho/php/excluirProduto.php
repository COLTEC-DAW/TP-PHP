<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');
    
    //Pegar o id do produto enviado por get no arquivo produtos.php
    $idProduto = $_GET['produto'];
    
    //Deletar as imagens do produto
    $sql = "DELETE FROM fotos WHERE ProdutoID='$idProduto'";
    if ($conn->query($sql) === TRUE) {
        //Se conseguiu deletar as fotos, entao deletar os dados do produto
        //Deletar o produto
        $sqlProduto = "DELETE FROM produtos WHERE ID='$idProduto'";

        if ($conn->query($sqlProduto) === TRUE) {
            header('location:../index.php');
        } else {
            echo "Erro ao deletar o produto. Descricao do erro: " . $conn->error;
        }
    } else {
        echo "Erro ao deletar o produto. Descricao do erro: " . $conn->error;
    }

    $conn->close();
?>