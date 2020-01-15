        <div class="container" style="background: #ffffff;">
			<h4 align="center">Cadastro de transações</h4>
			<div class="table-responsive">
				<div align="left">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary btn-sm">Adicionar</button>
				</div>
				<!-- <table id="user_data" class="table table-bordered table-striped"> -->
                <table id="user_data" class="table table-striped table-bordered nowrap" style="width:100%">
					<thead>
						<tr > 
                        <!-- id, data, entrada_saida, idAgenda, idCli, idColab, valor, descTransacao -->
							<th width="5%">id</th>
							<th width="5%">E/S</th>
							<th width="10%">Data</th>
							<th width="20%">Transação</th>
							<th width="20%">Cliente</th>
							<th width="20%">Valor</th>
							<th width="10%" style="text-align:center;">Ação</th>
							<th width="10%" style="text-align:center;">Excluir</th>
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
                            <h6 class="modal-title">Adicionar transacao</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <label>Data</label>
                                <input type="text" name="data" id="data" class="form-control" value="<?php echo date('d/m/Y H:i:s') ?>">
                            <br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="entrada_saida" id="entrada" value="e" checked="checked">
                                <label class="form-check-label" for="entrada_saida">Entrada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="entrada_saida" id="saida" value="s">
                                <label class="form-check-label" for="entrada_saida">Saída</label>
                            </div>
                            <br />
                            <br />
                            <label>Cliente</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                            <br />
                            <label>Transação</label>
                                <input type="text" name="descTransacao" id="descTransacao" class="form-control">
                            <br />
                            <label>Valor</label>
                                <input type="text" name="valor" id="valor" class="form-control">
                            <br />
                        </div>
                        <div class="modal-footer">
                            <input type="text" name="id" id="id"/>
                            <input type="text" name="idCli" id="idCli" value=56>
                            <input type="text" name="idAgenda" id="idAgenda" value="0">
                            <input type="text" name="idColab" id="idColab" value=3>
                            <input type="hidden" name="operacao" id="operacao">
                            <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>