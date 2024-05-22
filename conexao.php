<?php 

    // Conectando ao banco de dados
    $conexao = mysqli_connect("localhost", "root", "mysql");
    mysqli_select_db($conexao, "curso");

?>