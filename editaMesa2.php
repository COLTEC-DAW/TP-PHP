<?php
    ob_start();
    session_start();
    require "classes.php";

    /*
    Precisamos começar a utilizar o nome usuário como variável pra
    passar como mestre de mesa
    */

    $idMesa = intval($_POST["idMesa"]);

    $nome = $_POST["nomeMesa"];
    $mestre = $_POST["nomeMestre"];
    $endereco = $_POST["enderecoMesa"];
    $genero = $_POST["generoMesa"];
    $sistema = $_POST["sistemaMesa"];
    $sinopse = $_POST["sinopseMesa"];
    $privacidade = $_POST["privacidadeMesa"];

    if($privacidade == "1"){
        $privacidade = true;
    }
    else{
        $privacidade = false;
    }

    $todasAsMesas = pegaJson("DB/dbMesas.json");
    foreach ($todasAsMesas as $mesinha) {
        if ($mesinha->id == $idMesa){
            if (strcmp($nome, "") != 0)
                $mesinha->nome = $nome;
            if (strcmp($mestre, "") != 0)
                $mesinha->mestre = $mestre;
            if (strcmp($endereco, "") != 0)
                $mesinha->endereco = $endereco;
            if (strcmp($genero, "") != 0)
                $mesinha->genero = $genero;
            if (strcmp($sistema, "") != 0)
                $mesinha->sistema = $sistema;
            if (strcmp($sinopse, "") != 0)
                $mesinha->sinopse = $sinopse;
        }
    }
    
    $arquivo = fopen("DB/dbMesas.json", "w");
    fwrite($arquivo, json_encode($todasAsMesas, JSON_PRETTY_PRINT));
    fclose($arquivo);
    header("location: home.php");
?>