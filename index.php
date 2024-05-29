<?php 
    require_once('verificar_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="src/assests/images/home.ico">
    <link rel="stylesheet" href="src/styles/style.css">
    <title>Início</title>
</head>
<body>
    <div class="container">
        <div class="container-menu">
            <div class="image">
                <img src="src/assests/images/logo-empresa.png" alt="Logo da empresa">
            </div>
            <div>
                <iframe src="menu.php"></iframe>
            </div>
        </div>
    
        <div class="container-cabecalho-conteudo">
            <div class="cabecalho">
                <a href="logoff.php" class="sair">Sair</a>
            </div>
            <div class="container-conteudo">
                <iframe src="lista_clientes.php" name="lista"></iframe>
            </div>
        </div>
    </div>
</body>
</html>