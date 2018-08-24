<?php
    //Iniciar a sessao
    session_start();

    //Criar conexao com Mysql
    include('conexaoMysql.php');
    //Pegar o id do produto enviado por get no arquivo produtos.php
    $idProduto = $_GET['produto'];
    
    //Selecionar os dados do produto de acordo com o id dele
    $sql = "SELECT UsuarioID, Nome, Preco, Foto FROM produtos WHERE ID = '$idProduto'";

    //Mostrar os dados do produto de acordo com o seu id
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row["Nome"]. " - Preco: " . $row["Preco"]. " - Foto: " . $row["Foto"];
    
    //Verifica se o usuario esta logado
    if (isset($_SESSION['ID'])) {
        //Verificar se o usuario eh o dono do produto (ele que criou) para poder editar/deletar OU se o usuario eh admin, pois admin pode deletar o produto de todo mundo
        if ($_SESSION['ID'] == $row["UsuarioID"] || $_SESSION['Admin'] == 1) {
            //Botao excluir produto
            echo '
                <form method="POST" action="../php/excluirProduto.php?produto='.$idProduto.'">
                    <input type="hidden" name="name" value="">
                    <input type="submit" name="submit" value="Delete">
                </form>
            ';
            
            //Botao editar produto
            echo '
                <!-- enviar o id do produto para saber qual produto deve ser editado -->
                <form method="POST" action="paginaEditarProduto.php?produto='.$idProduto.'">
                    <input type="hidden" name="name" value="">
                    <input type="submit" name="submit" value="Editar">
                </form>
            ';
        }
    }

    //Encerrar a conexao
    $conn->close();
?>