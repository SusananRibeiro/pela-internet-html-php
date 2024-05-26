<?php 
    include('verificarLogin.php');
    require "conexao.php";
    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        $sql = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();
    } else {
        echo "Erro ao tentar excluir cliente";
    }

    header("Location: lista_clientes.php");
?>
<h1>Excluir Cliente</h1>

<div>
    <br>
    <a href="lista_clientes.php">Voltar</a>
</div>