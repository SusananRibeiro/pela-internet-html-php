<?php 
    session_start();
    session_destroy(); // responsavem por destruir a seção
    header('Location: login.php');
?>