<?php
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
} ?>