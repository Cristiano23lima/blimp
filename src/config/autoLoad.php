<?php 
    require "src/security/WebSecurity.php";
    
    session_start();
    $jwt = new Jwt();
    $_SESSION['token'] = isset($_SESSION['token'])?$_SESSION['token']:null;

    if($_SESSION['token'] != null){
        if($jwt->validatyToken($_SESSION['token']) != $_SESSION['token']){
            session_destroy();
            header("location: autenticacao/login.php");
        }
    }else{
        session_destroy();
        header("location: autenticacao/login.php");
    }

?>