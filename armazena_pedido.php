<?php
    ob_start(); // Initiate the output buffer
    require 'class_doacao.inc';
    require "class_user.inc";
    session_start();

    $finalidade = $_POST["finalidade"];
    $meta = $_POST["meta"];
    $descricao = $_POST['descricao'];
    $id = mt_rand();

/*
        ESCRITA
*/

    $dados = file_get_contents('doacoes.json');
    $json = json_decode($dados);

    $usuario = $_SESSION["user"];
    
    $json[] = array('finalidade'=>$finalidade, 'meta'=>$meta, 'autor'=>$usuario->login, 'aprovado'=>0, 'arrecadado'=>0, 'id'=>$id, 'descricao'=>$descricao); 


    $dados_json = json_encode($json, JSON_PRETTY_PRINT);
    $arquivo = fopen("doacoes.json", "w");
    fwrite($arquivo, $dados_json);
    fclose($arquivo);
    
    $redirect = "index.php";
    header("location:$redirect");
?>