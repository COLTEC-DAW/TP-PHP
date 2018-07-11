<?php
    //Dados do mysql
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "brecho";

    //Criar conexao com DB
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Checar se a conexao falhou
    if ($conn->connect_error) {
        die("Conexao falhou: " . $conn->connect_error);
    }

    //Pegar os dados digitados pelo usuario na tela produtos.html
    $nomeProduto = $_POST["nomeProduto"];
    $preco = $_POST["preco"];
    $foto = $_POST["foto"];

    //Inserir os dados digitados pelo usuario no DB
    $sql = "INSERT INTO `produtos` (Nome, Preco, Foto)
    VALUES ('$nomeProduto', '$preco', '$foto')";

    //Checar se os dados foram inseridos corretamente
    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso<br>";
        //Botao para voltar a tela de cadastrar produtos
        echo "<a href=\"../html/cadastrarProdutos.html\">Clique aqui para cadastrar um novo produto<a/><br>";
        echo "<a href=\"../index.php\">Clique aqui para ver a lista de produtos<a/><br>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    //Encerra a conexao com o DB
    $conn->close();
?>