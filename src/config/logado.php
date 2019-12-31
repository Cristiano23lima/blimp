<?php 
    session_start();
    $_SESSION['token'] = isset($_SESSION['token'])?$_SESSION['token']:null;
    if($_SESSION['token'] != null){
        header("location: ../index.php");
    }else{
        session_destroy();
    }
?>
