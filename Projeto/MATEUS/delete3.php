<?php
    require_once "conexao.php";

    $codigo3 = $_POST["txtCodigo3"];
    
   
    $sql = "DELETE FROM funcionario where idfuncionario= :cod3";
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":cod3", $codigo3);
    
    try{
        $p_sql->execute();  
        header('Location: funcionarios.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }       
    
?> 