<?php

require_once("config.php");
require_once("base_dados.php");
require_once("funcoes.php");

existeSessao();

$produto_especifico;
$form = false;

if(isset($_GET["editar"])){

    $form = isset($_GET["editar"]) && isset($_GET["nome"]) && isset($_GET["preco"]) && isset($_GET["quantidade"]);

    if($form){

        $preco = intval($_GET["preco"]);
        $quantidade = intval($_GET["quantidade"]);

        if($preco > 0){

            if($quantidade >= 0){

                iduSQL("UPDATE produtos SET nome='$_GET[nome]',preco='$preco',quantidade='$_GET[quantidade]' WHERE id='$_GET[editar]'");

                $mensagem = "SUCESSO! PRODUTO EDITADO";

            }
            else{
                $mensagem = "ERRO! NÃO PODE EDITAR UM PRODUTO COM QUANTIDADE MENOR A 0";

            }

        }
        else{
            $mensagem = "ERRO! NÃO PODE EDITAR UM PRODUTO COM PREÇO MENOR OU IGUAL A 0€";
        }

        
    }
    else{
        $produto_especifico = selectSQLUnico("SELECT * FROM produtos WHERE id='$_GET[editar]'");
        if(empty($produto_especifico)){
            header("Location: editar_produto.php");
            exit();
        }
    }

}
else{
    header("Location: editar_produto.php");
    exit();
}

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
                    <a class="header-link active" href="editar_produto.php">Editar Produto</a>
                    <a class="header-link" href="apagar_produto.php">Apagar Produto</a>
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

                    <?php if(!$form):?>

                        <form action="">

                            <input type="hidden" name="editar" value="<?= $produto_especifico["id"]; ?>">

                            <label for="nome">Nome:</label>
                            <input type="text" name="nome"  required="required" value="<?= $produto_especifico["nome"]; ?>">
                            <br>

                            <label for="preco">Preço:</label>
                            <input type="number" name="preco" min="0" step="0.01" required="required" value="<?= $produto_especifico["preco"]; ?>">
                            <br>

                            <label for="quantidade">Quantidade:</label>
                            <input type="number" name="quantidade" required="required" value="<?= $produto_especifico["quantidade"]; ?>">
                            <br>

                            <input class="botao cadastrar" type="submit" value="Editar">

                        </form>

                    <?php else: ?>

                        <h2><?=$mensagem;?></h2>

                        <br>

                        <a href="listar_produtos.php">
                            <button class="botao mx-2">
                                Ver produtos
                            </button>
                        </a>

                        <a href="editar_produto.php">
                            <button class="botao mx-2">
                                Editar novo produto
                            </button>
                        </a>

                    <?php endif;?>
                     

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