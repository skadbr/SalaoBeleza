								<!--Itens de venda ou serviço  -->
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

								<!-- <div class="form-group">
									<label for="NomeItem" class="col-sm-1 control-label">Item:<span class="required"></span></label>
									<div class="col-sm-4">
										<input type="text"  name="NomeItem" id="NomeItem">
									</div>
									<label for="valbase" class="col-sm-1 control-label">Valor:<span class="required"></span></label>
									<div class="col-sm-2">
										<input  style="text-align:right;" class="span12" id="valFaturar" type="text" value="R$ 0,00"/>
									</div>
									<label for="qtdFaturar" class="col-sm-1 control-label">Qtd:<span class="required"></span></label>
									<div class="col-sm-1">
										<input  style="text-align:center;" class="span12" id="qtdFaturar" type="text" value="1"/>
									</div>
									<div class="col-sm-2" style="text-align:right;">
										<button type="button" class="btn btn-labeled btn-primary btn-sm" id="btn-AddItens">                
											<span class="btn-label" >
												<i class="fab fa-sellcast"></i>
											</span>Adicionar
										</button>
									</div>
								</div> -->
								<input type="hidden" name="tipoReceita" id="tipoReceita" value="tipoReceita">
								<input type="hidden" name="idReceita" id="idReceita" value="idReceita">
								<div class="form-group">
									<table class="table table-sm table-hover" id="listaReceitas">
										<thead class="thead-light">
											<tr>
											<th scope="col" style="text-align:center;">#</th>
											<th scope="col" style="text-align:center;">Produto/Serviço</th>
											<th scope="col" style="text-align:left;">Item</th>
											<th scope="col" style="text-align:right;">R$Venda</th>
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
