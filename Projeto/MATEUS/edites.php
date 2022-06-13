<?php    
    require_once "conexao.php";

    $codigo1 = $_POST["txtCodigo1"];
    $codigo2 = $_POST["txtCodigo2"];
    $codigo3 = $_POST["txtCodigo3"];
    $nome = $_POST["txtNome"];
    $rg = $_POST["txtRg"];
    $sexo = $_POST["txtSexo"];
    $quantidade = $_POST["txtQuantidade"];
    $cpf = $_POST["txtCpf"];
    $valor = $_POST["txtValor"];
    $nomef = $_POST["txtNomef"];
    $descricao = $_POST["txtDescricao"];
    

    $sql = "UPDATE cliente set 
            nome = :nome, 
            rg = :rg, 
            sexo = :sexo
            where idcliente= :cod1";

    $sql = "UPDATE produto set 
            descricao = :descricao, 
            quantidade= :quantidade, 
            valor = :valor
            where idproduto= :cod2";
    
    $sql = "UPDATE funcionario set 
            nomef = :nomef, 
            cpf= :cpf, 
            where idfuncioario= :cod3";
    

    $p_sql = Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":nome", $nome);
    $p_sql->bindValue(":rg", $rg);    
    $p_sql->bindValue(":sexo", $sexo);  
    $p_sql->bindValue(":cod1", $codigo1); 
    $p_sql->bindValue(":descricao", $descricao);
    $p_sql->bindValue(":quantidade", $quantidade);    
    $p_sql->bindValue(":valor", $valor);  
    $p_sql->bindValue(":cod2", $codigo2);   
    $p_sql->bindValue(":nomef", $nomef);    
    $p_sql->bindValue(":cpf", $cpf);  
    $p_sql->bindValue(":cod3", $codigo3); 

    try{
        $p_sql->execute();  
        header('Location: areaADM.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }       
?>