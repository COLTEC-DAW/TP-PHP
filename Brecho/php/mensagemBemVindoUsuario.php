<?php
    //Iniciar a sessao
	session_start();
 
    //Se o usuario nao estiver logado
	if (!isset($_SESSION['ID']) ||(trim ($_SESSION['ID']) == '')) {
        //Colocar o botao login - cadastrar
        echo "
            <div class='loginCadrastro'>
                <a>Quer anunciar?<a>
                <a href='paginas/login.php'>Faça login</a>
                <a>ou<a>
                <a href='paginas/criarConta.php'>Crie uma conta</a>
            </div>
        ";

	}
    else {
        //Criar conexao com Mysql
        include('conexaoMysql.php');

        //Pegar as informacoes do usuario
        $sql = "select * from usuario where ID='".$_SESSION['ID']."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if (isset($row["Nome"])) {
            echo "
                <div class='loginCadrastro'>
                    <a>Bem vindo: " .$row["Nome"]. "</a><br>
                    <a href='php/logoff.php'>Clique aqui para sair</a><br>
                    <a href='paginas/cadastrarProdutos.php'>Clique aqui para anunciar um produto</a><br>
                    <a href='php/meusProdutos.php'>Meus produtos</a>
                </div>
            ";
        }
        //Encerrar a conexao
        $conn->close();
    }
?>