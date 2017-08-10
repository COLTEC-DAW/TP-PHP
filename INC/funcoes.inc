<?php
//Funções para manipular e exibir conjuntos de mesas e jogadores

//TODA FUNÇÃO QUE TRABALHE COM UMA MESA OU JOGADOR INDIVIDUAL DEVE SER DA CLASSE RESPECTIVA
//APENAS FUNÇÕES QUE LIDEM COM CONJUNTOS DE AQUI

function pegaJson ($db){
    //$db TEM que ser a string com o nome do arquivo json
    $arquivo = fopen($db, "r");
    $json = "";
    while(!feof($arquivo)) $json .= fgets($arquivo);
    fclose($arquivo);
    $elementos = json_decode($json);
    return $elementos;
}

function listaMesas(){
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    foreach ($todasAsMesas as $mesinha) { ?>
        <h3><?=$mesinha->nome?></h3>
        <p><strong>Endereço: </strong><?=$mesinha->endereco?></p>
        <p><strong>Sinopse: </strong><?=$mesinha->sinopse?></p>
        <form method="post" action="pgMesa.php">
            <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
            <button type="submit">Detalhes</button>
        </form> <?php
    }
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

function isCaraNaMesa($idMesa, $idCara){
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    $mesa = pegaPorId($todasAsMesas, $idMesa);
    foreach ($mesa->jogadores as $jogador){
        if ($jogador == $idCara) return true;
    }
    return false;
}

function poeNaMesa($idMesa, $idCara){ //Supoe que cara não está na mesa ainda
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    foreach ($todasAsMesas as $mesinha){
        if ($mesinha->id == $idMesa) {
            echo "encontrei a mesa";
            array_push($mesinha->jogadores, $idCara);
            $db = fopen("DB/dbMesas.json", 'w');
		    fwrite($db, json_encode($todasAsMesas, JSON_PRETTY_PRINT));
		    fclose($db);
            return true; //Estou usando esse return como meio de indicar sucesso e interromper a função
        }
    }
}
?>