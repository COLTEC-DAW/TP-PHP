<?php
class Usuario {
    var $id;
    var $nome;
    var $email;
    var $senha;
    var $mesas;
    var $numNotificacoes;
    var $notificacoes;
    var $tags;
    var $avaliacoesPendentes;

    function __construct($nome, $login, $email, $senha){
        $this->id = $this->usuarioGetNewId();
        $this->nome = $nome;
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
        $this->mesas = [];
        $this->numNotificacoes = 0;
        $this->notificacoes = [];
        $this->tags = [];
        $this->avaliacoesPendentes = [];
    }
   
    function usuarioGetNewId(){
        $meta = pegaJson("DB/numerosDB.json");
        $meta->numeroUsuarios++;
        $arquivo = fopen("DB/numerosDB.json", "w");
        fwrite($arquivo, json_encode($meta, JSON_PRETTY_PRINT));
        fclose($arquivo);
        return $meta->numeroUsuarios;
    }
} ?>