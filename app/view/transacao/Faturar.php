								<!--Itens de venda ou serviço  -->
								<hr>
								<div class="form-group row">
									<label for="NomeItem" class="col-sm-1 control-label">Item:<span class="required"></span></label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="NomeItem" id="NomeItem">
										<input type="hidden" class="form-control" name="tipoReceita" id="tipoReceita" value="tipoReceita">
										<input type="hidden" class="form-control" name="idReceita" id="idReceita" value="idReceita">
									</div>
									<label for="valbase" class="col-sm-1 control-label">Vlr Faturar:<span class="required"></span></label>
									<div class="col-sm-3">
										<input class="form-control" style="text-align:right;" class="span12" id="valFaturar" type="text" value="R$ 0,00"/>
									</div>
									<div class="col-sm-2" style="text-align:right;">
                                        <button type="button" class="btn btn-labeled btn-primary btn-sm" id="btn-AddItens">                
                                            <span class="btn-label" >
                                                <i class="fab fa-sellcast"></i>
                                            </span>Adicionar
                                        </button>
									</div>
								</div>
								<div class="form-group">
									<table class="table table-sm table-hover" id="listaReceitas">
										<thead class="thead-light">
											<tr>
											<th scope="col" style="text-align:center;">#</th>
											<th scope="col" style="text-align:left;">Item</th>
											<th scope="col" style="text-align:right;">Valor Base</th>
											<th scope="col" style="text-align:right;">Valor Cobrado</th>
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
