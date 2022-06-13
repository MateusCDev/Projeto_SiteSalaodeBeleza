<?php
    require_once "conexao.php";

    $nome = $_POST["txtNome"];
    $rg = $_POST["txtRg"];
    $sexo = $_POST["txtSexo"];

    $sql = "INSERT INTO cliente (nome, rg, sexo ) 
            values(:nome, :rg, :sexo)";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
             $p_sql->bindValue(":nome", $nome);
             $p_sql->bindValue(":rg", $rg);    
             $p_sql->bindValue(":sexo", $sexo);  
                
            try{
                $p_sql->execute();  
                header('Location: cliente.php');
            }catch(Exception $ex){
                echo $ex->getMessage();
            }       
?>