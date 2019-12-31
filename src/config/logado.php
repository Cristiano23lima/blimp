<?php 
    session_start();
    if($_SESSION['token']){
        header("location: ../index.php");
    }else{
        session_destroy();
    }
?>
