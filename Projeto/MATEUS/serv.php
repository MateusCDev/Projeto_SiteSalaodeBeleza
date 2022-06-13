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
            <title>Serv</title>
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
                                data-target="#myModalCadastrar2">
                            </a>   
                            <th>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                        </thead>
                    <tbody>
                        <?php
                            $sql ="select * from servico";
                            $result = Conexao::getInstance()->query($sql);
                            while($rs = $result->fetch(PDO::FETCH_ASSOC)){
                           
                        ?>      
                        <tr class="gradeX">
                            <td><?php echo($rs['idservico']); ?></td>
                            <td><?php echo($rs['descricao']); ?></td>
                            <td><?php echo($rs['quantidade']); ?></td>
                            <td><?php echo($rs['valor']); ?></td>
                            <td>
                                <center>
                                    <a href="#"> 
                                    <span class="glyphicon glyphicon-pencil"
                                    data-toggle="modal" data-target="#myModalEditar2"
                                    data-whateveridservico="<?php echo ($rs['idservico']); ?>"
                                    data-whateverdescricao="<?php echo ($rs['descricao']); ?>"
                                    data-whateverquantidade="<?php echo ($rs['quantidade']); ?>"
                                    data-whatevervalor="<?php echo ($rs['valor']); ?>">
                                    </span>
                                    </a>
                                </center>
                            </td>
                            <td class="center">
                            <center>
                                    <a href="#"> 
                                    <span class="glyphicon glyphicon-trash"
                                    data-toggle="modal" data-target="#myModalDeletar2"
                                    data-whateveridservico="<?php echo ($rs['idservico']); ?>"
                                    data-whateverdescricao="<?php echo ($rs['descricao']); ?>"
                                    data-whateverquantidade="<?php echo ($rs['quantidade']); ?>"
                                    data-whatevervalor="<?php echo ($rs['valor']); ?>">
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
                        <div class="modal fade" id="myModalCadastrar2" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" action="insert2.php" method="POST">
                                            <input type= "hidden" name="txtInserir" value="1"/>
                                            <div class="form-group">
                                                <label for="text">Descricao:</label>
                                                <input for="text" class="form-control" id="senha"
                                                placeholder="De a descrição" name="txtDescricao" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Quantidade:</label>
                                                <input for="text" class="form-control" id="senha" placeholder="Informe a quantidade" name="txtQuantidade" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Valor:</label>
                                                <input for="text" class="form-control" id="senha" placeholder="Informe o valor" name="txtValor" required>
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
                    <div id="myModalDeletar2" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                        <form action="delete2.php" method="POST">
                                                <input type= "hidden" name="txtCodigo2" id="recipient-idservico" value=""/>
                                                <div class="form-group">
                                                    <label for="text">ID:</label>
                                                    <input for="text" class="form-control" id="recipient-codigo2" disabled />
                                                </div>
                                                <div class="form-group">
                                                        <label for="text">Descricao:</label>
                                                        <input for="text" class="form-control" id="recipient-descricao"
                                                        name="txtDescricao" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Quantidade:</label>
                                                        <input for="text" class="form-control" id="recipient-quantidade"
                                                        name="txtQuantidade" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Valor:</label>
                                                        <input for="text" class="form-control" id="recipient-valor"
                                                        name="txtValor">
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
                        <div class="modal fade" id="myModalEditar2" role="dialog">
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form  action="edite2.php" method="POST">
                                                    <input type= "hidden" name="txtCodigo2" id="recipient-idservico" value=""/>                     
                                                    <div class="form-group">
                                                        <label for="text">ID:</label>
                                                        <input for="text" class="form-control" id="recipient-codigo2" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Descricao:</label>
                                                        <input for="text" class="form-control" id="recipient-descricao"
                                                        name="txtDescricao" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Quantidade:</label>
                                                        <input for="text" class="form-control" id="recipient-quantidade"
                                                        name="txtQuantidade" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Valor:</label>
                                                        <input for="text" class="form-control" id="recipient-valor"
                                                        name="txtValor">
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
                            $('#myModalDeletar2').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipientidservico = button.data('whateveridservico')
                                var recipientdescricao = button.data('whateverdescricao')
                                var recipientquantidade = button.data('whateverquantidade')
                                var recipientvalor = button.data('whatevervalor')
                            
                                var modal = $(this)
                                modal.find('.modal-title').text('Deletar Cliente')
                                modal.find('#recipient-idservico').val(recipientidservico)
                                modal.find('#recipient-codigo2').val(recipientidservico)
                                modal.find('#recipient-descricao').val(recipientdescricao)
                                modal.find('#recipient-quantidade').val(recipientquantidade)
                                modal.find('#recipient-valor').val(recipientvalor)
                            })       
                        </script> 
                       
                       <script>
                            $('#myModalEditar2').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipientidservico = button.data('whateveridservico')
                                var recipientdescricao = button.data('whateverdescricao')
                                var recipientquantidade = button.data('whateverquantidade')
                                var recipientvalor = button.data('whatevervalor')
                            
                                var modal = $(this)
                                modal.find('.modal-title').text('Editar Cliente')
                                modal.find('#recipient-idservico').val(recipientidservico)
                                modal.find('#recipient-codigo2').val(recipientidservico)
                                modal.find('#recipient-descricao').val(recipientdescricao)
                                modal.find('#recipient-quantidade').val(recipientquantidade)
                                modal.find('#recipient-valor').val(recipientvalor)
                            })
                        </script> 
                     </div>
            </section>
            
        </body>
    </html>