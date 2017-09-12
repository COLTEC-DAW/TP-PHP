<?php
class Notificacao {
    var $tipo;  // 1 para convites
                // 2 para mudanças
                // 3 para mesas deletadas
                // 4 para kicks
                // 5 para sessoes
                // 6 para novo mestre
    var $IdDestinatario;
    var $IdRemetente;
    var $NomeRemetente;
    var $IdMesa;
    var $NomeMesa;

    function __construct($tipo, $NomeDestinatario, $IdMesa){
        $todosUsuarios = pegaJson("DB/dbUsuarios.json");
        $this->tipo = $tipo;
        $this->IdDestinatario = pegaPorNome($todosUsuarios, $NomeDestinatario)->id;
        $mesa = pegaPorId(pegaJson("DB/dbMesas.json"), $IdMesa);
        $this->IdRemetente = pegaPorNome($todosUsuarios, $mesa->mestre)->id;
        $this->NomeRemetente = $mesa->mestre;
        $this->IdMesa = $IdMesa;
        $this->NomeMesa = $mesa->nome;

        //Agora que a notificação foi construída, vamos mandá-la
        foreach ($todosUsuarios as $cara) {
            if ($cara->id == $this->IdDestinatario){
                array_push($cara->notificacoes, $this);
                $cara->numNotificacoes++;
                break;
            } 
        }
        $db = fopen("DB/dbUsuarios.json", 'w');
        fwrite($db, json_encode($todosUsuarios, JSON_PRETTY_PRINT));
        fclose($db);
    }
} ?>