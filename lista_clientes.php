<?php 
    include('verificarLogin.php');
    require "conexao.php";
    
    $lista = [];
    $sql = $pdo -> query("SELECT * FROM clientes"); 
    // Valida sem tem registro no banco de dados
    if($sql -> rowCount() > 0) {
        $lista = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/x-icon" href="src/assest/images/cliente.ico"> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/styles/config.css">
    <title>Lista de Clientes</title>
</head>
<body>
    <main class="container">
        <a href="cadastro_cliente.php">Novo</a>
        <h1>Lista de Clientes</h1>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>CEP</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista as $cliente): ?>
                        <tr>
                            <td><?= $cliente['id']; ?></td>
                            <td><?= $cliente['nome_cliente']; ?></td>
                            <td><?= $cliente['telefone']; ?></td>
                            <td><?= $cliente['cep']; ?></td>
                            <td><a href="edicao_cliente.php?id=<?= $cliente['id']; ?>">Editar</a></td>
                            <td><a href="excluir_cliente.php?id=<?= $cliente['id']; ?>">Excluir</a></td>                               
                        </tr>
                    <?php endforeach; ?>  
                </tbody>
            </table>
        </div>    
    </main>
    <script>

        $('.linha-cep').mouseover(function(){
            let cep = $(this).text();  
            let dados = new FormData();    
            let url = "https://ws.assinepelainternet.com.br/rest.php?class=WSCep&method=buscarEndereco&cep=" + cep;

            dados.append('cidade', 'CRICIUMA');
            dados.append('uf', 'SC');
            dados.append('bairro', 'SAO SEBASTIAO');
            dados.append('logradouro', 'RUA BENTO ANTONIO NETO');

            $.ajax({
                url: url,
                method: "post",
                data: dados,
                processData: false,
                contentType: false,
            }).done(function(resposta) {

                let respostaObjeto = JSON.parse(resposta);
                let cidade = respostaObjeto.cidade;
                let uf = respostaObjeto.uf;
                let bairro = respostaObjeto.bairro;
                let logradouro = respostaObjeto.logradouro;

                $('.ocultar-cep').text(logradouro + " BAIRRO " + bairro + " " + cidade +  ", " + uf);
            });   
            
            const divCep =  $(this);
            divCep.children().addClass("mostrar-cep");
        });

        $('.linha-cep').mouseout(function(){
            const divCep =  $(this);    
            $('.ocultar-cep').text(''); // remover o conteúdo da DIV
            divCep.children().removeClass("mostrar-cep");
        });

    </script>
</body>
</html>