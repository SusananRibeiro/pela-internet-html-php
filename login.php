<?php 
    // Sempre iniciar com session_start();
    session_start(); 
    $usuario = $_POST['usuario']; // "usuario" é o mesmo nome que está na tag input no name
    $senha = $_POST['senha']; // "senha" é o mesmo nome que está na tag input no name

    $_SESSION['logado'] = true;
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" id="usuario">

            <label for="senha">Senha</label>
            <input type="text" name="senha" id="senha">
        </div>
        <div>
            <button>Acessar</button>
        </div>


    </form>
    
</body>
</html>