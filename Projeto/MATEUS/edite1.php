<?php    
    require_once "conexao.php";
   
    $codigo1 = $_POST["txtCodigo1"];
    $nome = $_POST["txtNome"];
    $rg = $_POST["txtRg"];
    $sexo = $_POST["txtSexo"];


    $sql = "UPDATE cliente set 
            nome = :nome, 
            rg = :rg, 
            sexo = :sexo
            where idcliente= :cod1";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $nome);
            $p_sql->bindValue(":rg", $rg);    
            $p_sql->bindValue(":sexo", $sexo);  
            $p_sql->bindValue(":cod1", $codigo1); 
            
            try{
                $p_sql->execute();  
                header('Location: cliente.php');
            }catch(Exception $ex){
                echo $ex->getMessage();
            }       
        ?>