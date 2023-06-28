<?php

    require_once("config.php");
    require_once("base_dados.php");
    require_once("funcoes.php");

    existeSessao();

    $produtos = selectSQL("SELECT * FROM produtos");

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Papelaria</title>

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- CSS Local -->
        <link rel="stylesheet" href="estilo.css">
    </head>

    <body>
        
        <header class="container header">

            <div class="row">
                <div class="col-12">
                    <h1 class="text-center header-titulo">PAPELARIA</h1>
                </div>
            </div>

            <div class="row ">
                <div class="col-auto mx-auto">
                    <a class="header-link" href="home.php">Home</a>
                    <a class="header-link" href="listar_produtos.php">Listar Produtos</a>
                    <a class="header-link" href="pesquisar_codigo.php">Pesquisar Código</a>
                    <a class="header-link" href="cadastrar_produto.php">Cadastrar Produto</a>
                    <a class="header-link" href="editar_produto.php">Editar Produto</a>
                    <a class="header-link active" href="apagar_produto.php">Apagar Produto</a>
                    <a class="header-link" href="registo_vendas.php">Registar Vendas</a>
                    <a class="header-link saida" href="logout.php">Sair</a>                    
                </div>
            </div>
        </header>

        <main class="container">

            <div class="row">
                <div class="col-12 listar-main text-center editar-main">
                    EDITAR
                </div>
            </div>

            <div class="row">

                <div class="col text-center">

                    <table>
                        
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>PREÇO</th>
                            <th>QUANTIDADE</th>
                            <th>APAGAR</th>
                        </tr>

                        <?php foreach($produtos as $produto): ?>
                            <tr>
                                <td><?= $produto["id"] ?></td>
                                <td><?= $produto["nome"] ?></td>
                                <td><?= number_format(floatval($produto["preco"]), 2);?>€</td>
                                <td><?= $produto["quantidade"] ?></td>
                                <td>

                                    <a href="apagar_produto_saida.php?apagar=<?= $produto["id"]; ?>">

                                        <img src="apagar-icon.png" alt="icon editar">

                                    </a>

                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                     

                </div>

            </div>
            
        </main>

        <footer class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">Ana Isabel Rocha © 2023</div>
            </div>
        </footer>


        <!-- JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>