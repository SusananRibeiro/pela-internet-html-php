<?php 
    include "conexao.php";

    if(isset($_POST["btn_salvarUsuario"])) {
        $nomeUsuario = $_POST["campo_usuario"]; 
        $senhaDoUsuario = $_POST["campo_senha"]; 

        $sqlUsuario = "INSERT INTO usuarios (nome_usuario, senha) VALUES ('$nomeUsuario', '$senhaDoUsuario')";
        $resultadoUsuario = mysqli_query($conexao, $sqlUsuario);
        $linhasUsuario = mysqli_affected_rows($conexao);

        if($linhasUsuario == 1) {
            echo "Usuário salvo com sucesso!<br/>";

        } else {
            echo "Erro ao salvar o usuário<br/>";
        }

    }
    
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assests/images/home.ico">
    <title>Novo Usuários</title>
</head>
<body>

    <h1>Cadastro Usuário</h1>

    <form name="CadastroUsuario" method="post" action="formularioUsuario.php">
        <label for="">Usuário: </label><br>
        <input type="text" name="campo_usuario"><br><br>
        
        <label for="">Senha: </label><br>
        <input type="password" name="campo_senha"><br><br>  

        <input type="submit" name="btn_salvarUsuario" value="Salvar">
        <input type="reset" name="btn_limparUsuario" value="Limpar">
    </form>

    <div>
        <br>
        <a href="listaUsuarios.php">Voltar</a>
    </div>
</body>
</html>