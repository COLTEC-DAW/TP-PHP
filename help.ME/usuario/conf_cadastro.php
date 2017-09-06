<?php

    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    require "../utils/functions.php";
    require "../email/manda_email.php";
    session_start();

    $login = $_POST["nome"];
    $senha = $_POST["senha"];
    $nome = $_POST["name"];
    $email = $_POST["email"];
/*
        ESCRITA
*/

    echo "cheguei";
    if($login!="admin"){


        $arquivo = file_get_contents('users.json');
        $json = json_decode($arquivo);
        $existe = 0;

        foreach($json as $user){
            if($user->login == $login){
                Armazena_Erro('existe', "cadastro.php");
                $existe = 1;
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
            setcookie("checa_cadastro",true); 
            $_COOKIE['checa_cadastro'] = true;

//Escreve no arquivo informando que o email ainda não foi verificado;

            $dados = file_get_contents('../email/emails_verificados.json');
            $json = json_decode($dados);

            $id_email_conf = mt_rand();

            echo "cheguei";

            $json[] = array('login'=>$login, 'email'=>$email, 'id_email_conf'=>$id_email_conf, 'verificado'=>0);
            $dados_json = json_encode($json, JSON_PRETTY_PRINT);
            $arquivo = fopen("../email/emails_verificados.json", "w");
            fwrite($arquivo, $dados_json);
            fclose($arquivo);

            sendEmail($email, $id_email_conf);
            $redirect = "../index.php";
            header("location:$redirect");
        }
    }
    else
        Armazena_Erro('admin', "cadastro.php");
?>