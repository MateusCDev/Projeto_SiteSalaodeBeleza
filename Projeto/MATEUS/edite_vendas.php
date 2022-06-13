<?php    
    require_once "conexao.php";
   
    $codigo4 = $_POST["txtCodigo4"];
    $quantidade = $_POST["txtQuantidade"];
    $dat = $_POST["txtDat"];

    $sql = "UPDATE venda set 
    quantidade = :quantidade, 
    dat= :dat
    where idvenda= :cod4";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":quantidade", $quantidade);    
            $p_sql->bindValue(":dat", $dat);  
            $p_sql->bindValue(":cod4", $codigo4);
            
            try{
                $p_sql->execute();  
                header('Location: venda.php');
            }catch(Exception $ex){
                echo $ex->getMessage();
            }       
        ?>   