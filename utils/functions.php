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
        if($_SESSION['user']->login == "admin")
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
        else if($erro == "nao_imagem")
            return "Arquivo selecionado não é uma imagem.";
        else if($erro == "imagem_grande")
            return "Arquivo selecionado é muito grande.";
        else if($erro == "jpg")
            return "Apenas arquivos JPG, JPEG e PNG são permitidos.";
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

    function Armazena_Erro($erro, $caminho){
        $_SESSION['error'] = $erro;
        $redirect = $caminho;
        header("location:$redirect");
    }

        
?>