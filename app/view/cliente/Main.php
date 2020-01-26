        <div class="container" style="background: #ffffff;">
			<h4 align="center">Cadastro de Clientes</h4>
			<div class="table-responsive">
				<!-- <div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary btn-sm">Adicionar</button>
				</div> -->
				<!-- <table id="user_data" class="table table-bordered table-striped"> -->
                <table id="user_data" class="table table-striped table-bordered nowrap" style="width:100%">
					<thead>
						<tr >
							<th width="10%">Foto</th>
							<th width="35%">Cliente</th>
							<th width="35%">Celular</th>
                            <th width="10%" style="text-align:center;"> 
                                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-labeled btn-primary btn-sm tip-top"  title="Adicionar Novo">                
                                    <span class="btn-label">
                                        <i class="fas fa-user-plus"></i>
                                    </span>Adicionar
                                </button>
                            </th>
							<!-- <th width="10%" style="text-align:center;">Excluir</th> --> 
							<!-- <th width="10%" style="text-align:center;">Excluir</th> --> 
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
        <div id="userModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="user_form" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Adicionar Cliente</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <label>Digite Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" />
                            <br />
                            <label>Digite Celular</label>
                            <input type="text" name="celular" id="celular" class="form-control" />
                            <br />
                            <label>Escolha Foto (gif,png,jpg,jpeg)</label>
                            <input type="file" name="imagem_cliente" id="imagem_cliente"  accept="image/png, image/gif, image/jpg, image/jpeg"/>
                            <span id="user_uploaded_image"></span>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="idCli" id="idCli" />
                            <input type="hidden" name="operacao" id="operacao" />
                            <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>