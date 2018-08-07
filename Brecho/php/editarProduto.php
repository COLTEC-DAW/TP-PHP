<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //Pegar o id do produto enviado por get no arquivo produtos.php
    $idProduto = $_GET['produto'];

    //Pegar os dados editados pelo usuario na tela paginaEditarProduto.php
    $nomeProduto = $_GET["Nome"];
    $preco = $_GET["Preco"];
    $foto = $_GET["Foto"];
    $categoria = $_GET["Categoria"];

    //Editar os dados do produto
    $sql = "UPDATE `produtos` SET Nome='$nomeProduto', Preco=$preco, Foto='$foto', Categoria='$categoria' WHERE ID=$idProduto";

    if ($conn->query($sql) === TRUE) {
        echo "Produto Editado com sucesso<br>";
        echo "<a href=\"../index.php\">Clique aqui para voltar<a/><br>";
    } else {
        echo "Erro ao editar o produto. Descricao do erro: " . $conn->error;
    }

    $conn->close();
?>