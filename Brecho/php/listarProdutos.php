<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //Pegar qual a ordenacao do produto
    //Se existir alguma ordenacao, pegar ele, senao, a ordenacao padrao eh 'Ultimos produtos'
    if(isset($_GET['ordernar'])){
        $ordernarPor = $_GET['ordernar'];
    }
    //Se nao ha ordenacao, mostrar os produtos mais recentes
    else{
        $ordernarPor = "ORDER BY DataHora DESC";
    }

    //Verificar se categoria eh diferente de NULL
    if (isset($_GET['categoria'])){
        //Pegar qual a categoria do produto
        $categoria = $_GET['categoria'];
        //Selecionar os dados dos produtos de uma determinada categoria
        $sql = "SELECT ID, Nome, Descricao, Preco, Foto FROM produtos WHERE Categoria = '$categoria' $ordernarPor";
    }
    //Se nao ha nenhuma categoria, a variavel categoria recebe um texto vazio
    else{
        $categoria = '';
        //Selecionar os dados de todos os produtos em ordem da data cadastrada - mais recentes
        $sql = "SELECT ID, Nome, Descricao, Preco, Foto FROM produtos $ordernarPor";
    }
    //Mostrar os produtos cadastrados no DB
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Mostrar cada produto com o href para ver os detalhes do produto
        while($row = $result->fetch_assoc()) {

            //Pegar a foto principal
            $sqlImagem = "SELECT imagem, tipo FROM fotos WHERE numDaFoto = 1 AND ProdutoID =".$row['ID'];
            $resultImagem = $conn->query($sqlImagem);
            $rowImagem = $resultImagem->fetch_array();
            //Se nao houver foto, mostrar a padrao
            if($rowImagem['imagem'] == NULL) {
                $rowImagem['tipo'] = 'image/png';
                $rowImagem['imagem'] = '../res/imagemdefault.png';
                $escolherImagem = $rowImagem['imagem'];
            }
            //Se houver foto principal, entao mostrar
            else {
                $escolherImagem = 'data:'.$rowImagem['tipo'].';base64,'.base64_encode( $rowImagem['imagem']);
            }


            //Verifica se a categoria eh diferente de vazio, se sim, o href redireciona para '../paginas/detalhesProduto.php', senao o href redireciona para  'html/detalhesProduto.php'
            //href redireciona para '../paginas/detalhesProduto.php'
            if ($categoria != "") {
                $paraOndeRedirecionar = '../paginas/detalhesProduto.php';
            }
            //href redireciona para 'paginas/detalhesProduto.php'
            else {
                $paraOndeRedirecionar = 'paginas/detalhesProduto.php';
            }
            //Mostrar produto
            echo "
                <div class='col-lg-4 col-md-6 mb-4'>
                    <div class='card h-100'>
                        <a href='".$paraOndeRedirecionar."?produto=".$row['ID']."'><img class='card-img-top' src='$escolherImagem' alt=''></a>
                        <div class='card-body'>
                            <h4 class='card-title'>
                                <a href='".$paraOndeRedirecionar."?produto=".$row['ID']."'>".$row["Nome"]."</a>
                            </h4>
                            <h5>$".$row["Preco"]."</h5>
                            <p class='card-text'>".$row["Descricao"]."</p>
                        </div>
                    </div>
                </div>
            ";
        }
    } else {
        echo "Não há produtos cadastrados.";
    }

    //Encerra a conexao com o DB
    $conn->close();
?>