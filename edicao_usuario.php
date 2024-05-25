<?php 
    include "conexao.php";

    if(isset($_POST["btn_salvarUsuario"])) {
        $nomeUsuario = $_POST["campo_usuario"]; 
        $senhaDoUsuario = $_POST["campo_senha"]; 
        // $hashMD5 = md5($senhaDoUsuario);
        // echo "O hash MD5 da senha é: " . $hashMD5;

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
<body>

    <h1>Editar Usuário</h1>

    <form name="CadastroUsuario" method="post" action="#">
        <label for="">Código: </label><br>
        <input type="text" name="campo_codigo"><br><br>

        <label for="">Usuário: </label><br>
        <input type="text" name="campo_usuario"><br><br>
        
        <label for="">Senha: </label><br>
        <input type="password" name="campo_senha"><br><br>  

        <input type="submit" name="btn_salvarUsuario" value="Salvar">
    </form>

    <div>
        <br>
        <a href="lista_usuarios.php">Voltar</a>
    </div>
</body>
</html>