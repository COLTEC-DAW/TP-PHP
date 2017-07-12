<?php
    ob_start(); // Initiate the output buffer
    require 'class_user.inc';
    session_start();


    $valor = $_POST['valor'];
    $usuario = $_SESSION['user'];
/*
        ESCRITA
*/
    if($valor < 0){
        $_SESSION['error'] = "valor_negativo";
        $redirect = "carteira.php";
        header("location:$redirect");
    }
    else if($valor == 0){
        $_SESSION['error'] = "zero";
        $redirect = "carteira.php";
        header("location:$redirect");   
    }
    else{
        $jsonString = file_get_contents('users.json');
        $data = json_decode($jsonString, true);

        foreach ($data as $key => $entry) {
            if ($entry['login']==$usuario->login) {
                $data[$key]['carteira'] += $valor;
                $usuario->carteira+=$valor;
                $_SESSION['user'] = $usuario;
            }
        }


        $dados_json = json_encode($data, JSON_PRETTY_PRINT);
        $arquivo = fopen("users.json", "w");
        fwrite($arquivo, $dados_json);
        fclose($arquivo);


        $redirect = "index.php";
        header("location:$redirect");
    }
?>