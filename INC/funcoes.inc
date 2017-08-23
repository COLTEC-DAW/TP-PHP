<?php
//Funções para manipular e exibir conjuntos de mesas e jogadores

function pegaJson ($db){
    //$db TEM que ser a string com o nome do arquivo json
    $arquivo = fopen($db, "r");
    $json = "";
    while(!feof($arquivo)) $json .= fgets($arquivo);
    fclose($arquivo);
    $elementos = json_decode($json);
    return $elementos;
}

function tiraDoVetor($vetor, $indesejado){
    //Tira de um vetor todos os elementos com o valor $indesejado e retorna um array novo sem espaços vazios
    $novoVetor = [];
    foreach ($vetor as $item) 
        if ($item != $indesejado)
            array_push($novoVetor, $item);
    return $novoVetor;
}

function userRefresh(){
    $todosUsuarios = pegaJson("DB/dbUsuarios.json");
    foreach ($todosUsuarios as $user) //Esse bloco tem de ficar aqui para ser atualizado constantemente       
        if ($user->login == $_SESSION["login"])
            $_SESSION["user"] = $user;
}

function listaTodasMesas(){
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
    foreach ($mesa->jogadores as $cara) if ($cara == $idCara) return true;
    return false;
}

function poeNaMesa($idMesa, $idCara){ //Supoe que cara não está na mesa ainda
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    $mesinha = pegaPorId($todasAsMesas, $idMesa);
    array_push($mesinha->jogadores, $idCara);
    $db = fopen("DB/dbMesas.json", 'w');
    fwrite($db, json_encode($todasAsMesas, JSON_PRETTY_PRINT));
    fclose($db);

    $todasUsuarios = pegaJson("DB/dbUsuarios.json");
    $cara = pegaPorId($todasUsuarios, $idCara);
    array_push($cara->mesas, $idMesa);
    $db = fopen("DB/dbUsuarios.json", 'w');
    fwrite($db, json_encode($todasUsuarios, JSON_PRETTY_PRINT));
    fclose($db);
}

function saiDaMesa($idMesa, $idCara){
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    $mesinha = pegaPorId($todasAsMesas, $idMesa);
    $mesinha->jogadores = tiraDoVetor($mesinha->jogadores, $idCara);
    $db = fopen("DB/dbMesas.json", 'w');
    fwrite($db, json_encode($todasAsMesas, JSON_PRETTY_PRINT));
    fclose($db);
    
    $todosUsuarios = pegaJson("DB/dbUsuarios.json");
    $cara = pegaPorId($todosUsuarios, $idCara);
    $cara->mesas = tiraDoVetor($cara->mesas, $idMesa);
    $db = fopen("DB/dbUsuarios.json", 'w');
    fwrite($db, json_encode($todosUsuarios, JSON_PRETTY_PRINT));
    fclose($db);
}

function listaMesasUsuario(){
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    foreach ($_SESSION["user"]->mesas as $codMesa){
        $mesinha = pegaPorId($todasAsMesas, $codMesa); ?>
        <h3><?=$mesinha->nome?></h3>
        <p><strong>Endereço: </strong><?=$mesinha->endereco?></p>
        <p><strong>Sinopse: </strong><?=$mesinha->sinopse?></p>
        <form method="post" action="pgMesa.php">
            <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
            <button type="submit">Detalhes</button>
        </form> <?php
    }
}

function listaMesasUsuarioResumo(){
    $todasAsMesas = pegaJson("DB/dbMesas.json");
    foreach ($_SESSION["user"]->mesas as $codMesa){
        $mesinha = pegaPorId($todasAsMesas, $codMesa); ?>
        <p><strong><?=$mesinha->nome?></strong></p>
        <form method="post" action="pgMesa.php">
            <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
            <button type="submit">Detalhes</button>
        </form> <?php
    }
}

function bane($idMesa, $idBanido){
    echo "banindo esse vagabundo";
    var_dump($idBanido);
    saiDaMesa($idMesa, $idBanido);
    $todasAsMesas = pegaJson("DB/dbMesas.inc");
    foreach($todasAsMesas as $mesinha)
        if ($mesinha->id == $idMesa)
            array_push($mesinha->banidos, $idBanido);
}
?>