<?php
    require "../security/Autenticacao.php";

    $auth = new Autenticacao();

    session_start();
    $_SESSION['token'] = $auth->login("email2@gmail.com", "admin");
?>