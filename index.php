<?php

    require_once("funcoes.php");

    $form = isset($_GET["login"]);

    existeSessaoIndex();

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

        <header class="container d-flex justify-content-center align-items-center vh-100">

            <div class="row caixa-geral">

                <div class="col-12 text-uppercase text-center titulo">
                    Papelaria
                </div>

                <div class="col-12 caixao-sessao d-flex align-items-center justify-content-center flex-column">

                    <h1>Login</h1>
                    
                    <?php if($form): ?>

                        <b class="text-danger">Login Inválido</b>

                    <?php endif; ?>

                    <form action="login.php" method="POST" class="text-center">

                        <input type="text" name="login" placeholder="Usuário" required="required">

                        <br><br>

                        <input type="password" name="senha" placeholder="Senha" required="required">

                        <br><br>

                        <input class="botao" type="submit" value="Entrar">

                    </form>

                </div>
            </div>


        </header>

        <footer class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">Ana Isabel Rocha © 2023</div>
            </div>
        </footer>

        

        <!-- JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
