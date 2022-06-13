<?php
    require_once "conexao.php";
    
    $dat = $_POST["txtDat"];
    $quantidade = $_POST["txtQuantidade"];
    $idcli= $_POST["txtCliente"];
    $idfunc= $_POST["txtFuncionario"];
    $idserv= $_POST["txtServico"];

  

    $sql = "INSERT INTO venda (idcliente, idservico, idfuncionario, quantidade, dat) 
            values(:idcliente, :idservico, :idfuncionario, :quantidade, :dat)";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":dat", $dat);
            $p_sql->bindValue(":quantidade", $quantidade);    
            $p_sql->bindValue(":idcliente", $idcli); 
            $p_sql->bindValue(":idservico", $idserv);    
            $p_sql->bindValue(":idfuncionario", $idfunc);       
           
            try{
                $p_sql->execute();  
                header('Location: venda.php');
            }catch(Exception $ex){
                echo $ex->getMessage();
            }       
?> 