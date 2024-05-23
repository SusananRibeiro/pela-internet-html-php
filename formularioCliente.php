<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assests/images/home.ico">
    <title>Novo Cliente</title>
</head>
<body>

    <form name="CadastroCliente" method="post" action="formularioCliente.php">
        <label for="">Nome Cliente: </label><br>
        <input type="text" name="campo_nomeCliente"><br><br>
        
        <label for="">Telefone: </label><br>
        <input type="text" name="campo_telefone"><br><br>  

        <label for="">CEP: </label><br>
        <input type="text" name="campo_cep"><br><br>  


        <input type="submit" name="btn_salvarCliente" value="Salvar">
        <input type="reset" name="btn_limparCliente" value="Limpar">
    </form>

    <?php 
        include "conexao.php";

        $nomeCliente = $_POST["campo_nomeCliente"]; 
        $telefone = $_POST["campo_telefone"]; 
        $cep = $_POST["campo_cep"]; 

        $sqlCliente = "INSERT INTO clientes (nome_cliente, telefone, cep) VALUES ('$nomeCliente', '$telefone', $cep)";
        $resultadoCliente = mysqli_query($conexao, $sqlCliente);
        $linhasCliente = mysqli_affected_rows($conexao);

        if($linhasCliente == 1) {
            echo "Cliente salvo com sucesso!<br/>";

        } else {
            echo "Erro ao salvar o cliente";
        }

        mysqli_close($conexao);
    ?>

    <div>
        <br>
        <a href="listaClientes.php">Voltar</a>
    </div>
</body>
</html>