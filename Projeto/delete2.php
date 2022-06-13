<?php
    require_once "conexao.php";

    $codigo2 = $_POST["txtCodigo2"];
    
   
    $sql = "DELETE FROM servico where idservico= :cod2";
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":cod2", $codigo2);
    
    try{
        $p_sql->execute();  
        header('Location: serv.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }       
?>