<?php
    //Iniciar a sessao
    session_start();

    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //pegar o ID do usuario
    $usuarioID = $_SESSION["ID"];

    //Pegar os meus produtos
    $sql = "SELECT ID, Nome, Preco, Foto FROM produtos WHERE UsuarioID = '$usuarioID'";

    //Mostrar os produtos cadastrados no DB
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Mostrar cada produto com uma class listarProdutos para estilizacao posteriormente e com o href para ver os detalhes do produto
        while($row = $result->fetch_assoc()) {
            echo "<div class='listarProdutos'> <a href='../paginas/detalhesProduto.php?produto=".$row['ID']."'>Nome: " .$row["Nome"]. " - Preco: " . $row["Preco"]. " - Foto: " . $row["Foto"]. "</a></div>";
        }
    } else {
        echo "Não há produtos cadastrados por você.";
    }

    //Encerra a conexao com o DB
    $conn->close();
?>