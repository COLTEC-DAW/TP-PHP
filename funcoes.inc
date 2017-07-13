<?php
ob_start();
//session_start();
//require "classes.php";

//Funções para manipular e exibir conjuntos de mesas e jogadores

//TODA FUNÇÃO QUE TRABALHE COM UMA MESA OU JOGADOR INDIVIDUAL DEVE SER DA CLASSE RESPECTIVA
//APENAS FUNÇÕES QUE LIDEM COM CONJUNTOS DE AQUI
function listaMesas(){
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    return $todasAsMesas;   //retorna array com as mesas
}

function pegaJson ($db){ //$db TEM que ser a string com o nome do arquivo json
    $arquivo = fopen($db, "r");
    $json = "";
    while(!feof($arquivo)) $json .= fgets($arquivo);
    fclose($arquivo);
    $elementos = json_decode($json);
    return $elementos;
}
function pegaPorId($vetor, $idDesejado){ //só funciona supondo que $vetor é um vetor de elementos saidos de um json com o elemento id
    /*foreach ($elemento as $vetor) {
        if ($elemento->id == $idDesejado) return elemento; //retorna só a primeira ocorrência. IDs duplos bugam o sistema
    }*/
    for($i = 0; $i < count($vetor); $i++){
        if($vetor[$i]->id == $idDesejado) return $vetor[$i];
    }
    return null;
}
?>