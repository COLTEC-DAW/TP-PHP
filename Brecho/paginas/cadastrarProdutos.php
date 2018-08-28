<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brechó</title>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link href="../css/cadastrarProdutos.css" rel="stylesheet">
    <!-- JS -->
    <script src="../js/cadastrarProdutos.js"></script>

</head>
<body>
    <?php 
        //Iniciar a sessao
	    session_start();
        //Se o usuario nao estiver logado
        if (!isset($_SESSION['ID']) ||(trim ($_SESSION['ID']) == '')) {
            //Mandar ele para a pagina principal
            header('location:../index.php');
            exit();
        }
    ?>


    <div id="login">
        <h3 class="text-center text-white pt-5">Anuncie um produto</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="../php/cadastrarProdutos.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username" class="text-info">Título do anúncio:</label><br>
                                <input type="text" class="form-control" name="nomeProduto">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Descrição do anúncio</label><br>
                                <input type="text" class="form-control" name="descricao">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Preço:</label><br>
                                <input type="number" step="0.01" class="form-control" name="preco">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="text-info">Categoria:</label><br>
                                <select class="form-control" id="exampleFormControlSelect1" name="categoria">
                                    <option value="aulas">Aulas particulares</option>
                                    <option value="comidas">Comidas</option>
                                    <option value="eletronicos">Eletrônicos</option>
                                    <option value="materiais">Material Escolar</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="foto">
                                    <label class="text-info">Fotos:</label><br>
                                    <div class="fileUpload btn btn-secondary"><span>Upload</span>
                                        <input id="uploadBtn1" onclick="mostrarNomeFoto('1');" type="file" class="upload" name="foto1" />
                                    </div>
                                    <input id="uploadFile1" placeholder="Foto" disabled="disabled" />
                                </div>
                                <div class="foto" style="display: none">
                                    <div class="fileUpload btn btn-secondary"><span>Upload</span>
                                        <input id="uploadBtn2" onclick="mostrarNomeFoto('2');" type="file" class="upload" name="foto2" />
                                    </div>
                                    <input id="uploadFile2" placeholder="Foto" disabled="disabled" />
                                </div>
                                <div class="foto" style="display: none">
                                    <div class="fileUpload btn btn-secondary"><span>Upload</span>
                                        <input id="uploadBtn3" onclick="mostrarNomeFoto('3');" type="file" class="upload" name="foto3" />
                                    </div>
                                    <input id="uploadFile3" placeholder="Foto" disabled="disabled" />
                                </div>
                                <div class="foto" style="display: none">
                                    <div class="fileUpload btn btn-secondary"><span>Upload</span>
                                        <input id="uploadBtn4" onclick="mostrarNomeFoto('4');" type="file" class="upload" name="foto4" />
                                    </div>
                                    <input id="uploadFile4" placeholder="Foto" disabled="disabled" />
                                </div>
                                <div class="foto" style="display: none">
                                    <div class="fileUpload btn btn-secondary"><span>Upload</span>
                                        <input id="uploadBtn5" onclick="mostrarNomeFoto('5');" type="file" class="upload" name="foto5" />
                                    </div>
                                    <input id="uploadFile5" placeholder="Foto" disabled="disabled" />
                                </div>
                                <a class="botaoAdicionar" onclick="mostrarProxFoto();"><img src="../res/mais.png" width="42" height="42" border="0"></a>
                            </div>
                            <div class="form-group">
                                <br><input type="submit" value="Criar Anuncio" name="cadastrarProduto" class="btn btn-info btn-md">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="/" class="text-info">Voltar</a><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript -->
    <script src="../bootstrap/jquery.min.js"></script>
	<script src="../bootstrap/bootstrap.min.js"></script>
	<script src="../bootstrap/popper.min.js"></script>

</body>
</html>