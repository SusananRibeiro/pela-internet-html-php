<?php 

    $nomeBanco = "curso";
    $servidor = "localhost:3306";
    $usuarioBanco = "root";
    $senhaBanco = "mysql";

    try {
        $conexaoComBanco = new PDO("mysql:dbname=$nomeBanco;host=$servidor", $usuarioBanco, $senhaBanco); 
    } catch(PDOException $e) {
        die('Erro: ' . $e->getMessage());
    }
    
?>