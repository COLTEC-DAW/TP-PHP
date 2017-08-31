<?php

class Conexao {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            		$host = "alunos.coltec.ufmg.br";
					$user = "daw-carol-2017";
					$pass = "c@r0L";
					$banco = "daw-carol-2017";
					$tabela = "eventos";
					$instance = mysqli_connect($host, $user, $pass) or die(mysqli_error());
					mysqli_select_db($instance, $banco) or die(mysqli_error());
					
        }
        return $instance; 
    }
}
?>
