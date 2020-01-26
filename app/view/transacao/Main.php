        <div class="container" style="background: #ffffff;">
			<h4 align="center">Cadastro de transações</h4>
			<div class="table-responsive">
				<!-- <div class="col-sm-12" align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary btn-sm">Adicionar</button>
				</div> -->
				<!-- <table id="user_data" class="table table-bordered table-striped"> -->
                <table id="user_data" class="table table-striped table-bordered nowrap" style="width:100%">
					<thead>
						<tr > 
                        <!-- id, data, entrada_saida, idAgenda, idCli, idColab, valor, descTransacao -->
							<th width="5%" style="text-align:center;">#</th>
							<th width="5%" style="text-align:center;">Entrata/Saída</th>
							<th width="10%">Data</th>
							<th width="20%">Transação</th>
							<th width="20%">Cliente</th>
							<th width="20%" style="text-align:right">Valor</th>
                            <th width="20%" style="text-align:center;"> 
                                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-labeled btn-primary btn-sm tip-top"  title="Adicionar Novo">                
                                    <span class="btn-label">
                                        <i class="fas fa-user-plus"></i>
                                    </span>Adicionar
                                </button>
                            </th>
<!-- 
                            <th width="20%" style="text-align:center;">Ação <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-labeled btn-primary btn-sm tip-top" title="Adicionar Novo">+</button></th> -->
							<!-- <th width="10%" style="text-align:center;">Excluir</th><i class="fas fa-user-plus"></i> --> 
						</tr>
					</thead>
				</table>
			</div>
		</div>

        <hr/>
        <div class="container" style="background: #ffffff;">
			<!-- <h4 align="center">Detalhes da transação</h4> -->
			<div class="table-responsive">
                 <?php include_once(DIRREQ."App/View/transacao/Faturar.php"); ?>
//                 Aqui vai form para inclusão de serviços e produtos.
            </div>
        </div>



        <div id="userModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form method="post" id="user_form" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Adicionar transacao</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!-- <label>Data</label>
                                <input type="text" name="data" id="data" class="form-control" value="<?php echo date('d/m/Y H:i:s') ?>">
                            <br /> -->
                            <label>Transação</label>
                                <input type="text" name="descTransacao" id="descTransacao" class="form-control">
                                <small id="data" class="form-text text-muted"><?php echo date('d/m/Y H:i:s') ?></small>
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
							<div class="form-group row">
								<label for="NomeCliente" class="col-sm-2 control-label">Cliente<span class="required">*</span></label>
								<div class="col-sm-5 ui-front" > <!-- ui-front necessário para autocomplete em modal-->
									<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
									<small class="form-text text-muted"></small>
								</div>
								<div class="col-sm-5">
                                    <input type="text" name="celCli" id="celCli" class="celCli form-control" placeholder="(xx) 9 xxxx-xxxx" style="width: 150px; display:inline-block" data-enpassusermodified="yes">
									<small  class="form-text text-muted"></small>
								</div>
							</div>
                            <!-- <input type="text" name="telefone" class="telefone form-control" placeholder="(17) 9 9173-3578" />
                            <input type="text" id="dinheiro" name="dinheiro" class="dinheiro form-control" placeholder="Digite um valor" style="width: 150px; display:inline-block" data-enpassusermodified="yes">
                            <input type="text" id="estado" name="estado" class="estado form-control" placeholder="UF" /> -->
                            <!-- <label for="valor" class="col-sm-2 control-label">R$<span class="required"></span></label> -->
							<div class="form-group row">
                                <label for="valorTransacao" class="col-sm-2 control-label">R$<span class="required"></span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="valor" class="valor form-control" id="valor" placeholder="0.000,00" style="width: 150px; display:inline-block" data-enpassusermodified="yes">
								</div>
							</div>
                            <br />
                        </div>
                        <div class="modal-footer">
                            <input type="text" name="id" id="id" placeholder="id value=0"/>
                            <input type="hidden" name="idCli" id="idCli" placeholder="icCli" value = 0>
                            <input type="text" name="idAgenda" id="idAgenda" placeholder="idAgenda" value =0>
                            <input type="text" name="idColab" id="idColab" placeholder="idColab" value =0>
                            <input type="hidden" name="operacao" id="operacao">
                            <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>