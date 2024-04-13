<?php 
    session_start();
    session_destroy(); // vai destruir a sessão
    unset($_COOKIE['dado']); // para manter o usuario logado mesmo que feche o browser
    setcookie('dado', ''); // vai limpar o cookie
    header('Location: login.php'); 
?>