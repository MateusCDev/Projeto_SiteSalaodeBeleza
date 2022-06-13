<?php
    require_once "conexao.php";

    $codigo = $_POST["txtCodigo"];
    
    $sql = "DELETE FROM aluno where id= :cod";
    $p_sql= Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":cod", $codigo);
    

    try{
        $p_sql->execute();
        header('Location: listar.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
    
?>