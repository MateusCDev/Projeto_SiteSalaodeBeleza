<?php    
    require_once "conexao.php";
   
    $codigo2 = $_POST["txtCodigo2"];
    $descricao = $_POST["txtDescricao"];
    $quantidade = $_POST["txtQuantidade"];
    $valor = $_POST["txtValor"];


    $sql = "UPDATE servico set 
            descricao = :descricao, 
            quantidade= :quantidade, 
            valor = :valor
            where idservico= :cod2";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod2", $codigo2); 
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