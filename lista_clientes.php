<?php 
    include('verificarLogin.php');
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
        <h1>Lista de Clientes</h1>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>CEP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="cor-diferente">
                        <td>1</td>
                        <td>José Nunes</td>
                        <td>(48) 99999-9999</td>
                        <td class="linha-cep">88801500<div class="ocultar-cep"></div></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Maria Lopes</td>
                        <td>(48) 98888-8888</td>
                        <td class="linha-cep">88801014<div class="ocultar-cep"></div></td>
                    </tr>
                    <tr class="cor-diferente">
                        <td>4</td>
                        <td>Jarbas da Silva</td>
                        <td>(48) 97777-7777</td>
                        <td class="linha-cep">88801030<div class="ocultar-cep"></div></td>
                    </tr>
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