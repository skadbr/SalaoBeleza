								<!--Itens de venda ou serviço  -->
								<div class="form" id="formItens">
									<hr>
									<div class="form-group row">
										<div class="col-sm-6">
										<input class="form-control" type="text"  name="NomeItem" id="NomeItem" placeholder="Produto ou Serviço">
										<small  class="form-text text-muted">Digite o nome do produto ou serviço</small>
										</div>
										<div class="col-sm-3">
											<input  class="form-control" style="text-align:right;" class="span12" id="valFaturar" type="text" value="R$ 0,00"/>
											<small  class="form-text text-muted">Valor que será cobrado</small>
										</div>
										<div class="col-sm-1">
											<input class="form-control"  style="text-align:center;" class="span12" id="qtdFaturar" type="text" value="1"/>
											<small  class="form-text text-muted">Qtd Itens</small>
										</div>
										<div class="col-sm-2"  style="text-align:right;">
											<button type="button" class="btn btn-labeled btn-primary btn-sm" id="btn-AddItens">                
												<span class="btn-label" >
													<i class="fab fa-sellcast"></i>
												</span>Adicionar
											</button>
										</div>
									</div>

									<input type="hidden" name="tipoReceita" id="tipoReceita" value="tipoReceita">
									<input type="hidden" name="idReceita" id="idReceita" value="idReceita">
									<div class="form-group">
										<table class="table table-sm table-hover" id="listaReceitas">
											<thead class="thead-light">
												<tr>
												<th scope="col" style="text-align:center;">#</th>
												<th scope="col" style="text-align:center;">Produto/Serviço</th>
												<th scope="col" style="text-align:left;">Item</th>
												<th scope="col" style="text-align:center;">Qtd</th>
												<th scope="col" style="text-align:right;">R$</th>
												<th scope="col" style="text-align:center;">Ação</th>
												</tr>
											</thead>
											<tbody id="listaItens">
											</tbody>
										</table>
									</div>
									<!-- <div class="form-group row">
											<div class="col-sm-12" style="text-align:right;">
												<button class="btn btn-AddItens btn-info btn-sm" id="btn-faturar">Faturar</button>
											</div>
									</div> -->
								</div>
