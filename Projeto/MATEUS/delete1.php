<?php
    require_once "conexao.php";

    $codigo1 = $_POST["txtCodigo1"];
    
    $sql = "DELETE FROM cliente where idcliente= :cod1";
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":cod1", $codigo1);
    
       
    try{
        $p_sql->execute();  
        header('Location: cliente.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }       
    
?>