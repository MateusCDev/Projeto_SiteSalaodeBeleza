<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
            <link rel="stylesheet" href="css/salaodesing.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <title>Venda</title>
    </head>
        <body class="fundo">
            <nav class="menu">
                <nav class="submenus">
                <a href="cliente.php"><input type="submit" value="Cliente" id="btns"></a>
                <a href="funcionarios.php"><input type="submit" value=" Funcionario" id="btns"></a>
                <a href="serv.php"><input type="submit" value="Produtos" id="btns"></a>
                <a href="venda.php"><input type="submit" value="Vendas" id="btns"><a>
                </nav>
                <div class="adm">
                <a href="salaobl.php"><input type="submit" value="Sair" id="adm"></a>  
                </div>
            </nav>
            <harder class="topo">
                <img class="logo" src="img/slogan.png">
                <div class="titulos">
                <h1 class="titulo"> ADM Dona Fresca</h1>
                </div>
            </harder>
            <section class="corpo">
            <div class="Listas">    
            <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="4">
                            <a href="#">
                                <span class="glyphicon 	glyphicon glyphicon-plus" data-toggle="modal"
                                data-target="#myModalCadastrar4">
                            </a>   
                            <th>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Quantidade</th>
                            <th>DATA</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                        </thead>
                    <tbody>
                        <?php
                            $sql ="select * from venda";
                            $result = Conexao::getInstance()->query($sql);
                            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                           
                        ?>      
                        <tr class="gradeX">
                            <td><?php echo($rs['idvenda']); ?></td>
                            <td><?php echo($rs['quantidade']); ?></td>
                            <td><?php echo($rs['dat']); ?></td>
                            <td>
                                <center>
                                    <a href="#"> 
                                    <span class="glyphicon glyphicon-pencil"
                                    data-toggle="modal" data-target="#myModalEditar4"
                                    data-whateveridvenda="<?php echo ($rs['idvenda']); ?>"
                                    data-whateverquantidade="<?php echo ($rs['quantidade']); ?>"
                                    data-whateverdat="<?php echo ($rs['dat']); ?>"
                                    </span>
                                    </a>
                                </center>
                            </td>
                            <td class="center">
                            <center>
                                    <a href="#"> 
                                    <span class="glyphicon glyphicon-trash"
                                    data-toggle="modal" data-target="#myModalDeletar4"
                                    data-whateveridvenda="<?php echo ($rs['idvenda']); ?>"
                                    data-whateverquantidade="<?php echo ($rs['quantidade']); ?>"
                                    data-whateverdat="<?php echo ($rs['dat']); ?>"
                                    </span>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                    </table>                                    
                        <!-- Modal  Cadastrar -->
                        <div class="modal fade" id="myModalCadastrar4" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Cadastrar</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" action="insert_vendas.php" method="POST">
                                            <input type= "hidden" name="txtInserir" value="1"/>
                
                                            <div class="form-group">
                                                <label for="text">Quantidade:</label>
                                                <input for="text" class="form-control" id="senha"
                                                placeholder="Informe a quantidade" name="txtQuantidade" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="text">DATA:</label>
                                                <input for="data" class="form-control" id="senha" placeholder="Informe a Data" name="txtDat" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Cliente</label>
                                                <select name="txtCliente" class="form-control">
                                                    <?php
                                                        $sql_cli="SELECT idcliente, nome FROM cliente";
                                                        $consulta_cli = Conexao::getInstance()->prepare($sql_cli);
                                                        $consulta_cli->execute();
                                                        while ($linha_cli = $consulta_cli->fetch(PDO::FETCH_ASSOC)){
                                                    ?>
                                                       <option value="<?php echo "{$linha_cli['idcliente']}" ?>">
                                                        <?php echo "{$linha_cli['nome']}" ?>                                                                                                                        
                                                       </option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for ="pwp">Serviço</label>
                                                <select name="txtServico" class="form-control">
                                                    <?php
                                                        $sql_serv="SELECT idservico, descricao  FROM servico";
                                                        $consulta_serv = Conexao::getInstance()->prepare($sql_serv);
                                                        $consulta_serv->execute();
                                                        while ($linha_serv = $consulta_serv->fetch(PDO::FETCH_ASSOC)){
                                                    ?>
                                                       <option value="<?php echo($linha_serv['idservico']) ?>">
                                                             <?php echo($linha_serv['descricao']) ?>
                                                       </option>
                                                       <?php 
                                                        }
                                                       ?>
                                                    </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for ="pwp">Funcionario</label>
                                                <select name="txtFuncionario" class="form-control">
                                                    <?php
                                                        $sql_func="SELECT idfuncionario, nomef, cpf FROM funcionario";
                                                        $consulta_func = Conexao::getInstance()->prepare($sql_func);
                                                        $consulta_func->execute();
                                                        while ($linha_func = $consulta_func->fetch(PDO::FETCH_ASSOC)){
                                                    ?>
                                                       <option value="<?php echo($linha_func['idfuncionario']) ?>">
                                                             <?php echo($linha_func['nomef']) ?>
                                                             <?php echo($linha_func['cpf']) ?>
                                                       </option>
                                                       <?php 
                                                        }
                                                       ?>
                                                    </select>
                                            </div>
                                                                                                                               
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    
                        <!-- Modal Deletar-->
                    <div id="myModalDeletar4" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                        <form action="delete_vendas.php" method="POST">
                                                <input type= "hidden" name="txtCodigo4" id="recipient-idvenda" value=""/>
                                                <div class="form-group">
                                                    <label for="text">ID:</label>
                                                    <input for="text" class="form-control" id="recipient-codigo4" disabled />
                                                </div>
                                                <div class="form-group">
                                                        <label for="text">Quantidade:</label>
                                                        <input for="text" class="form-control" id="recipient-quantidade"
                                                        name="txtQuantidade" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">DATA:</label>
                                                        <input for="text" class="form-control" id="recipient-dat"
                                                        name="txtDat" >
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Deletar</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  
                                                </div>
                                          </form>                           
                                        </div>
                                    </div>
                                </div>   
                            </div> 
                            <!-- Modal Editar-->
                            <div id="myModalEditar4" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                        <form action="edite_vendas.php" method="POST">
                                                <input type= "hidden" name="txtCodigo4" id="recipient-idvenda" value=""/>
                                                <div class="form-group">
                                                    <label for="text">ID:</label>
                                                    <input for="text" class="form-control" id="recipient-codigo4" disabled />
                                                </div>
                                                <div class="form-group">
                                                        <label for="text">Quantidade:</label>
                                                        <input for="text" class="form-control" id="recipient-quantidade"
                                                        name="txtQuantidade" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">DATA:</label>
                                                        <input for="text" class="form-control" id="recipient-dat"
                                                        name="txtDat" >
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Editar</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  
                                                </div>
                                        </form>                           
                                    </div>
                                </div>
                            </div>   
                        </div> 
                    
                        <script>
                            $('#myModalDeletar4').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipientidvenda = button.data('whateveridvenda')
                                var recipientquantidade = button.data('whateverquantidade')
                                var recipientdat = button.data('whateverdat')
                                
                                var modal = $(this)
                                modal.find('.modal-title').text('Deletar Cliente')
                                modal.find('#recipient-idvenda').val(recipientidvenda)
                                modal.find('#recipient-codigo4').val(recipientidvenda)
                                modal.find('#recipient-quantidade').val(recipientquantidade)
                                modal.find('#recipient-dat').val(recipientdat)
                            })       
                        </script> 
                       
                       <script>
                            $('#myModalEditar4').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipientidvenda = button.data('whateveridvenda')
                                var recipientquantidade = button.data('whateverquantidade')
                                var recipientdat = button.data('whateverdat')
                                
                                var modal = $(this)
                                modal.find('.modal-title').text('Editar Cliente')
                                modal.find('#recipient-idvenda').val(recipientidvenda)
                                modal.find('#recipient-codigo4').val(recipientidvenda)
                                modal.find('#recipient-quantidade').val(recipientquantidade)
                                modal.find('#recipient-dat').val(recipientdat)
                            })
                        </script> 
                    </div>
            </section>
            
        </body>
    </html>