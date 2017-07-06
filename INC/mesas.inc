<?php
session_start();
require "classes.php";

//Funções para manipular e exibir conjuntos de mesas

//TODA FUNÇÃO QUE TRABALHE COM UMA MESA INDIVIDUAL DEVE SER DA CLASSE MESA
//APENAS FUNÇÕES QUE LIDEM COM CONJUNTOS DE MESAS AQUI

function listaMesas(){
    $arquivo = fopen("DB/dbMesas.json", "r");
    $json = "";
    while(!feof($arquivo)) $json .= fgets($arquivo);
    fclose($arquivo);
    $todasAsMesas = json_decode($json);
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
            <input type="hidden" name="entra" value="false">
            <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
            <input type="hidden" name="convite" value="false">
            <button type="submit">Detalhes</button>
        </form> <?php
    }
}
?>