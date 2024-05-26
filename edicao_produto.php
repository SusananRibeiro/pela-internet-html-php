<?php 
    include('verificarLogin.php');
    require "conexao.php";


    // GET
    $dadosProduto = [];
    $id = filter_input(INPUT_GET, 'id'); // "'id'" é o nome da variável da URL

    if($id) {
        $sql = $pdo -> prepare("SELECT * FROM produtos WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $dadosProduto = $sql -> fetch(PDO::FETCH_ASSOC); // "fetch()" para mapiar as informações separadamente
        } else  {
            header('Location: index.php');
            exit;
        }
    } else {
        echo "ID inválido";
    }

    // POST 
    if(isset($_POST['btn_Atualizar'])) {
        $dadosProduto = [];
        $id = filter_input(INPUT_POST, 'txt_id'); 
        $nome = filter_input(INPUT_POST, 'txt_nome');
        $valor = filter_input(INPUT_POST, 'txt_valor');

        if($id && $nome && $valor) {

            $sql = $pdo -> prepare("UPDATE produtos SET nome_produto = :nome, valor = :valor WHERE id = :id");
            $sql -> bindValue(':nome', $nome);
            $sql -> bindValue(':valor', $valor);
            $sql -> bindValue(':id', $id);
            $sql -> execute();

            header("Location: lista_produtos.php");
            // echo "Produto atualizado com sucesso!<br/>";
            exit;

        } else {
            echo "Erro ao atualizar produto!<br/>";
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

    <h1>Editar Produto</h1>
<div class="conteudo">
    <form name="CadastroProduto" method="post" action="#">
        <label for="">ID:</label>
        <input type="text" name="txt_id" value="<?= $dadosProduto['id']; ?>"/> <!-- disabled  -->

        <label for="">Nome do produto:</label>
        <input type="text" name="txt_nome" value="<?= $dadosProduto['nome_produto']; ?>" />

        <label>Valor: </label>
        <input type="text" name="txt_valor"  value="<?= $dadosProduto['valor']; ?>" />

        <input type="submit" name="btn_Atualizar" value="Atualizar" />
    </form>
</div>


    <div>
        <br>
        <a href="lista_produtos.php">Voltar</a>
    </div>
</body>
</html>