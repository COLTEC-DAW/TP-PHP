<?php 
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    // Funcao que retornar qual ordenacao esta, para colocar como 'active', ou melhor, 'selected' no
    // formulario que seleciona a ordenacao (maior preco, menor, mais recentes)
    function ordernarPor($qualOpcao) {
        if (isset($_GET['ordernar'])){
            if ($_GET['ordernar'] == $qualOpcao){
                echo "selected";
            }
        }
    }

?>