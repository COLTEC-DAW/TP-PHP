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
    }
    
    function mesaGetNewId(){
        $meta = pegaJson("DB/numerosDB.json");
        $meta->numeroMesas++;
        $arquivo = fopen("DB/numerosDB.json", "w");
        fwrite($arquivo, json_encode($meta, JSON_PRETTY_PRINT));
        fclose($arquivo);
        return $meta->numeroMesas;
    }
    //Construct provisório com o faker
    /*function __construct(){
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
    }*/
} ?>

<?php
class Usuario {
    var $id;
    var $nome;
    var $login;
    var $email;
    var $senha;
    var $mesas;

    function __construct($nome, $login, $email, $senha){
        $this->id = $this->usuarioGetNewId();
        $this->nome = $nome;
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
        $this->mesas = [];
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