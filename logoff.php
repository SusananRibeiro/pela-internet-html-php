<?php 
    include('verificarLogin.php');
    session_destroy(); // vai destruir a sessão
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logoff</title>
</head>
<body>
    <p>Encerrando sua sessão...</p>

    <script>
        setTimeout(function() {
            window.location.href = "login.php"; // Redirecionar para login após 2 segundos
        }, 2000);
    </script>
    
</body>
</html>