<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/email/phpmail/PHPMailerAutoload.php';

    function sendEmail($email, $id_email_conf, $nome){
        $mail = new PHPMailer;
       // $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        
        $mail->Username = 'lukvailox@gmail.com';
        $mail->Password = '34960550.';
        $mail->From = 'lukvailox@gmail.com';
        $mail->FromName = 'Help.me';
        $mail->addAddress($email,"Nome do cara");
        $mail->isHTML(true);
        $link = 'https://help-me-daw.herokuapp.com/email/verifica_email.php?id_email='.$id_email_conf;
        $mail->Subject = 'Valide sua conta';
        $mail->Body    = "<h1>Teste</h1>
                        <h2>$nome</h2>
                        <a href='$link'>Verifique sua conta.</a>";

        //$mail->Body    = file_get_contents(HTMLEMAILPATH);

        $result = $mail->send(); 
        if(!$result)
            return 'Mailer Error: ' . $mail->ErrorInfo . "\n";
        else 
            return 'done';
    }

    ob_start(); // Initiate the output buffer

    require "class_user.inc";
    require "../utils/functions.php";
    //require "../email/manda_email.php";
    session_start();

    $login = $_POST["nome"];
    $senha = $_POST["senha"];
    $nome = $_POST["name"];
    $email = $_POST["email"];

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


            $json[] = array('login'=>$login, 'email'=>$email, 'id_email_conf'=>$id_email_conf, 'verificado'=>0);
            $dados_json = json_encode($json, JSON_PRETTY_PRINT);
            $arquivo = fopen("../email/emails_verificados.json", "w");
            fwrite($arquivo, $dados_json);
            fclose($arquivo);

            $retorno = sendEmail($email, $id_email_conf, $login);
            echo "<br>".$retorno;
            $redirect = "../index.php";
            //header("location:$redirect");
        }
    }
    else
        Armazena_Erro('admin', "cadastro.php");
?>
