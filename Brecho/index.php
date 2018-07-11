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

    //Botao para cadastrar novo produto
    echo "<a href=\"html/cadastrarProdutos.html\">Clique aqui para cadastrar um novo produto<a/><br>";
    
    //Mostrar os produtos cadastrados no DB
    $sql = "SELECT Nome, Preco, Foto FROM produtos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //Mostrar cada linha
        while($row = $result->fetch_assoc()) {
            echo "Nome: " . $row["Nome"]. " - Preco: " . $row["Preco"]. " - Foto: " . $row["Foto"]. "<br>";
        }
    } else {
        echo "Não há produtos cadastrados.";
    }

    //Encerra a conexao com o DB
    $conn->close();
?>