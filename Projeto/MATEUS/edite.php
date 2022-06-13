<?php    
    require_once "conexao.php";

    $codigo = $_POST["txtCodigo"];
    $nome = $_POST["txtNome"];
    $rg = $_POST["txtRg"];
    $telefone = $_POST["txtTelefone"];

    $sql = "UPDATE aluno set nome = :nome, 
            rg = :rg, 
            telefone = :telefone
            where id = :cod";
    

    $p_sql = Conexao::getInstance()->prepare($sql);
    $p_sql->bindValue(":nome", $nome);
    $p_sql->bindValue(":rg", $rg);    
    $p_sql->bindValue(":telefone", $telefone);  
    $p_sql->bindValue(":cod", $codigo);    

    try{
        $p_sql->execute();  
        header('Location: listar.php');
    }catch(Exception $ex){
        echo $ex->getMessage();
    }       
?>