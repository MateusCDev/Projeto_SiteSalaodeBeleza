<?php
    require_once "conexao.php";
    
    $nomef = $_POST["txtNomef"];
    $cpf = $_POST["txtCpf"];

    $sql = "INSERT INTO funcionario (nomef, cpf) 
            values(:nomef, :cpf)";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nomef", $nomef);    
            $p_sql->bindValue(":cpf", $cpf);  
            
            try{
                $p_sql->execute();  
                header('Location: funcionarios.php');
            }catch(Exception $ex){
                echo $ex->getMessage();
            }       
?> 