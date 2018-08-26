<?php
    //Iniciar a sessao
    session_start();

    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //Pegar os dados digitados pelo usuario na tela cadastrarProdutos.php
    //htmlspecialchars - remover os caracteres especiais para evitar o code injection
    $nomeProduto = htmlspecialchars($_POST["nomeProduto"]);
    $preco = htmlspecialchars($_POST["preco"]);
    $descricao = htmlspecialchars($_POST["descricao"]);
    $categoria = htmlspecialchars($_POST["categoria"]);
    $usuarioID = htmlspecialchars($_SESSION['ID']); //Pegar o ID do usuario da sessao

    //Verifica se ele digitou todos os dados
    if ($nomeProduto != "" && $preco != "" && $descricao != "" && $categoria != ""){
        //Inserir os dados digitados pelo usuario no DB
        $sql = "INSERT INTO `produtos` (UsuarioID, Nome, Preco, descricao, Categoria)
        VALUES ('$usuarioID','$nomeProduto', '$preco', '$descricao', '$categoria')";
        //Checar se os dados foram inseridos corretamente
        if ($conn->query($sql) === TRUE) {
            //Redireciona para ver os seus produtos
            header('location:../paginas/meusProdutos.php');
            
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        //Inserir as fotos no Banco de dados 
        $idProduto = $conn->insert_id; //Id do produto eh o ultimo id inserido
        //Enviar todas as imagens para o banco de dados (5 no maximo)
        for($cont = 1; $cont <= 5; $cont++) {
            $imagem[$cont] = $_FILES['foto'.$cont]['tmp_name'];
            $tamanho[$cont] = $_FILES['foto'.$cont]['size'];
            $tipo[$cont] = $_FILES['foto'.$cont]['type'];
            
            //Se houver imagem, tentar inserir no banco de dados
            if ($imagem[$cont] != NULL) {
                $fp = fopen($imagem[$cont], "rb");
                $conteudo[$cont] = fread($fp, $tamanho[$cont]);
                $conteudo[$cont] = addslashes($conteudo[$cont]);
                fclose($fp);

                $queryInsercao = "INSERT INTO fotos (ProdutoID, imagem, tipo, numDaFoto) VALUES ('$idProduto','$conteudo[$cont]','$tipo[$cont]', '$cont')";

                //Se houver erro, mostrar qual o erro
                if ($conn->query($queryInsercao) !== TRUE) {
                    echo "Error: " . $queryInsercao . "<br>" . $conn->error;
                }
            }
        }
    }
    //Se ele nao digitou todos os campos
    else{
        //Redireciona para a pagina novamente
        header('location:../paginas/cadastrarProdutos.php');
    }
    
    //Encerra a conexao com o DB
    $conn->close();
?>