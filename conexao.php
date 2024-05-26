<?php 

    $nomeBanco = "curso";
    $hostBanco = "localhost:3306";
    $userBanco = "root";
    $senhaBanco = "mysql";
    $pdo = new PDO("mysql:dbname=$nomeBanco;host=$hostBanco", $userBanco, $senhaBanco); 
    // $pdo = new PDO("mysql:dbname=crud_php;host=localhost:3306", "root", "mysql");
    
    // Conectando ao banco de dados
    // $conexao = mysqli_connect("localhost", "root", "mysql");
    // mysqli_select_db($conexao, "curso");

    // Ver
    // function novaConexao($banco = 'curso_php') {
    //     $servidor = 'localhost'; // Pode ser "localhost" ou "127.0.0.1", é a mesma coisa como a porta usada é a 3306 não precisa colocar, se for outra porta precisa, ex: "'127.0.0.1:3307'" ou "'localhost:3307'"
    //     $usuario = 'root';
    //     $senha = 'mysql';
    
    //     try {
    //         $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha); // Ou $conexao = new PDO("mysql:dbname=crud_php;host=localhost:3306", "root", "mysql");
    //         return $conexao;
    //     } catch(PDOException $e) {
    //         die('Erro: ' . $e->getMessage());
    //     }
    // }


?>