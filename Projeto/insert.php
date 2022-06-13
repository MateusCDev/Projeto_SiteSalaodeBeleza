<?php
    require_once "conexao.php";

    $nome = $_POST["txtNome"];
    $rg = $_POST["txtRg"];
    $telefone = $_POST["txtTelefone"];

    $sql = "INSERT INTO aluno(nome, rg, telefone ) 
            values(:nome, :rg, :telefone)";
            
    
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":nome", $nome);
    $p_sql->bindValue(":rg", $rg);
    $p_sql->bindValue(":telefone", $telefone);
    try{
        $p_sql->execute();
        header('Location: listar.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
    
    
?>