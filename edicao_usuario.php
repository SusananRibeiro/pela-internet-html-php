<?php 
    require_once('verificar_login.php');
    require('conexao.php');

    // GET
    $dadosUsuario = [];
    $id = filter_input(INPUT_GET, 'id'); // "'id'" é o nome da variável da URL

    if($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $statement = $conexaoComBanco -> prepare($sql);
        $statement -> bindValue(':id', $id);
        $statement -> execute();

        if($statement -> rowCount() > 0) {
            $dadosUsuario = $statement -> fetch(PDO::FETCH_ASSOC); // "fetch()" para mapiar as informações separadamente
        } else  {
            header('Location: lista_usuarios.php');
            exit;
        }
    } else {
        echo "ID inválido";
    }

    // POST 
    if(isset($_POST['btn_Atualizar'])) {
        $dadosUsuario = [];
        $id = filter_input(INPUT_POST, 'txt_id'); 
        $nomeUsuario = filter_input(INPUT_POST, 'txt_nome');
        $senha = md5(filter_input(INPUT_POST, 'txt_senha'));

        if(empty($nomeUsuario)) {
            echo "<div class=erro>Nome do usuário é obrigatório</div>";
        } else if(empty($senha)) {
            echo "<div class=erro>Senha do usuário é obrigatório</div>";
        } else if($id && $nomeUsuario && $senha) {
            $sql = "UPDATE usuarios SET nome_usuario = :nome, senha = :senha WHERE id = :id";
            $statement = $conexaoComBanco -> prepare($sql);
            $statement -> bindValue(':nome', $nomeUsuario);
            $statement -> bindValue(':senha', $senha);
            $statement-> bindValue(':id', $id);
            $statement-> execute();

            header("Location: lista_usuarios.php");
            // echo "Usuário atualizado com sucesso!<br/>";
            exit;

        } else {
            echo "<div class=erro>Erro ao atualizar usuário!</div>";
            exit;
        }
    }

?>
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assests/images/home.ico">
    <link rel="stylesheet" href="src/styles/edicao_style.css">
</head>
<body>
    <h1>Editar Usuário</h1>
    <div class="conteudo">
        <form name="CadastroUsuario" method="post" action="#">
            <div>
                <label for="">ID:</label><br>
                <input type="text" name="txt_id" value="<?= $dadosUsuario['id'];?>" readonly/> 
            </div>
            <div>
                <label for="">Nome:</label><br>
                <input type="text" name="txt_nome" value="<?= $dadosUsuario['nome_usuario'];?>" />
            </div>
            <div>
                <label>Senha: </label><br>
                <input type="text" name="txt_senha"  value="<?= $dadosUsuario['senha'];?>" />
            </div>
            <button type="submit" name="btn_Atualizar">Atualizar</button>
        </form>
    </div>
    <div>
        <a href="lista_usuarios.php">Voltar</a>
    </div>
</body>
</html>