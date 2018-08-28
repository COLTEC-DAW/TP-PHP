<?php 
    //Se o usuario nao estiver logado
	if (!isset($_SESSION['ID']) ||(trim ($_SESSION['ID']) == '')) {

        //se nao estiver logado, sumir 'com meus produtos', 'sair', 'anunciar' 
        function bemvindo() {echo "";};
        function anunciar() {echo "";};
        function meusprodutos() {echo "";};
        function sair() {echo "";};

        //Mensagem quer anunciar?
        function mensagem() {
            echo "Quer anunciar?";
        }
        function login() {
            echo "Faça Login";
        }
        function cadastrar() {
            echo "Cadastre-se";
        }
        // <a href='paginas/login.php'>Faça login</a>
        // <a href='paginas/criarConta.php'>Crie uma conta</a>

    }
    //Se o usuario estiver logado
    else {
        //se estiver logado, sumir  com as mensagens para fazer login, cadastrar
        function mensagem() {echo "";};
        function login() {echo "";};
        function cadastrar() {echo "";};

        function bemvindo() {
            include('conexaoMysql.php'); //Criar conexao com Mysql
            $sql = "select * from usuario where ID='".$_SESSION['ID']."'"; //Pegar as informacoes do usuario
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "Bem vindo: " .$row["Nome"];
            $conn->close(); //Encerrar a conexao
        }
        function anunciar() {
            echo "Anunciar";
        }
        function meusprodutos() {
            echo "Meus Produtos";
        }
        function sair() {
            echo "Sair";
        }
    }
?>