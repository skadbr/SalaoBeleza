<div class="container" style="background: #ffffff;">
	<div class="alert alert-warning fade show" id="AlertAgenda"></div>
    <div class="row" id="event_list" >
        <div class="col-md-10">
			<div id="calendar"></div>
        </div>        
        <div class="col-md-2">
			Filtrar agenda para
			<?php 
			echo "<div class='form-check'>";
			echo "<input class='form-check-input' type='radio' name='idColab' value='0' id='0' checked='checked'>";
			echo "<label class='form-check-label' for='nomecolab'>Todos</label>";
			echo "</div>";

			$colab = new App\Model\ClassColaborador();     
				$r = $colab->ListColab(); 
				// echo '<pre>'; var_dump($r); echo '</pre>';
				foreach ($r as $linha) {
					// var_dump($linha);
					// echo $linha["idColab"].$linha["nome"];

					echo "<div class='form-check'>";
						echo "<input class='form-check-input' type='radio' name='idColab' value='".$linha['idColab']."' id='".$linha['idColab']."'>";
						echo "<label class='form-check-label' for='nomecolab'>".$linha['nome']."</label>";
					echo "</div>";
					
				} 
			?>
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
										<input type="text" class="form-control phone-mask"  id="celCli" name="celCli" placeholder="Celular">
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
									<div class="col-sm-6">
										<div id="when">texto</div>
									</div>
									<div class="col-sm-4" style="text-align:right;">
										<button type="submit" class="btn btn-warning btn-sm" id="updateButton">Salvar</button>
									</div>
								</div> 
								<!-- <div class="form-group row">
									<div class="col-sm-12" style="text-align:right;">
										<button type="submit" class="btn btn-warning btn-sm" id="updateButton">Salvar</button>
									</div>
								</div> -->
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
						<!-- <div class="form-group row"> -->
							<div class="col-sm-2" style="text-align:left;">
								<button type="submit" class="btn btn-danger btn-sm" id="deleteButton">Excluir</button>
							</div>
							<div class="col-sm-8" style="text-align:center;">
							</div>
							<div class="col-sm-2" style="text-align:right;">
								<button type="button" class="btn btn-labeled btn-secondary btn-sm" data-dismiss="modal">
									<span class="btn-label" >
										<i class="fab fa-sellcast"></i>
									</span>Voltar
								</button>
							</div>
						<!-- </div> -->
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