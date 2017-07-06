<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    session_start();

    $login = $_POST["nome"];
    $senha = $_POST["senha"];
    $nome = $_POST["name"];
    $email = $_POST["email"];
/*
        ESCRITA
*/

    if($login!="admin"){


        $arquivo = file_get_contents('users.json');
        $json = json_decode($arquivo);
        $existe = 0;

        foreach($json as $user){
            if($user->login == $login){
                $existe = 1;
                $_SESSION['error'] = 'existe';
                $redirect = "cadastro.php";
                header("location:$redirect");
            }
        }

        if($existe == 0){
            $dados = file_get_contents('users.json');
            $json = json_decode($dados);


            $json[] = array('login'=>$login, 'senha'=>$senha, 'nome'=>$nome, 'email'=>$email, 'carteira'=>0);


            $dados_json = json_encode($json, JSON_PRETTY_PRINT);
            $arquivo = fopen("users.json", "w");
            fwrite($arquivo, $dados_json);
            fclose($arquivo);
            $redirect = "index.php";
            header("location:$redirect");
        }
    }
    else{
        $_SESSION['error'] = 'admin';
        $redirect = "cadastro.php";
        header("location:$redirect");
    }
    
?>