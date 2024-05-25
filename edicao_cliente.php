<?php 
    include "conexao.php";

    // if(isset($_POST["btn_salvarCliente"])) {
    //     $nomeCliente = $_POST["campo_nomeCliente"]; 
    //     $telefone = $_POST["campo_telefone"]; 
    //     $cep = $_POST["campo_cep"]; 

    //     $sqlCliente = "INSERT INTO clientes (nome_cliente, telefone, cep) VALUES ('$nomeCliente', '$telefone', $cep)";
    //     $resultadoCliente = mysqli_query($conexao, $sqlCliente);
    //     $linhasCliente = mysqli_affected_rows($conexao);

    //     if($linhasCliente == 1) {
    //         echo "Cliente salvo com sucesso!<br/>";

    //     } else {
    //         echo "Erro ao salvar o cliente<br/>";
    //     }
    // }
    
    mysqli_close($conexao);
?>
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
    <h1>Editar cliente</h1>

    <form name="CadastroCliente" method="post" action="#">
        <label for="">Código: </label><br>
        <input type="text" name="campo_codigoCliente"><br><br>

        <label for="">Nome Cliente: </label><br>
        <input type="text" name="campo_nomeCliente"><br><br>
        
        <label for="">Telefone: </label><br>
        <input type="text" name="campo_telefone"><br><br>  

        <label for="">CEP: </label><br>
        <input type="text" name="campo_cep"><br><br>  


        <input type="submit" name="btn_salvarCliente" value="Salvar">
    </form>

    <div>
        <br>
        <a href="lista_clientes.php">Voltar</a>
    </div>
</body>
</html>