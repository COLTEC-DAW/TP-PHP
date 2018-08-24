<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //Pegar os dados digitados pelo usuario na tela produtos.html
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    //Inserir os dados digitados pelo usuario no DB
    $sql = "INSERT INTO usuario (Nome, Email, Senha)
    VALUES ('$nome', '$email', '$senha')";

    //Checar se os dados foram inseridos corretamente
    if ($conn->query($sql) === TRUE) {
        echo "Conta criada com sucesso<br>";
        //Botao para ir a tela inicial de login
        echo "<a href=\"../paginas/login.php\">Clique aqui para fazer o login<a/><br>";
        echo "<a href=\"../index.php\">Clique aqui para voltar a tela inicial<a/><br>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    //Encerra a conexao com o DB
    $conn->close();
?>