<!-- Declaração das classes mesa e usuário -->
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
} ?>

<?php
class Notificacao {
    var $id;
    var $tipo; //1 para convites, 2 para mudanças
    var $nomeDestinatario;
    var $IdRemetente;
    var $NomeRemetente;
    var $IdMesa;
    var $NomeMesa;

    function __construct($tipo, $ND, $IdR, $NR, $IdM, $NM){
        $this->$id = $this->NotificacaoGetNewId();
        $this->tipo = $tipo;
        $this->nomeDestinatario = $ND;
        $this->IdRemetente = $IdR;
        $this->NomeRemetente = $NR;
        $this->IdMesa = $IdM;
        $this->NomeMesa = $NM;
    }
    
    function NotificacaoGetNewId(){
        $meta = pegaJson("DB/numerosDB.json");
        $meta->numeroNotificacoes++;
        $arquivo = fopen("DB/numerosDB.json", "w");
        fwrite($arquivo, json_encode($meta, JSON_PRETTY_PRINT));
        fclose($arquivo);
        return $meta->numeroMesas;
    }
}
?>

<?php
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