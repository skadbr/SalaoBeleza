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

	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormAgenda">
	Abrir modal de demonstração
	</button>
    -->
</div> 

    <section> <!-- Formularios Modal -->
	    <div class="modal fade" id="modalFormAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog modal-lg" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title text-center" id="modaltitle"></h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form" id="upd">
							<form class="form-horizontal" method="POST">
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
								<div class="form-group row">
									<label for="when" class="col-sm-2 control-label">Agenda para:</label>
									<div class="col-sm-10">
										<div id="when">texto</div>
									</div>
								</div> 
								<!-- Agenda para: <div id="when" class="form-text text-muted">texto</div> -->
								<input type="hidden" class="form-control" id="title" name="title">
								<input type="hidden" class="form-control" id="diaInteiro" name="diaInteiro">
								<input type="hidden" class="form-control" name="startTime" id="startTime">
								<input type="hidden" class="form-control" name="endTime" id="endTime">
								<input type="hidden" class="form-control" name="id" id="id">
								<input type="hidden" class="form-control" name="idCli" id="idCli">
								<input type="hidden" class="form-control" name="idColab" id="idColab">
								<?php
								include(DIRREQ."App/View/transacao/Faturar.php");  
								?>
							</form>
						</div>
						<div class="alert alert-warning fade show" id="AlertUpd"></div>
					</div> 
					<div class="modal-footer">
						<div class="col-sm-4" style="text-align:left;">
							<button type="submit" class="btn btn-warning btn-sm" id="updateButton">Salvar</button>
						</div>
						<div class="col-sm-4" style="text-align:center;">
							<button type="submit" class="btn btn-danger btn-sm" id="deleteButton">Excluir</button>
						</div>
						<div class="col-sm-4"  style="text-align:right;">
							<button type="button" class="btn btn-labeled btn-secondary btn-sm" data-dismiss="modal">
								<span class="btn-label" >
									<i class="fab fa-sellcast"></i>
								</span>Fechar
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--Formulario para Adicionar -->
        <!-- <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog  modal-lg" role="document">
				<div class="modal-content" id="add">
					<div class="modal-header">
						<h6 class="modal-title text-center">Agendar Serviço</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="">
							<div class="form-group row">
								<label for="titulo" class="col-sm-2 control-label" >Titulo</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="title" name="title" readonly placeholder="Colaborador/Cliente">
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
                                    <h5> <small  class="form-text text-muted"></small> </h5>
                                </div>
                            </div>
                            <input type="text" id="title"/>
                            <input type="hidden" id="cliId"/>
                            <input type="hidden" id="colabId"/>
                            <input type="hidden" id="startTime"/>
                            <input type="hidden" id="endTime"/>
                            <input type="hidden" id="allDay"/>
                            <input type="hidden" id="diaInteiro"/>
							<div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-12">
                                    <button type="submit" class="btn btn-success btn-sm" id="addButton">Cadastrar</button>
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div> -->
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