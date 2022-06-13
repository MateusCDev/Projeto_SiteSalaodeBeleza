<?php
    require_once "conexao.php";
    
    $descricao = $_POST["txtDescricao"];
    $quantidade = $_POST["txtQuantidade"];
    $valor = $_POST["txtValor"];

    $sql = "INSERT INTO servico (descricao, quantidade, valor) 
            values(:descricao, :quantidade, :valor)";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":descricao", $descricao);
            $p_sql->bindValue(":quantidade", $quantidade);    
            $p_sql->bindValue(":valor", $valor);  
             
            try{
                $p_sql->execute();  
                header('Location: serv.php');
            }catch(Exception $ex){
                echo $ex->getMessage();
            }       
?>