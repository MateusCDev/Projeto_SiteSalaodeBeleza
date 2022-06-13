<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="insert.php" method="POST">

        <label>Nome</label>
        <input type="text" name ="txtNome"/> 
        </br> 
        <label>Rg</label>
        <input type="text" name ="txtRg"/> 
        </br>
        <label>Telefone</label>
        <input type="text" name ="txtTelefone"/> 
        </br>
        
        <input type="submit" value="Enviar"/>
        <input type="reset"  value="Limpar"/>

        </form>
</body>
</html>