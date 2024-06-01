<?php 
    require_once('verificar_login.php');
    require('conexao.php');
    
    $id = filter_input(INPUT_GET, 'id');  
    
    if($id) {
        // Ver se tem alguma venda cadastrado primeiro fazer essa validação
        $sql = "SELECT ven.cliente_id, cli.id, cli.nome_cliente FROM clientes cli
        INNER JOIN vendas ven ON ven.cliente_id = cli.id WHERE cli.id = :id";
        $statement = $conexaoComBanco -> prepare($sql);
        $statement -> bindValue(':id', $id);
        $statement -> execute();

        // Ver se tem algum e-mail cadastrado
        if($statement-> rowCount() === 0) { 
            $sql = "DELETE FROM clientes WHERE id = :id";
            $statement = $conexaoComBanco->prepare($sql);
            $statement -> bindValue(':id', $id);
            $statement -> execute();
            header("Location: lista_clientes.php");
        } else if($statement-> rowCount() > 0) {
            header("Location: erro_exclusao.php?acao=cliente");
        } else {
            echo "<div class=erro>Erro ao tentar excluir cliente.</div>";
        }
    }

?>