<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
            <link rel="stylesheet" href="css/salaodesing.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <title>Area ADM</title>
    </head>
        <body class="fundo">
            <nav class="menu">
                <nav class="submenus">
                <a href="cliente.php"><input type="submit" value="Cliente" id="btns"></a>
                <a href="funcionarios.php"><input type="submit" value=" Funcionario" id="btns"></a>
                <a href="serv.php"><input type="submit" value="Produtos" id="btns"></a>
                <a href="venda.php"><input type="submit" value="Vendas" id="btns"><a>
                </nav>
                <div class="adm">
                <a href="areaADM.php"><input type="submit" value="AreaADM" id="adm"></a> 
                </div>
            </nav>
            <harder class="topo">
                <img class="logo" src="img/slogan.png">
                <div class="titulos">
                <h1 class="titulo"> ADM Dona Fresca</h1>
                </div>
            </harder>
            
            
        </body>
 </html>