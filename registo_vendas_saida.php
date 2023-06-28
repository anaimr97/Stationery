

<?php

    require_once("config.php");
    require_once("base_dados.php"); 
    require_once("funcoes.php");
    
    existeSessao();

    $form = false;

    if(isset($_GET["vender"])){

        $id = $_GET["vender"];

        $produto = selectSQLUnico("SELECT * FROM produtos WHERE id='$id'");

        if(!empty($produto)){

            $quantidade_em_stock = intval($produto["quantidade"]);

            $form = isset($_GET["qt-venda"]);

            if($form){

                $quantidade_a_vender = intval($_GET["qt-venda"]);

                echo $quantidade_a_vender;

                if($quantidade_a_vender > 0){

                    if($quantidade_em_stock >= $quantidade_a_vender){

                        $quantidade_em_stock = $quantidade_em_stock - $quantidade_a_vender;

                        
                        iduSQL("UPDATE produtos SET nome='$produto[nome]',preco='$produto[preco]',quantidade='$quantidade_em_stock' WHERE id='$produto[id]'");


                        $mensagem = "SUCESSO PRODUTO VENDIDO!";
                    }
                    else{

                        $mensagem = "ERRO! QUANTIDADE EM STOCK INSUFICIENTE!";
                    }

                }
                else{
                    
                    $mensagem = "ERRO! PRECISA VENDER PELO MENOS 1 PRODUTO!";

                }

                
            }
        }
        else{
            header("Location: registo_vendas.php");
            exit();
        }     


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
                    <a class="header-link" href="editar_produto.php">Editar Produto</a>
                    <a class="header-link" href="apagar_produto.php">Apagar Produto</a>
                    <a class="header-link active" href="registo_vendas.php">Registar Vendas</a>
                    <a class="header-link saida" href="logout.php">Sair</a>                    
                </div>
            </div>
        </header>

        <main class="container">

            <div class="row">
                <div class="col-12 listar-main text-center editar-main">
                    VENDER
                </div>
            </div>

            <div class="row">

                <div class="col text-center">

                    <?php if(!$form):?>

                        <table>
                        
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>PREÇO</th>
                                <th>QUANTIDADE</th>
                            </tr>

                            <tr>
                                <td><?= $produto["id"] ?></td>
                                <td><?= $produto["nome"] ?></td>
                                <td><?= number_format(floatval($produto["preco"]), 2);?>€</td>
                                <td><?= $produto["quantidade"] ?></td>
                            </tr>

                        </table>  

                        <br>

                        <form action="">

                            <input type="hidden" name="vender" value="<?= $produto["id"]; ?>">

                            <label for="preco">Quantidade a vender:</label>
                            <input type="number" name="qt-venda" min="0" step="1" required="required">
                            <br>

                            <input class="botao cadastrar" type="submit" value="Vender">

                        </form>

                    <?php else: ?>

                        <h2><?= $mensagem; ?></h2>

                        <br>

                        <a href="listar_produtos.php">
                            <button class="botao mx-2">
                                Ver produtos
                            </button>
                        </a>

                        <a href="registo_vendas.php">
                            <button class="botao mx-2">
                                Vender novo produto
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