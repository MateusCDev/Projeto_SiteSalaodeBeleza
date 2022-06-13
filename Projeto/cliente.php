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
            <title>Cliente</title>
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
                            <th colspan="5">
                            <a href="#">
                                <span class="glyphicon 	glyphicon glyphicon-plus" data-toggle="modal"
                                data-target="#myModalCadastrar1">
                            </a>   
                            <th>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Rg</th>
                            <th>Sexo</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                        </thead>
                    <tbody>
                        <?php
                            $sql ="select * from cliente";
                            $result = Conexao::getInstance()->query($sql);
                            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                           
                        ?>      
                        <tr class="gradeX">
                            <td><?php echo($rs['idcliente']); ?></td>
                            <td><?php echo($rs['nome']); ?></td>
                            <td><?php echo($rs['rg']); ?></td>
                            <td><?php echo($rs['sexo']); ?></td>
                            <td>
                                <center>
                                    <a href="#"> 
                                    <span class="glyphicon glyphicon-pencil"
                                    data-toggle="modal" data-target="#myModalEditar1"
                                    data-whateveridcliente="<?php echo ($rs['idcliente']); ?>"
                                    data-whatevernome="<?php echo ($rs['nome']); ?>"
                                    data-whateverrg="<?php echo ($rs['rg']); ?>"
                                    data-whateversexo="<?php echo ($rs['sexo']); ?>">
                                    </span>
                                    </a>
                                </center>
                            </td>
                            <td class="center">
                            <center>
                                    <a href="#"> 
                                    <span class="glyphicon glyphicon-trash"
                                    data-toggle="modal" data-target="#myModalDeletar1"
                                    data-whateveridcliente="<?php echo ($rs['idcliente']); ?>"
                                    data-whatevernome="<?php echo ($rs['nome']); ?>"
                                    data-whateverrg="<?php echo ($rs['rg']); ?>"
                                    data-whateversexo="<?php echo ($rs['sexo']); ?>">
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
                        <!-- Modal  Cadastrar -->
                        <div class="modal fade" id="myModalCadastrar1" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" action="insert1.php" method="POST">
                                            <input type= "hidden" name="txtInserir" value="1"/>
                                            <div class="form-group">
                                                <label for="text">Nome:</label>
                                                <input for="text" class="form-control" id="senha"
                                                placeholder="Digite Nome" name="txtNome" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Rg:</label>
                                                <input for="text" class="form-control" id="senha" placeholder="Informe o RG" name="txtRg" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Sexo:</label>
                                                <input for="text" class="form-control" id="senha" placeholder="Informe o Sexo" name="txtSexo" required>
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
                    </div>
                
                        
                        <!-- Modal Deletar-->
                    <div id="myModalDeletar1" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                        <form action="delete1.php" method="POST">
                                                <input type= "hidden" name="txtCodigo1" id="recipient-idcliente" value=""/>
                                                <div class="form-group">
                                                    <label for="text">ID:</label>
                                                    <input for="text" class="form-control" id="recipient-codigo1" disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Nome:</label>
                                                    <input for="text" class="form-control" id="recipient-nome" name="txtNome" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Rg:</label>
                                                    <input for="text" class="form-control" id="recipient-rg" name="txtRg" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Sexo:</label>
                                                    <input for="text" class="form-control" id="recipient-sexo" name="txtSexo" />
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
                        <div class="modal fade" id="myModalEditar1" role="dialog">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form  action="edite1.php" method="POST">
                                                    <input type= "hidden" name="txtCodigo1" id="recipient-idcliente" value=""/>                     
                                                    <div class="form-group">
                                                        <label for="text">ID:</label>
                                                        <input for="text" class="form-control" id="recipient-codigo1" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Nome:</label>
                                                        <input for="text" class="form-control" id="recipient-nome"
                                                        name="txtNome" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Rg:</label>
                                                        <input for="text" class="form-control" id="recipient-rg"
                                                        name="txtRg" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Sexo:</label>
                                                        <input for="text" class="form-control" id="recipient-sexo"
                                                        name="txtSexo">
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
                            $('#myModalDeletar1').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipientidcliente = button.data('whateveridcliente')
                                var recipientnome = button.data('whatevernome')
                                var recipientrg = button.data('whateverrg')
                                var recipientsexo = button.data('whateversexo')
                            
                                var modal = $(this)
                                modal.find('.modal-title').text('Deletar Cliente')
                                modal.find('#recipient-idcliente').val(recipientidcliente)
                                modal.find('#recipient-codigo1').val(recipientidcliente)
                                modal.find('#recipient-nome').val(recipientnome)
                                modal.find('#recipient-rg').val(recipientrg)
                                modal.find('#recipient-sexo').val(recipientsexo)
                            })       
                        </script> 
                       
                       <script>
                            $('#myModalEditar1').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipientidcliente = button.data('whateveridcliente')
                                var recipientnome = button.data('whatevernome')
                                var recipientrg = button.data('whateverrg')
                                var recipientsexo = button.data('whateversexo')
                            
                                var modal = $(this)
                                modal.find('.modal-title').text('Editar Cliente')
                                modal.find('#recipient-idcliente').val(recipientidcliente)
                                modal.find('#recipient-codigo1').val(recipientidcliente)
                                modal.find('#recipient-nome').val(recipientnome)
                                modal.find('#recipient-rg').val(recipientrg)
                                modal.find('#recipient-sexo').val(recipientsexo)
                            })
                        </script> 
                        
                    <div> 
            </section>
            
        </body>
    </html>