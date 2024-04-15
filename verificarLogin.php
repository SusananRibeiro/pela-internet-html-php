<?php 
    session_start();
    
    if(!isset($_SESSION['logado'])) {
        header('Location: login.php?erro=true');
        exit; // para garantir que ele sai desse arquivo
    }
?>