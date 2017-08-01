<?php
    ob_start();
    require "classes.php";

    /*
    Precisamos começar a utilizar o nome usuário como variável pra
    passar como mestre de mesa
    */

    $nome = $_POST["nomeMesa"];
    $endereco = $_POST["enderecoMesa"];
    $genero = $_POST["generoMesa"];
    $sistema = $_POST["sistemaMesa"];
    $sinopse = $_POST["sinopseMesa"];
    $privacidade = $_POST["privacidadeMesa"];

    $todasAsMesas = pegaJson("DB/dbMesas.json");
    //$novaMesa = new Mesa($nome, $privacidade, "Shoveler", $endereco, $sinopse, $genero, $sistema);

    var_dump($privacidade);
    /*array_push($todasAsMesas, $novaMesa);
    $arquivo = fopen("DB/dbMesas.json", "w");
    fwrite($arquivo, json_encode($todasAsMesas, JSON_PRETTY_PRINT));
    fclose($arquivo);
    header("location: index.php");*/
?>