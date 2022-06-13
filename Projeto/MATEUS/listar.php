<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Lista</title>
    </head>
        <body>
        <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="6">
                    <a href="#">
                        <span class="glyphicon 	glyphicon glyphicon-plus" data-toggle="modal"
                        data-target="#myModalCadastrar">
                     </a>   
                    <th>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Rg</th>
                    <th>Telefone</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
                </thead>
             <tbody>
                <?php
                    $sql ="select * from aluno";
                    $result = Conexao::getInstance()->query($sql);
                    while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                ?>      
                <tr class="gradeX">
                    <td><?php echo($rs['id']); ?></td>
                    <td><?php echo($rs['nome']); ?></td>
                    <td><?php echo($rs['rg']); ?></td>
                    <td><?php echo($rs['telefone']); ?></td>
                    <td>
                        <center>
                            <a href="#"> 
                            <span class="glyphicon glyphicon-pencil"
                            data-toggle="modal" data-target="#myModalEditar"
                            data-whateverid="<?php echo ($rs['id']); ?>"
                            data-whatevernome="<?php echo ($rs['nome']); ?>"
                            data-whateverrg="<?php echo ($rs['rg']); ?>"
                            data-whatevertelefone="<?php echo ($rs['telefone']); ?>">
                            </span>
                            </a>
                        </center>
                    </td>
                    <td class="center">
                    <center>
                            <a href="#"> 
                            <span class="glyphicon glyphicon-trash"
                            data-toggle="modal" data-target="#myModalDeletar"
                            data-whateverid="<?php echo ($rs['id']); ?>"
                            data-whatevernome="<?php echo ($rs['nome']); ?>"
                            data-whateverrg="<?php echo ($rs['rg']); ?>"
                            data-whatevertelefone="<?php echo ($rs['telefone']); ?>">
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
                  <div class="modal fade" id="myModalCadastrar" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                <form enctype="multipart/form-data" action="insert.php" method="POST">
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
                                        <label for="text">Telefone:</label>
                                        <input for="text" class="form-control" id="senha" placeholder="Informe o Telefone" name="txtTelefone" required>
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
            <div id="myModalDeletar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                                <form action="delete.php" method="POST">
                                        <input type= "hidden" name="txtCodigo" id="recipient-id" value=""/>
                                        <div class="form-group">
                                            <label for="text">ID:</label>
                                            <input for="text" class="form-control" id="recipient-codigo" disabled />
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
                                            <label for="text">Telefone:</label>
                                            <input for="text" class="form-control" id="recipient-telefone" name="txtTelefone" />
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
        <div class="modal fade" id="myModalEditar" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <form  action="edite.php" method="POST">
                                    <input type= "hidden" name="txtCodigo" id="recipient-id" value=""/>                     
                                    <div class="form-group">
                                        <label for="text">ID:</label>
                                        <input for="text" class="form-control" id="recipient-codigo" disabled>
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
                                        <label for="text">Telefone:</label>
                                        <input for="text" class="form-control" id="recipient-telefone"
                                        name="txtTelefone">
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
                    $('#myModalDeletar').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var recipientid = button.data('whateverid')
                        var recipientnome = button.data('whatevernome')
                        var recipientrg = button.data('whateverrg')
                        var recipienttelefone = button.data('whatevertelefone')
                    
                        var modal = $(this)
                        modal.find('.modal-title').text('Deletar Cliente')
                        modal.find('#recipient-id').val(recipientid)
                        modal.find('#recipient-codigo').val(recipientid)
                        modal.find('#recipient-nome').val(recipientnome)
                        modal.find('#recipient-rg').val(recipientrg)
                        modal.find('#recipient-telefone').val(recipienttelefone)
                    })       
                </script> 

                
                <script>
                    $('#myModalEditar').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var recipientid = button.data('whateverid')
                        var recipientnome = button.data('whatevernome')
                        var recipientrg = button.data('whateverrg')
                        var recipienttelefone = button.data('whatevertelefone')
                    
                        var modal = $(this)
                        modal.find('.modal-title').text('Editar Cliente')
                        modal.find('#recipient-id').val(recipientid)
                        modal.find('#recipient-codigo').val(recipientid)
                        modal.find('#recipient-nome').val(recipientnome)
                        modal.find('#recipient-rg').val(recipientrg)
                        modal.find('#recipient-telefone').val(recipienttelefone)
                    })       
                </script> 


       </body>
</html>