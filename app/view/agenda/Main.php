<div class="container" style="background: #ffffff;">
    <div class="row" id="event_list" >
        <div class="col-md-2">
			Area para incluir o resumo
        </div> 
        <div class="col-md-10">
			<div id="calendar"></div>
        </div>        
    </div> 
	<!--Calendario end-->
		
	<!-- <input type="text" id="esporte" placeholder="Informe um esporte"/> -->

	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#visualizar">
	Abrir modal de demonstração
	</button>
    -->
</div> 

    <section> <!-- Formularios Modal -->
	    <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title text-center">Edição de Evento</h6>
						<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
					</div>
					<div class="modal-body">
						<div class="visualizar">
							<div class="card border-info mb-3" style="max-width: auto;">
								<h5> <div class="card-header"  id="modalIdTxt" >Detalhes do Evento</div> </h5> 
								<div class="card-body text-info">
									<h5 class="card-title" id="modalTitle">Título de Card Info</h5>
									<dl class="dl-horizontal">
										<dt>Inicio do Evento</dt>
										<dd id="startTime"></dd>
										<dt>Fim do Evento</dt>
										<dd id="endTime"></dd>
										<dt>Cliente</dt>
										<dd id="nomeCliTxt"></dd>
										<dt>Celular</dt>
										<dd id="celCliTxt"></dd>
										<dt>Colaborador</dt>
										<dd id="nomeColabTxt"></dd>
									</dl>
								</div>
							</div>
							<!-- <div class="modal-footer"> -->
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
								<button class="btn btn-canc-vis btn-warning btn-sm" id="btn-canc-vis">Editar</button>
								<button class="btn btn-faturar-vis btn-info btn-sm" id="btn-faturar-vis">Faturar</button>
							<!-- </div> -->
						</div>
						<div class="form">
							<form class="form-horizontal" method="POST">
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="modalTitleUpd" id="modalTitleUpd" placeholder="Titulo do Evento">
                                        <small id="modalWhen" class="form-text text-muted">Periodo</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="cliente" class="col-sm-2 control-label">Cliente<span class="required">*</span></label>
									<div class="col-sm-6">
										<input id="nomeCliUpd" class="form-control" type="text" name="nomeCliUpd" value=""  />
										<input id="cliIdUpd" class="span12" type="hidden" name="cliIdUpd" value=""  />
									</div>
									<div class="col-sm-4">
									<input type="text" class="form-control" id="celCliUpd" name="celCliUpd" placeholder="Celular">
								</div>
								</div>
								<div class="form-group row">
									<label for="nomeColabUpd" class="col-sm-2 control-label">Colaborador<span class="required">*</span></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nomeColabUpd" id="nomeColabUpd"">
									</div>
								</div>
								<input type="hidden" class="form-control" name="modalId" id="modalId">
								<!-- <input type="text" class="form-control" name="cliIdUpd" id="cliIdUpd"> -->
								<input type="hidden" class="form-control" name="colabIdUpd" id="colabIdUpd">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
                                        <button type="button" class="btn btn-canc-edit btn-secondary btn-sm" id="btn-canc-edit">Voltar</button>
										<button type="submit" class="btn btn-warning btn-sm" id="updateButton">Salvar Alterações</button>
										<button type="submit" class="btn btn-danger btn-sm" id="deleteButton">Excluir Evento</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--Formulario para Adicionar -->
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title text-center">Agendar Serviço</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="">
							<div class="form-group row">
								<label for="titulo" class="col-sm-2 control-label">Titulo</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="title" name="title" placeholder="Descrição do Serviço">
									<small id="when" class="form-text text-muted">texto</small>
								</div>
							</div>
							<div class="form-group row">
								<label for="NomeCliente" class="col-sm-2 control-label">Cliente<span class="required">*</span></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="nomeCli" name="nomeCli" placeholder="Nome">
									<small class="form-text text-muted"></small>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="celCli" name="celCli" placeholder="Celular">
									<small  class="form-text text-muted"></small>
								</div>
							</div>
                            <div class="form-group row">
								<label for="NomeColaborador" class="col-sm-2 control-label">Colaborador<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nomeColab" name="nomeColab" placeholder="Nome">
                                    <small  class="form-text text-muted"></small>
                                </div>
                            </div>
                            <input type="hidden" id="cliId"/>
                            <input type="hidden" id="colabId"/>
                            <input type="hidden" id="startTime"/>
                            <input type="hidden" id="endTime"/>
                            <input type="hidden" id="allDay"/>
                            <input type="hidden" id="diaInteiro"/>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm" id="addButton">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
    </section>

	<section> <!-- Formularios Modal -->

        <link href='public/fullcalendar/packages/core/main.min.css' rel='stylesheet' />
        <link href='public/fullcalendar/packages/daygrid/main.min.css' rel='stylesheet' />
        <script src='public/fullcalendar/packages/core/main.min.js'></script>
        <script src='public/fullcalendar/packages/daygrid/main.min.js'></script>

        <link href='public/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
        <script src='public/fullcalendar/packages/timegrid/main.js'></script>

        <script src='public/fullcalendar/packages/interaction/main.js'></script>
        <link  href='public/fullcalendar/packages/list/main.css' rel='stylesheet' />
        <script src='public/fullcalendar/packages/list/main.js'></script>

        <script src='public/fullcalendar/packages/core/locales-all.js'></script>
        <script src='public/fullcalendar/packages/bootstrap/main.js'></script>

        <script src='public/popper.min.js'></script>
        <script src='public/tooltip.min.js'></script>
		<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/britecharts/3.0.0/umd/tooltip.min.js.map'></script> -->
        <link href='public/fullcalendar/packages/bootstrap/main.css' rel='stylesheet' />

        <link href='public/css/calendar.css' rel='stylesheet' />
        <script src="public/js/agenda.js"></script>

    </section>
</section>