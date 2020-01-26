<div class="container" style="background: #ffffff;">
    <div class="row" id="event_list" >
        <div class="col-md-9">
			<div id="calendar"></div>
        </div>        
        <div class="col-md-3">
			Area para incluir o resumo
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
			<div class="modal-dialog modal-lg" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title text-center">Edição de Evento</h6>
						<section id="main-content" class="merge-left">
		                    <!-- <div class="alert alert-info fade show" id="AlertUpd"></div> -->
							<div class="alert alert-warning alert-dismissible fade show" role="alert" id="AlertUpd">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</section>
						<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
					</div>
					<div class="modal-body">
						<div class="visualizar" id="view">
							<div class="card border-info mb-3" style="max-width: auto;">
								<h5> <div class="card-header"  id="cardheader" >Detalhes do Evento</div> </h5> 
								<div class="card-body text-info">
									<h5 class="card-title" id="title">T	ítulo de Card Info</h5>
									<dl class="dl-horizontal">
										<dt id="when">when</dt>
										<dt>Celular do Cliente</dt>
										<dd id="celCli"></dd>
										<!-- <dt>Inicio do Evento</dt>
										<dd id="startTime"></dd>
										<dt>Fim do Evento</dt>
										<dd id="endTime"></dd> -->
									</dl>
								</div>
							</div>
							<!-- <div class="modal-footer"> -->
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
								<button class="btn btn-canc-vis btn-warning btn-sm" id="btn-canc-vis">Editar</button>
							<!-- </div> -->
						</div>
						<div class="form" id="upd">
							<form class="form-horizontal" method="POST">
								<div id="when" class="form-text text-muted">texto</div>
								<div class="form-group row">
									<label for="cliente" class="col-sm-2 control-label">Cliente<span class="required">*</span></label>
									<div class="col-sm-6">
										<input id="nomeCli" class="form-control" type="text" name="nomeCli" value=""  />
									</div>
									<div class="col-sm-4">
									<input type="text" class="form-control" id="celCli" name="celCli" placeholder="Celular">
								</div>
								</div>
								<div class="form-group row">
									<label for="nomeColab" class="col-sm-2 control-label">Colaborador<span class="required">*</span></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nomeColab" id="nomeColab"">
									</div>
								</div> 
								<input type="hidden" class="form-control" id="title" name="title">
								<input type="hidden" class="form-control" name="startTime" id="startTime">
								<input type="hidden" class="form-control" name="startTime" id="startTime">
								<input type="hidden" class="form-control" name="endTime" id="endTime">
								<input type="hidden" class="form-control" name="id" id="id">
								<input type="hidden" class="form-control" name="idCli" id="idCli">
								<input type="hidden" class="form-control" name="idColab" id="idColab">
								<div class="form-group row">
										<div class="col-sm-3">
											<button type="button" class="btn btn-canc-edit btn-secondary btn-sm" id="btn-canc-edit">Voltar</button>
										</div>
										<div class="col-sm-2">
											<button type="submit" class="btn btn-warning btn-sm" id="updateButton">Salvar Agenda</button>
										</div>
										<div class="col-sm-2">
											<button type="submit" class="btn btn-danger btn-sm" id="deleteButton">Excluir Agenda</button>
										</div>
										<div class="col-sm-5" style="text-align:right;">
											<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
										</div>
								</div>
								<?php
								include(DIRREQ."App/View/transacao/Faturar.php");  
								?>
							</form>
						</div>
					</div>
					<!-- <div class="modal-footer">
					</div> -->
				</div>
			</div>
		</div>
		
		<!--Formulario para Adicionar -->
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog  modal-lg" role="document">
				<div class="modal-content" id="add">
					<div class="modal-header">
						<h6 class="modal-title text-center">Agendar Serviço</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="">
							<!-- <div class="form-group row">
								<label for="titulo" class="col-sm-2 control-label" >Titulo</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="title" name="title" readonly placeholder="Colaborador/Cliente">
									<small id="when" class="form-text text-muted">texto</small>
								</div>
							</div> -->
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
                                    <h5> <small  class="form-text text-muted"></small> </h5>
                                </div>
                            </div>
                            <input type="hidden" id="cliId"/>
                            <input type="hidden" id="colabId"/>
                            <input type="hidden" id="startTime"/>
                            <input type="hidden" id="endTime"/>
                            <input type="hidden" id="allDay"/>
                            <input type="hidden" id="diaInteiro"/>
                            <!-- <div class="modal-footer"> -->
							<div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-12">
                                    <button type="submit" class="btn btn-success btn-sm" id="addButton">Cadastrar</button>
                                </div>
                            </div>
						</form>
						<!-- <?php include(DIRREQ."App/View/transacao/Faturar.php"); ?> -->
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

		<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/britecharts/3.0.0/umd/tooltip.min.js.map'></script> -->
        <link href='public/fullcalendar/packages/bootstrap/main.css' rel='stylesheet' />

        <link href='public/css/calendar.css' rel='stylesheet' />
        <script src="public/js/agenda.js"></script>

    </section>
</section>