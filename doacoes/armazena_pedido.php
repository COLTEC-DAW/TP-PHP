<?php
    ob_start(); // Initiate the output buffer
    require '../doacoes/class_doacao.inc';
    require "../usuario/class_user.inc";
    session_start();

    $finalidade = $_POST["finalidade"];
    $meta = $_POST["meta"];
    $descricao = $_POST['descricao'];
    $id = mt_rand();

    $data_atual = date("d/m/Y");
    $dia_atual = $data_atual[0].$data_atual[1];
    $mes_atual = $data_atual[3].$data_atual[4];
    $ano_atual = $data_atual[6].$data_atual[7].$data_atual[8].$data_atual[9];

    $data = $_POST['data'];
    $ano_inserido = $data[0].$data[1].$data[2].$data[3];
    $mes_inserido = $data[5].$data[6];
    $dia_inserido = $data[8].$data[9];

    echo $dia_atual."/".$mes_atual."/".$ano_atual;
    echo "</br>";
    echo $dia_inserido."/".$mes_inserido."/".$ano_inserido;
    echo "</br>";


    if($ano_inserido<$ano_atual){
        $_SESSION['error'] = 'ano';
        $redirect = "pedido.php";
        header("location:$redirect");
    }
    else if($ano_inserido==$ano_atual && $mes_inserido<$mes_atual){
        $_SESSION['error'] = 'mes';
        $redirect = "pedido.php";
        header("location:$redirect");
    }
    else if($ano_inserido==$ano_atual && $mes_inserido==$mes_atual && $dia_inserido<$dia_atual){
        $_SESSION['error'] = 'dia';
        $redirect = "pedido.php";
        header("location:$redirect");
    }
    else if($ano_inserido==$ano_atual && $mes_inserido==$mes_atual && $dia_inserido==$dia_atual){
        $_SESSION['error'] = 'igual';
        $redirect = "pedido.php";
        header("location:$redirect");
    }
    else{
        $dados = file_get_contents('doacoes.json');
        $json = json_decode($dados);

        $usuario = $_SESSION["user"];
        
        $json[] = array('finalidade'=>$finalidade, 'meta'=>$meta, 'autor'=>$usuario->login, 'aprovado'=>0, 'arrecadado'=>0, 'id'=>$id, 'descricao'=>$descricao, 'data'=>$data); 


        $dados_json = json_encode($json, JSON_PRETTY_PRINT);
        $arquivo = fopen("doacoes.json", "w");
        fwrite($arquivo, $dados_json);
        fclose($arquivo);
        
        $redirect = "../index.php";
        header("location:$redirect");
    }
?>