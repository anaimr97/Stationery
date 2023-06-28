<?php

    require_once("config.php");
    require_once("base_dados.php"); 
    require_once("funcoes.php");
    
    existeSessao();

    if(isset($_GET["nome"]) && isset($_GET["preco"]) && isset($_GET["quantidade"])){

        if(!empty($_GET["nome"]) && !empty($_GET["preco"]) && !empty($_GET["quantidade"])){

            $nome = $_GET["nome"];
            $preco = $_GET["preco"];
            $quantidade = $_GET["quantidade"];

            if($preco > 0){

                if($quantidade >= 0){

                    $resultado = selectSQLUnico("SELECT * FROM  produtos WHERE nome='$_GET[nome]'");

                    if(empty($resultado)){
                        iduSQL("INSERT INTO produtos (nome, preco, quantidade) VALUE ('$nome', '$preco', '$quantidade')");

                        $mensagem = "SUCESSO! PRODUTO CADASTRADO";
                    }
                    else{
                        $mensagem = "ERRO! PRODUTO JÁ CADASTRADO";
                    }

                }
                else{
                    $mensagem = "ERRO! NÃO PODE CADASTRAR UM PRODUTO COM QUANTIDADE MENOR A 0";
    
                }
            }
            else{
                $mensagem = "ERRO! NÃO PODE CADASTRAR UM PRODUTO COM PREÇO MENOR OU IGUAL A 0€";
            }
        }
    }

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
                    <a class="header-link active" href="cadastrar_produto.php">Cadastrar Produto</a>
                    <a class="header-link" href="editar_produto.php">Editar Produto</a>
                    <a class="header-link" href="apagar_produto.php">Apagar Produto</a>
                    <a class="header-link" href="registo_vendas.php">Registar Vendas</a>
                    <a class="header-link saida" href="logout.php">Sair</a>                    
                </div>
            </div>
        </header>

        <main class="container">

            <div class="row">
                <div class="col-12 listar-main text-center">
                    CADASTRAR
                </div>
            </div>

            <div class="row">

                <div class="col text-center">

                    <?php if(empty($mensagem)): ?>

                        <form action="" method="get" class="form-cadastrar">

                            <label for="nome">Nome: </label>
                            <input type="text" name="nome" required="required">
                            <br>

                            <label for="preco">Preço: </label>
                            <input type="number" name="preco" min="0" step="0.01" required="required">
                            <br>

                            <label for="quantidade">Quantidade: </label>
                            <input type="number" name="quantidade" min="0" step="1" required="required">
                            <br>

                            <input class="botao cadastrar" type="submit" value="Cadastrar">

                        </form>

                    <?php else: ?>

                        <h2 class="m-0"><?= $mensagem; ?></h2>

                        <br>

                        <a href="listar_produtos.php">
                            <button class="botao mx-2">
                                Ver produtos
                            </button>
                        </a>

                        <a href="cadastrar_produto.php">
                            <button class="botao mx-2">
                                Cadastrar novo produto
                            </button>
                        </a>

                    <?php endif; ?>
                    
                    

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