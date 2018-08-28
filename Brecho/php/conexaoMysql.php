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
        die("Conexao com banco de dados falhou: " . $conn->connect_error);
    }
?>