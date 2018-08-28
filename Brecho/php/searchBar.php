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

    //Pegar o que o usuario digitou
    //htmlspecialchars - remover os caracteres especiais para evitar o code injection
    $texto = htmlspecialchars($_GET['pesquisar']);

    //Se ele nao digitou nada, redireciona para a pagina inicial
    if(empty($texto)){
        header('location:../index.php');
    }
    else{
        $sql = "SELECT ID, Nome, Preco, Descricao, Foto FROM produtos WHERE Nome LIKE '%$texto%' $ordernarPor";
        $result = $conn->query($sql);
        //Verifica se achou algum resultado
        if ($result->num_rows > 0) {
            //Listar resultados
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
                //Mostrar produto
                echo "
                    <div class='col-lg-4 col-md-6 mb-4'>
                        <div class='card h-100'>
                            <a href='detalhesProduto.php?produto=".$row['ID']."'><img class='card-img-top' src='$escolherImagem' alt=''></a>
                            <div class='card-body'>
                                <h4 class='card-title'>
                                    <a href='detalhesProduto.php?produto=".$row['ID']."'>".$row["Nome"]."</a>
                                </h4>
                                <h5>$".$row["Preco"]."</h5>
                                <p class='card-text'>".$row["Descricao"]."</p>
                            </div>
                        </div>
                    </div>
                ";

            }

        }        
        //Se nao achou nenhum resultado
        else{
            echo "Não achamos esse produto. Tente pesquisar novamente!<br>";
        }

    }

    //Encerra a conexao com o DB
    $conn->close()
?>