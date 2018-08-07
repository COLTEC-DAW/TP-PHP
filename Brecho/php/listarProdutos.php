<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //Verificar se categoria eh diferente de NULL
    if (isset($_GET['categoria'])){
        //Pegar qual a categoria do produto
        $categoria = $_GET['categoria'];
        //Selecionar os dados dos produtos de uma determinada categoria
        $sql = "SELECT ID, Nome, Preco, Foto FROM produtos WHERE Categoria = '$categoria'";
    }
    //Se nao ha nenhuma categoria, a variavel categoria recebe um texto vazio
    else{
        $categoria = '';
        //Selecionar os dados de todos os produtos em ordem da data cadastrada - mais recentes
        $sql = "SELECT ID, Nome, Preco, Foto FROM produtos";
    }
    //Mostrar os produtos cadastrados no DB
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Mostrar cada produto com uma class listarProdutos para estilizacao posteriormente e com o href para ver os detalhes do produto
        while($row = $result->fetch_assoc()) {
            //Verifica se a categoria eh diferente de vazio, se sim, o href redireciona para '../paginas/detalhesProduto.php', senao o href redireciona para  'html/detalhesProduto.php'
            //href redireciona para '../paginas/detalhesProduto.php'
            if ($categoria != "") {
                echo "<div class='listarProdutos'> <a href='../paginas/detalhesProduto.php?produto=".$row['ID']."'>Nome: " .$row["Nome"]. " - ID: ".$row["ID"]." - Preco: " . $row["Preco"]. " - Foto: " . $row["Foto"]. "</a></div>";
            }
            //href redireciona para 'paginas/detalhesProduto.php'
            else{
                echo "<div class='listarProdutos'> <a href='paginas/detalhesProduto.php?produto=".$row['ID']."'>Nome: " .$row["Nome"]. " - ID: ".$row["ID"]." - Preco: " . $row["Preco"]. " - Foto: " . $row["Foto"]. "</a></div>";
            }
        }
    } else {
        echo "Não há produtos cadastrados.";
    }

    //Encerra a conexao com o DB
    $conn->close();
?>