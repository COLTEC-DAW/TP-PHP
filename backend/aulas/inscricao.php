<?php
    require '../utils/basics.php';

    session_start();

    $obj = json_decode(file_get_contents("php://input"));

    $user = $obj->user;
    $aula = $obj->aula;

    $conexao = conecta();
   
   $query0 = "SELECT * FROM aula_user WHERE id_user = '$user' and id_aula = '$aula";

    $select0 = mysqli_query($conexao, $query0);

    if(mysqli_num_rows($select0) > 0){
        echo "Você ja ta cadastrado nessa aula";
    } else {     
        $query1 = "SELECT * FROM aula WHERE id = '$aula'";

        $select = mysqli_query($conexao, $query1);

        if(mysqli_num_rows($select) > 0){
            
            //Capacidade da aula
            $capacidade = 1;
            while($row = mysqli_fetch_assoc($select)){
                $capacidade = $row['capacidade'];
            }
            if($capacidade == 0){
                echo "0";
            } else {
                //Coloca o meliante na aula
                $capacidade = $capacidade - 1;
                
                $query = "INSERT INTO aula_user (id_user, id_aula) VALUES ('$user', '$aula')";

                $insert = mysqli_query($conexao, $query);

                if(!$insert){
                    echo "0";
                } else {
                    //Atualiza a capacidade da aula

                    $query2 = "UPDATE aula SET capacidade=$capacidade WHERE id='$aula'";

                    $insert2 = mysqli_query($conexao, $query2);

                    if($insert2){
                        echo "1";
                    } else {
                        echo "0";
                    }
                }
            }
        } else {
            echo "0";
        }               
    }
    
    desconecta($conexao);
?>