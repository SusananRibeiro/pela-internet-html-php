<?php 
    require_once('verificar_login.php');
    require('conexao.php');

    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        // Ver se tem alguma venda cadastrado primeiro fazer essa validação
        $sql = "SELECT ven.produto_id, pro.id FROM produtos pro
        INNER JOIN vendas ven ON ven.produto_id = pro.id WHERE pro.id = :id";
        $statement = $conexaoComBanco -> prepare($sql);
        $statement -> bindValue(':id', $id);
        $statement -> execute();

        // Ver se tem algum e-mail cadastrado
        if($statement-> rowCount() === 0) { 
            $sql = "DELETE FROM produtos WHERE id = :id";
            $statement = $conexaoComBanco->prepare($sql);
            $statement -> bindValue(':id', $id);
            $statement -> execute();
            header("Location: lista_produtos.php");
        } else if($statement-> rowCount() > 0) {
            header("Location: erro_exclusao.php");
        } else {
            print_r($statement);
            echo "<div class=erro>Erro ao tentar excluir produto.</div>";
        }
    }
?>
