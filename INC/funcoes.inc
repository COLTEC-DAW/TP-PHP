<?php
ob_start();
//session_start();
//require "classes.php";

//Funções para manipular e exibir conjuntos de mesas e jogadores

//TODA FUNÇÃO QUE TRABALHE COM UMA MESA OU JOGADOR INDIVIDUAL DEVE SER DA CLASSE RESPECTIVA
//APENAS FUNÇÕES QUE LIDEM COM CONJUNTOS DE AQUI
function listaMesas(){
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    foreach ($todasAsMesas as $mesinha) {
/*
        $mesaProvisoria = new Mesa();
        //Código provisório. Quando o faker for tirado, tudo poderá ser feito pelo construtor
        $mesaProvisoria->nome = $mesinha->nome;
        $mesaProvisoria->id = $mesinha->id;
        $mesaProvisoria->mestre = $mesinha->mestre;
        $mesaProvisoria->endereco = $mesinha->endereco;
        $mesaProvisoria->sinopse = $mesinha->sinopse;
        $mesaProvisoria->genero = $mesinha->genero;
        $mesaProvisoria->sistema = $mesinha->sistema;
        //Fim do código provisório
        
        var_dump($mesaProvisoria);
        $mesaProvisoria->mostraMesa($mesaProvisoria); ?>
*/
        ?>
        <h3><?=$mesinha->nome?></h3>
        <p><strong>Endereço: </strong><?=$mesinha->endereco?></p>
        <p><?=$mesinha->sinopse?></p>
        <form method="post" action="pgMesa.php">
            <input type="hidden" name="entra" value="<?= false ?>">
            <input type="hidden" name="sai" value="<?= false ?>">
            <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
            <input type="hidden" name="convite" value="<?= false ?>">
            <button type="submit">Detalhes</button>
        </form> <?php
    }
}
function pegaJson ($db){
    //$db TEM que ser a string com o nome do arquivo json
    $arquivo = fopen($db, "r");
    $json = "";
    while(!feof($arquivo)) $json .= fgets($arquivo);
    fclose($arquivo);
    $elementos = json_decode($json);
    return $elementos;
}

function pegaPorId($vetor, $idDesejado){
    //só funciona supondo que $vetor é um vetor de elementos saidos de um json com o elemento id
    //retorna só a primeira ocorrência. IDs duplos bugam o sistema
    for($i = 0; $i < count($vetor); $i++){
        if($vetor[$i]->id == $idDesejado) return $vetor[$i];
    }
    return null;
}

function validar($login, $senha){
    $json = pegaJson("DB/dbUsuarios.json");
    foreach ($json as $pessoa) {
        if ($pessoa->login == $login && $pessoa->senha == $senha) return true;
    }
    return false;
}
?>