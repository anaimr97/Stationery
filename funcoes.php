<?php

function fazerLogin($login, $senha){

    $usuario = selectSQLUnico("SELECT * FROM usuarios WHERE login='$login'");

    if(!empty($usuario)){

        if(password_verify($senha, $usuario["senha"])){

            session_start();
            $_SESSION["usuario"] = $usuario;

            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }

}

function existeSessao(){

    session_start();

    if(empty($_SESSION["usuario"])){
        header("Location: index.php");
        exit();
    }
    

}

function existeSessaoIndex(){

    session_start();

    if(!empty($_SESSION["usuario"])){
        header("Location: home.php");
        exit();
    }
    
}

function saudacao(){

    date_default_timezone_set("Europe/Lisbon");

    $hora = date("H");

    if($hora >= 6 && $hora < 13){
        return "Bom dia";
    }
    elseif($hora >= 13 && $hora < 20){
        return "Boa tarde";
    }
    else{
        return "Boa noite";
    }
}

?>