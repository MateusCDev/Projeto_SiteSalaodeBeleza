<?php
    require_once "conexao.php";

    $nome = $_POST["txtNome"];
    $rg = $_POST["txtRg"];
    $sexo = $_POST["txtSexo"];
    $quantidade = $_POST["txtQuantidade"];
    $cpf = $_POST["txtCpf"];
    $valor = $_POST["txtValor"];
    $nomef = $_POST["txtNomef"];
    $descricao = $_POST["txtDescricao"];

    $sql = "INSERT INTO cliente (nome, rg, sexo ) 
            values(:nome, :rg, :sexo)";
    $sql = "INSERT INTO produto (descricao, quantidade, valor) 
            values(:descricao, :quantidade, :valor)";
    $sql = "INSERT INTO funcionario (nomef, cpf) 
            values(:nomef, :cpf)";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $nome);
            $p_sql->bindValue(":rg", $rg);    
            $p_sql->bindValue(":sexo", $sexo);  
            $p_sql->bindValue(":descricao", $descricao);
            $p_sql->bindValue(":quantidade", $quantidade);    
            $p_sql->bindValue(":valor", $valor);  
            $p_sql->bindValue(":nomef", $nomef);    
            $p_sql->bindValue(":cpf", $cpf);  
            

    try{
        $p_sql->execute();
        header('Location: areaADM.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
?>