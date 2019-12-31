<?php 
    require "../services/UsuarioService.php";

    $acao = isset($_REQUEST['acao'])?$_REQUEST['acao']: null;
    $usuarioService = new UsuarioService();
    
?>