<?php

require_once("config.php");
require_once("base_dados.php");
require_once("funcoes.php");

$form = isset($_POST["login"]) && isset($_POST["senha"]);

if($form){
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    
    if(fazerLogin($login, $senha)){

        header("Location: home.php");
    }
    else{
        
        header("Location: index.php?login=false");
    }
}
else{
    header("Location: index.php");
}

?>