<?php
require "INC/funcoes.inc";
class Mesa {
    var $id;
    var $public;
    var $nome;
    var $mestre;
    var $endereco;
    var $sinopse;
    var $genero;
    var $sistema;
    var $jogadores; //Vetor dos IDs dos usuários membros da mesa
    var $banidos;
    
    function __construct($nome, $public, $mestre, $endereco, $sinopse, $genero, $sistema){
        $this->nome = $nome;
        $this->id = $this->mesaGetNewId();
        $this->public = $public;
        $this->mestre = $mestre;
        $this->endereco = $endereco;
        $this->sinopse = $sinopse;
        $this->genero = $genero;
        $this->sistema = $sistema;
        $this->jogadores = [];
        $this->banidos = [];
    }
    
    function mesaGetNewId(){
        $meta = pegaJson("DB/numerosDB.json");
        $meta->numeroMesas++;
        $arquivo = fopen("DB/numerosDB.json", "w");
        fwrite($arquivo, json_encode($meta, JSON_PRETTY_PRINT));
        fclose($arquivo);
        return $meta->numeroMesas;
    }
}

class Notificacao {
    var $tipo; //1 para convites, 2 para mudanças, 3 para mesas deletadas, 4 para kicks
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
        foreach ($todosUsuarios as $cara)
            if ($cara->id == $this->IdDestinatario){
                array_push($cara->notificacoes, $this);
                break;
            }
        $db = fopen("DB/dbUsuarios.json", 'w');
        fwrite($db, json_encode($todosUsuarios, JSON_PRETTY_PRINT));
        fclose($db);
    }
}

class Usuario {
    var $id;
    var $nome;
    var $login;
    var $email;
    var $senha;
    var $mesas;
    var $notificacoes;

    function __construct($nome, $login, $email, $senha){
        $this->id = $this->usuarioGetNewId();
        $this->nome = $nome;
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
        $this->mesas = [];
        $this->notificacoes = [];
    }
   
    function usuarioGetNewId(){
        $meta = pegaJson("DB/numerosDB.json");
        $meta->numeroUsuarios++;
        $arquivo = fopen("DB/numerosDB.json", "w");
        fwrite($arquivo, json_encode($meta, JSON_PRETTY_PRINT));
        fclose($arquivo);
        return $meta->numeroUsuarios;
    }
}
?>