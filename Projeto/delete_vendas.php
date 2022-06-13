<?php
    require_once "conexao.php";

    $codigo4 = $_POST["txtCodigo4"];
    
   
    $sql = "DELETE FROM venda where idvenda= :cod4";
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":cod4", $codigo4);
    
    try{
        $p_sql->execute();  
        header('Location: venda.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }       
?>  