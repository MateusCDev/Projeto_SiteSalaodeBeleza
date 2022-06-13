<?php
    require_once "conexao.php";

    $codigo1 = $_POST["txtCodigo1"];
    $codigo2 = $_POST["txtCodigo2"];
    $codigo3 = $_POST["txtCodigo3"];
    
    $sql = "DELETE FROM cliente where idcliente= :cod1";
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":cod1", $codigo1);
    
    $sql = "DELETE FROM produto where idproduto= :cod2";
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":cod2", $codigo2);
    
    $sql = "DELETE FROM funcionario where idfuncionario= :cod3";
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":cod3", $codigo3);
    

    try{
        $p_sql->execute();
        header('Location: areaADM.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
    
?>