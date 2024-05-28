<?php 
    require_once('verificarLogin.php');
    require('conexao.php');
    
    $id = filter_input(INPUT_GET, 'id');  
    $venda = filter_input(INPUT_POST, 'txt_nomeCliente');
    
    if($id && $venda) {
        // Ver se tem algum nome cadastrado primeiro fazer essa validação
        $sql = "SELECT * FROM vendas WHERE ven.cliente_id = cli.id";
        $statement = $conexaoComBanco -> prepare($sql);
        $statement -> bindValue(':nome', $venda);
        $statement -> execute();

        // Ver se tem algum e-mail cadastrado
        if($statement-> rowCount() === 0) { 
            $sql = "DELETE FROM clientes WHERE id = :id";
            $statement = $conexaoComBanco->prepare($sql);
            $statement -> bindValue(':id', $id);
            $statement -> execute();
        } else {
            echo "<div class=erro>Erro ao tentar excluir cliente.</div>";
        }
    }

    header("Location: lista_clientes.php");
?>