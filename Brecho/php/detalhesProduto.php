<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');
    //Pegar o id do produto enviado por get no arquivo produtos.php
    $idProduto = $_GET['produto'];
    
    //Selecionar os dados do produto de acordo com o id dele
    $sql = "SELECT Nome, Preco, Foto FROM produtos WHERE ID = '$idProduto'";

    //Mostrar os dados do produto de acordo com o seu id
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo $row["Nome"]. " - Preco: " . $row["Preco"]. " - Foto: " . $row["Foto"];
    }
    //Encerrar a conexao
    $conn->close();
?>