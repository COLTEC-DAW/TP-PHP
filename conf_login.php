<?php
    ob_start(); // Initiate the output buffer
    session_start();
    require 'class_user.inc';
    $login = $_POST["nome"];
    $senha = $_POST["senha"];
    $permissao = 0;
/*
        LEITURA
*/

    if($login == "admin"){
        $arquivo = file_get_contents('admin.json');
        $json = json_decode($arquivo);

        foreach($json as $admin){
            if($admin->login == $login && $admin->senha == $senha){
             
                $permissao = 1;

                $login_arq = $admin->login;
                $senha_arq = $admin->senha;
                $nome_arq = $admin->nome;
                $email_arq = $admin->email;
                $usuario = new User($nome_arq, $email_arq, $login_arq, $senha_arq);
                $_SESSION["user"] = $usuario;
            }
        }
    }

    else{
        $arquivo = file_get_contents('users.json');
        $json = json_decode($arquivo);


        foreach($json as $user){
            if($user->login == $login && $user->senha == $senha){
             
                $permissao = 1;

                $login_arq = $user->login;
                $senha_arq = $user->senha;
                $nome_arq = $user->nome;
                $email_arq = $user->email;
                $carteira_arq = $user->carteira;
                $usuario = new User($nome_arq, $email_arq, $login_arq, $senha_arq, $carteira_arq);
                $_SESSION["user"] = $usuario;
            }
        }
    }

    if ($permissao == 1) {
        $redirect = "index.php";
        header("location:$redirect");
    } else {
        $_SESSION['error'] = 'invalido';
        $redirect = "login.php";
        header("location:$redirect");
    }
?>