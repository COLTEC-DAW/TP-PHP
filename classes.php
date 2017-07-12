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
    /*
    function __construct($nome, $mestre, $endereco, $sinopse, $genero, $sistema){
        $this->id = $numMesas;
        $numMesas++;
        $this->nome = $nome;
        $this->mestre = $mestre;
        $this->endereco = $endereco;
        $this->sinopse = $sinopse;
        $this->genero = $genero;
        $this->sistema = $sistema;
    }
    */
    function mesaGetNewId(){
        /*
        $arquivo = fopen("DB/numerosDB.json", "r");
        $json = "";
        while(!feof($arquivo)) $json .= fgets($arquivo);
        fclose($arquivo);
        $meta = json_decode($json);
        */
        $meta = pegaJson("DB/numerosDB.json");
        $meta->numeroMesas++;
        $arquivo = fopen("DB/numerosDB.json", "w");
        fwrite($arquivo, json_encode($meta, JSON_PRETTY_PRINT));
        fclose($arquivo);
        return $meta->numeroMesas;
    }
    //Construct provisório com o faker
    function __construct(){
        require_once 'Faker/src/autoload.php';
        $faker = Faker\Factory::create();
        $this->id = $this->mesaGetNewId();
        $this->public = TRUE;
        $this->nome = $faker->name;
        $this->mestre = $faker->name;
        $this->endereco = $faker->address;
        $this->sinopse = $faker->text;
        $this->genero = $faker->name;
        $this->sistema = $faker->name;
    }
    function mostraMesa($mesa){ //Exibição resumida da mesa: apenas nome, endereço e sinopse
        ?>
        <h3><?=$mesa->nome?></h3>
        <p><strong>Endereço: </strong><?=$mesa->endereco?></p>
        <p><?=$mesa->sinopse?></p>
        <?php
    }
/* DESNECESSÁRIO???
    function mostraMesaCompleta($mesa){
        ?> <h1><?=$mesa->nome?></h1>
        <p><strong>Mestre: </strong><?= $mesa->mestre ?></p>
        <p><strong>Sistema: </strong><?= $mesa->sistema ?></p>
        <p><strong>Gênero: </strong><?= $mesa->genero ?></p>
        <p><?= $mesa->sinopse ?></p>
        <p><strong>Endereço: </strong><?= $mesa->endereco ?></p>
        <?php listaJogadores();
    }
    */
}
class Usuario {
    var $id;
    var $nome;
    var $login;
    var $email;
    var $senha;
    var $mesas;
    function __construct($nome, $login, $email, $senha){
        $this->id = $numUsuarios;
        $numUsuarios++;
        $this->nome = $nome;
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
    }
}
?>