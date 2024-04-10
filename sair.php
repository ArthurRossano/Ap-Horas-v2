<?php 
    session_start();    
    unset($_SESSION['username']);
    unset($_SESSION['senha']);
    unset($_SESSION['nome']);
    header("Location: home.php");
?>