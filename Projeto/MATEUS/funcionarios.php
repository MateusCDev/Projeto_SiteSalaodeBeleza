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
            <title>Funcionarios</title>
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
                                data-target="#myModalCadastrar3">
                            </a>   
                            <th>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                        </thead>
                    <tbody>
                        <?php
                            $sql ="select * from funcionario";
                            $result = Conexao::getInstance()->query($sql);
                            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                           
                        ?>      
                        <tr class="gradeX">
                            <td><?php echo($rs['idfuncionario']); ?></td>
                            <td><?php echo($rs['nomef']); ?></td>
                            <td><?php echo($rs['cpf']); ?></td>
                            <td>
                                <center>
                                    <a href="#"> 
                                    <span class="glyphicon glyphicon-pencil"
                                    data-toggle="modal" data-target="#myModalEditar3"
                                    data-whateveridfuncionario="<?php echo ($rs['idfuncionario']); ?>"
                                    data-whatevernomef="<?php echo ($rs['nomef']); ?>"
                                    data-whatevercpf="<?php echo ($rs['cpf']); ?>"
                                    </span>
                                    </a>
                                </center>
                            </td>
                            <td class="center">
                            <center>
                                    <a href="#"> 
                                    <span class="glyphicon glyphicon-trash"
                                    data-toggle="modal" data-target="#myModalDeletar3"
                                    data-whateveridfuncionario="<?php echo ($rs['idfuncionario']); ?>"
                                    data-whatevernomef="<?php echo ($rs['nomef']); ?>"
                                    data-whatevercpf="<?php echo ($rs['cpf']); ?>"
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
                        <div class="modal fade" id="myModalCadastrar3" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" action="insert3.php" method="POST">
                                            <input type= "hidden" name="txtInserir" value="1"/>
                                            <div class="form-group">
                                                <label for="text">Nome:</label>
                                                <input for="text" class="form-control" id="senha"
                                                placeholder="Informe o nome" name="txtNomef" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">CPF:</label>
                                                <input for="text" class="form-control" id="senha" placeholder="Informe o CPF" name="txtCpf" required>
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
                    <div id="myModalDeletar3" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                        <form action="delete3.php" method="POST">
                                                <input type= "hidden" name="txtCodigo3" id="recipient-idfuncionario" value=""/>
                                                <div class="form-group">
                                                    <label for="text">ID:</label>
                                                    <input for="text" class="form-control" id="recipient-codigo3" disabled />
                                                </div>
                                                <div class="form-group">
                                                        <label for="text">Nome:</label>
                                                        <input for="text" class="form-control" id="recipient-nomef"
                                                        name="txtNomef" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">CPF:</label>
                                                        <input for="text" class="form-control" id="recipient-cpf"
                                                        name="txtCpf" >
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
                            <div id="myModalEditar3" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                        <form action="edite3.php" method="POST">
                                                <input type= "hidden" name="txtCodigo3" id="recipient-idfuncionario" value=""/>
                                                <div class="form-group">
                                                    <label for="text">ID:</label>
                                                    <input for="text" class="form-control" id="recipient-codigo3" disabled />
                                                </div>
                                                <div class="form-group">
                                                        <label for="text">Nome:</label>
                                                        <input for="text" class="form-control" id="recipient-nomef"
                                                        name="txtNomef" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">CPF:</label>
                                                        <input for="text" class="form-control" id="recipient-cpf"
                                                        name="txtCpf" >
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
                            $('#myModalDeletar3').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipientidfuncionario = button.data('whateveridfuncionario')
                                var recipientnomef = button.data('whatevernomef')
                                var recipientcpf = button.data('whatevercpf')
                                
                                var modal = $(this)
                                modal.find('.modal-title').text('Deletar Cliente')
                                modal.find('#recipient-idfuncionario').val(recipientidfuncionario)
                                modal.find('#recipient-codigo3').val(recipientidfuncionario)
                                modal.find('#recipient-nomef').val(recipientnomef)
                                modal.find('#recipient-cpf').val(recipientcpf)
                            })       
                        </script> 
                       
                       <script>
                            $('#myModalEditar3').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipientidfuncionario = button.data('whateveridfuncionario')
                                var recipientnomef = button.data('whatevernomef')
                                var recipientcpf = button.data('whatevercpf')
                                
                                var modal = $(this)
                                modal.find('.modal-title').text('Editar Cliente')
                                modal.find('#recipient-idfuncionario').val(recipientidfuncionario)
                                modal.find('#recipient-codigo3').val(recipientidfuncionario)
                                modal.find('#recipient-nomef').val(recipientnomef)
                                modal.find('#recipient-cpf').val(recipientcpf)
                                
                            })
                        </script> 
                    </div>
            </section>
          
        </body>
    </html>