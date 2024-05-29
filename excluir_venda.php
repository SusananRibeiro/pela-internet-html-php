<?php 
    require_once('verificar_login.php');
    require('conexao.php');
    
    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        $sql = "DELETE FROM vendas WHERE id = :id";
        $statement = $conexaoComBanco->prepare($sql);
        $statement -> bindValue(':id', $id);
        $statement -> execute();
    } else {
        echo "Erro ao tentar excluir venda";
    }

    header("Location: lista_vendas.php");
?>