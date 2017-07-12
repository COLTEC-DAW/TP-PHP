<?php


    function IsLogado($caminho){
        if(isset($_SESSION["user"])){
            $usuario = $_SESSION["user"];
            if($usuario->login!="admin"){
                $arquivo = file_get_contents($caminho);
                $json = json_decode($arquivo);
                foreach($json as $user){
                    if($user->login == $usuario->login && $user->senha == $usuario->senha){
                        return true;
                    }
                }
                return false;
            }
        }   
    }

    function Eh_Admin(){
        if($_SESSION['user'] == "admin")
            return true;
        else
            return false;
    }

    function Analisa_Erro($erro){
        if($erro == "ano")
            return "Ano inválido.";
        else if($erro == "mes")
            return "Mês inválido.";
        else if($erro == "dia")
            return "Dia inválido.";
        else if($erro == "igual")
            return  "Você não pode inserir a data atual.";
    }

    function Errors(){
        $resposta;
        if(isset($_SESSION['error'])){
            if($_SESSION['error']=="valido"){
                return null;
            }
            $resposta = Analisa_Erro($_SESSION['error']);
            return $resposta;
        }
        else
            return null;
    }

        
?>