<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');
    
    //Pegar o id do produto enviado por get no arquivo produtos.php
    $idProduto = $_GET['produto'];
    
    //Deletar o produto
    $sql = "DELETE FROM produtos WHERE ID='$idProduto'";

    if ($conn->query($sql) === TRUE) {
        echo "Produto deletado com sucesso<br>";
        echo "<a href=\"../index.php\">Clique aqui para voltar<a/><br>";
    } else {
        echo "Erro ao deletar o produto. Descricao do erro: " . $conn->error;
    }

    $conn->close();
?>