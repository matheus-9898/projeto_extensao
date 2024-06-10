<?php 
    painel::deletarProdutos();
    $catExistentes = painel::consultaCategoriasExistentes();
    $prodExistentes = painel::consultaProdutosExistentes();
    $ProdExistentesDet = painel::consultaDetalhadaProdutosExistentes();
    $histEntradas = painel::consultaHistEntradas();
    $histSaidas = painel::consultaHistSaidas();

    //entrada de produtos
    if(isset($_POST['entradaProdutos'])){
        if($_POST['produto'] != '' && $_POST['codigo'] != '' && $_POST['quantidade'] != '' && ($_POST['novaCategoria'] != '' || $_POST['categoriaExistente'] != '')){
            if($_POST['novaCategoria'] != ''){
                painel::entradaProdutos($_POST['novaCategoria']);
            }else{
                painel::entradaProdutos($_POST['categoriaExistente']);
            }

            //histEntradas
                painel::histEntradas();
        }else{
            echo "<script>alert('Entrada não registrada. Dados incompletos.');</script>";
        }
    }
    
    //saída de produtos
    if(isset($_POST['saidaProdutos'])){
        if($_POST['produto'] != '' && $_POST['quantidade'] != ''){
            painel::saidaProdutos();
            //histSaidas
            painel::histSaidas();
        }else{
            echo "<script>alert('Saída não registrada. Dados incompletos.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel | Controle de estoque</title>
    <link rel="stylesheet" href="painel/painel.css">
</head>
<body>
    <div class="fundoModal fundoModalEntrada">
        <form class="contCadEntrada" action="./" method="post">
            <span>ENTRADA DE PRODUTOS</span>
            <div>
                <label for="#produto">Nome do produto</label>
                <input type="text" id="produto" name="produto">
            </div>
            <div>
                <label for="#codigo">Código identificador</label>
                <input type="text" id="codigo" name="codigo">
            </div>
            
            <div>
                <div>
                    <label for=".categoria">Categoria</label>
                    <div class="contRadioCat">
                        <div class="radioCat">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                        </div>
                        <span>Nova categoria</span>
                    </div>
                </div>

                <input type="text" class="categoria" name="novaCategoria">
                <select name="categoriaExistente" class="categoria">
                    <option value="">Selecionar</option>
                    <?php 
                        foreach ($catExistentes as $i => $value) {
                            echo "<option value=\"$value[0]\">$value[0]</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div>
                <label for="#quantidade">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade">
            </div>
            <div class="botoes">
                <input type="submit" value="Registrar" name="entradaProdutos">
                <button class="btCancelarModal">Cancelar</button>
            </div>
        </form>
    </div>

    <div class="fundoModal fundoModalSaida">
        <form class="contCadSaida" action="./" method="post">
            <span>SAÍDA DE PRODUTOS</span>
            <div>
                <label for="">Produto</label>
                <select name="produto" id="">
                    <?php 
                        foreach ($prodExistentes as $i => $value) {
                            echo "<option value=\"$value[0]\">$value[0]</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="">Quantidade</label>
                <input type="number" name="quantidade">
            </div>
            <div class="botoes">
                <input type="submit" value="Registrar" name="saidaProdutos">
                <button class="btCancelarModal">Cancelar</button>
            </div>
        </form>
    </div>
    <header>
        <div class="centerHeader">
            <nav>
                <a href="./" title="Página inicial">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                </a>
                <div>
                    <a class="btEntrada">ENTRADA</a>
                    <a class="btSaida">SAÍDA</a>
                </div>
                <a href="./?logout" title="Sair">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="white" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                </a>
            </nav>
        </div>
    </header>
    <main>
        <div class="centerMain">
            <div class="contHistEntradas">
                <h2>Entradas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Data/Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($histEntradas as $i => $value) {
                        ?>
                            <tr>
                                <td><?= $value['produto'] ?></td>
                                <td><?= $value['quantidade'] ?></td>
                                <td><?= $value['data_hora'] ?></td>
                            </tr>   
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="contHistSaidas">
                <h2>Saídas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Data/Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($histSaidas as $i => $value) {
                        ?>
                            <tr>
                                <td><?= $value['produto'] ?></td>
                                <td><?= $value['quantidade'] ?></td>
                                <td><?= $value['data_hora'] ?></td>
                            </tr>   
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="contRelProdutos">
                <h2>Estoque</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Código identificador</th>
                            <th>Categoria</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($ProdExistentesDet as $i => $value) {
                        ?>
                            <tr>
                                <td><?= $value['nome'] ?></td>
                                <td><?= $value['codigo'] ?></td>
                                <td><?= $value['categoria'] ?></td>
                                <td><?= $value['quantidade'] ?></td>
                            </tr>   
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>