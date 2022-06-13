<?php    
    require_once "conexao.php";
   
    $codigo3 = $_POST["txtCodigo3"];
    $nomef = $_POST["txtNomef"];
    $cpf = $_POST["txtCpf"];

    $sql = "UPDATE funcionario set 
    nomef = :nomef, 
    cpf= :cpf 
    where idfuncionario= :cod3";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nomef", $nomef);    
            $p_sql->bindValue(":cpf", $cpf);  
            $p_sql->bindValue(":cod3", $codigo3);
            
            try{
                $p_sql->execute();  
                header('Location: funcionarios.php');
            }catch(Exception $ex){
                echo $ex->getMessage();
            }       
        ?>  