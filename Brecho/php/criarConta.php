<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //Pegar os dados digitados pelo usuario na tela produtos.html
    //htmlspecialchars - remover os caracteres especiais para evitar o code injection
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $senha = htmlspecialchars($_POST["senha"]);
    //Verifica se ele digitou todos os dados
    if ($nome != "" && $email != "" && $telefone != "" && $senha != ""){
        // Verifica se ele digitou o email corretamente
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //Inserir os dados digitados pelo usuario no DB
            $sql = "INSERT INTO usuario (Nome, Email, Telefone, Senha)
            VALUES ('$nome', '$email', '$telefone','$senha')";

            //Checar se os dados foram inseridos corretamente
            if ($conn->query($sql) === TRUE) {
                header('location:../paginas/login.php?status=novaconta');
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        //Se o email estiver no formato incorreto, retornar com o status emailIncorreto
        else{
            header('location:../paginas/criarConta.php?status=emailIncorreto');
        }
    }
    //Senao, volta para a tela de cadastrar, com aviso de incorreto
    else{
        header('location:../paginas/criarConta.php?status=faltaDados');
    }
    
    //Encerra a conexao com o DB
    $conn->close();
?>