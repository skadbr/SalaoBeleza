
/*
	onload = function () {
		onfocus = function () {
			onfocus = function () {}
			location.reload (true)
		}
	}
*/
function formatNumberBR(num){
	return (new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(num));
}

function formatDateBR(d){
	// padding function
	var s = function(p){
		return (''+p).length<2?'0'+p:''+p;
	};
	
	// default parameter
	if (typeof d === 'undefined'){
		var d = new Date();
	};
	var d = new Date(d);
	// return BR datetime format
	return	s(d.getDate()) + '/' +	
		    s(d.getMonth()+1) + '/' +
	        d.getFullYear() + ' ' +
		    s(d.getHours()) + ':' +
		    s(d.getMinutes()) + ':' +
		    s(d.getSeconds());
}

function getISODateTime(d){
	// padding function
	var s = function(p){
		return (''+p).length<2?'0'+p:''+p;
	};
	
	// default parameter
	if (typeof d === 'undefined'){
		var d = new Date();
	};
	// return ISO datetime
	return d.getFullYear() + '-' +
		s(d.getMonth()+1) + '-' +
		s(d.getDate()) + ' ' +	
		s(d.getHours()) + ':' +
		s(d.getMinutes()) + ':' +
		s(d.getSeconds());
}

function AtualizarAgenda(info){
	$("#AlertUpd").hide();
	if (info.allDay === true) {
		diaInteiro = 1;
	} else {
		diaInteiro = 0;
	}
	var endtime = getISODateTime(info.end);
	var starttime = getISODateTime(info.start);
	var mywhen = starttime + ' – ' + endtime;
	$('#upd #diaInteiro').val(diaInteiro);
	$('#upd #when').text(mywhen);
	$('#upd #startTime').val(starttime);
	$('#upd #endTime').val(endtime);
	if (info.id){ // usuario clicou num evento já existente
		$('#upd #id').val(info.id);
		$('#upd #title').val(info.title);
		$('#upd #nomeCli').val(info.extendedProps.nomeCli);
		$('#upd #celCli').val(info.extendedProps.celCli);
		$('#upd #nomeColab').val(info.extendedProps.nomeColab);
		$('#upd #idCli').val(info.extendedProps.idCli);
		$('#upd #idColab').val(info.extendedProps.idColab);
		document.getElementById('modaltitle').innerText = 'Editar Evento ' + info.id;		
		// document.getElementById('deleteButton').style.display = "block";

		itens = GeraTabelaItens($('#upd #id').val())
	
		$("#listaItens").html(itens);
		$('#formItens').css("display","block");
		$('#deleteButton').css("display","block");
	} else { //evento novo
		$('#upd #id').val(0);
		$('#upd #title').val('');
		$('#upd #nomeCli').val('');
		$('#upd #celCli').val('');
		$('#upd #nomeColab').val('');
		$('#upd #idCli').val(0);
		$('#upd #idColab').val(0);
		document.getElementById('modaltitle').innerText = 'Adicionar Novo Evento';		
		// document.getElementById('deleteButton').style.display = "none";
		$("#listaItens").html("");
		jQuery("#AlertUpd").html("Informe os dados do cliente e colaborador");
		$("#AlertUpd").show();
		$('#formItens').css("display","none");
		$('#deleteButton').css("display","none");
		// jQuery("#AlertUpd").html("Adicione os itens de faturamento");
		// $("#AlertUpd").show();
	}
	// $('.modalFormAgenda').css("display","block");
	$('#modalFormAgenda').modal('show');

}


function GeraTabelaItens(idAgenda){
	// var DIRPAGE=document.location.origin+"/SalaoBeleza/";
	$url = document.location.origin+"/SalaoBeleza/agenda/listaItensAgenda";
	var retorno;
	var data = {};
	data.id = idAgenda;
	$.ajax({
		method: "POST",
		dataType: "json",
		async:false,
		url: $url,
		data: data,
		success:  function(json) {
			// var dados = [];
			if (json.status == "ok"){
				// var lista='<script> $(".money-mask").mask("#.##0,00",{reverse:!0}); </script> \n';
				var lista='';
				var somaReceita=0;
				$(json.dados).each(function(key, value) {
					lista = lista + '<tr>';
					lista = lista + '<th style="text-align:center;" scope="row">' + value.id +'</th>';
					tipo = value.tipo;
					if (value.tipo == 'p'){
						tipo = 'Produto';
					}
					if (value.tipo == 's'){
						tipo = 'Serviço';
					}
					lista = lista + '<td style="text-align:center;" scope="row">' + tipo +'</td>';
					lista = lista + '<td style="text-align:left;" scope="row">#'+value.idProdServ+' '+value.descricao + '</td>';
					lista = lista + '<td style="text-align:center;" scope="row">'+value.qtd+'</td>';
					lista = lista + '<td style="text-align:right;" scope="row">' + formatNumberBR(value.valor * value.qtd) +'</td>';
					lista = lista + '<td style="text-align: center"><span class="btn btn-danger btn-sm w-25 p-0" id="DelTransacao" idItemTransacao="'+value.id+'" title="Excluir '+value.id+'"><i class="far fa-trash-alt"> </span></td>';
					somaReceita = somaReceita + parseFloat(value.valor * value.qtd);
				})
				// dados.push({id: value.id, tipo: value.tipo, descricao:value.descricao, valor:value.valor  });
				lista = lista + '</tr>';
				// lista = lista + '<tr>';
				// lista = lista + '<td colspan="4" style="text-align: right"><strong>Total:</strong></td>';
				// lista = lista + '<td style="text-align: right"><strong>'+formatNumberBR(somaReceita)+'</strong></td>';
				// lista = lista + '</tr>';
				lista = lista + '<tr>';
				lista = lista + '	<td colspan="4" style="text-align: right"><strong>Total Faturar:</strong></td>';
			    lista = lista + '	<td> <input class="form-control money-mask" style="text-align:right;" class="span12" id="TotalValFaturar" type="text" value="'+formatNumberBR(somaReceita.toFixed(2))+'"/> </td>';
				lista = lista + '	<td style="text-align:center"> <button class="btn btn-faturar btn-info btn-sm" id="btn-faturar">Faturar</button></td>';
				lista = lista + '</tr>';


				// var dados = JSON.parse(json);
				// jQuery("#AlertUpd").text(lista); 
				// $("#AlertUpd").show();
				retorno = lista;
			}else{
				jQuery("#AlertUpd").text('Adicione os itens de faturamento'); 
				$("#AlertUpd").show();
				retorno = '';
			}
		},
		error:  function(json) {
			// var dados = JSON.parse(json);
			jQuery("#AlertUpd").text(json.responseText); 
			$("#AlertUpd").show();

		}
			// complete:  function(json) {
		// 	// var dados = JSON.parse(json);
		// 	jQuery("#AlertUpd").text(json.responseJSON.msg); 
		// 	$("#AlertUpd").show();

		// },
	});
	return retorno;
}






document.addEventListener('DOMContentLoaded', function() {

	var DIRPAGE=document.location.origin+"/SalaoBeleza/";
//	alert(DIRPAGE);
	var initialLocaleCode = 'pt-br';

	var calendarEl = document.getElementById('calendar');
	var calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list','bootstrap' ],
		themeSystem: 'bootstrap',		
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
		},
		views: {
			listMonth: { buttonText: 'Agendados' },
		},
//		defaultDate: '<?php echo date('Y-m-d'); ?>',
		minTime: '08:00:00',
		maxTime: '19:00:00',
		contentHeight: 'auto', //Ajustar conform minTime e Maxtime
//		aspectRatio: 1.3 ,
		allDayText: 'Vendas ou\nPagamentos',
		defaultView: 'timeGridDay',
		buttonIcons: false, // show the prev/next text
		weekNumbers: false,
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		selectMirror: false,
		selectable: true,
		businessHours: false, // display business hours
		nowIndicator: true,


        eventRender: function(info) {
			// var tooltip = new Tooltip(info.el, {
			// 	title: info.event.text,
			// 	start: info.event.start,
			// 	placement: 'top',
			// 	trigger: 'hover',
			// 	container: 'body'
			// });
			if (moment(info.event.end) < moment()){
                info.el.style.backgroundColor  = "#adadad";
                info.el.style.borderColor ="#adadad";
            } else {
                info.el.style.backgroundColor  = "#6a49fc";
				info.el.style.borderColor ="#6a49fc";
				info.el.style.color = "#ffffff";
			}
			id = info.event.id;
			// idCli = info.event.extendedProps.idCli;
			// nomeCli = info.event.extendedProps.nomeCli;
			// idColab = info.event.extendedProps.idColab;
			// nomeColab = info.event.extendedProps.nomeColab;
			// alert("id:"+id+" idcli:"+idCli+" odColab:"+idColab);
        },

		// dayRender: function(dayRenderInfo ) {
		// 	dayRenderInfo.el.innerHTML = "Hllo World"; 
		// 	var today = moment();
		// 	// var end = moment().add(7, 'days');
		// 	// if (date.get('date') == today.get('date')) {
		// 	diaCalendar = dayRenderInfo;  
		// 	hoje = today._d;
		// 	// if (diaCalendar.toString('date') == today.get('date')) {
		// 		dayRenderInfo.el.backgroundColor = "#e8e8e8";
		// 			// cell.css("background", "#e8e8e8");
		// 	// }
		// },





		select: function(info) { //Adicionar novo
			AtualizarAgenda(info);
		},


		eventClick:  function(info) {  //alert('clicou em alterar/excluir');
			AtualizarAgenda(info.event);
		},

		eventDrop: function(info) {
	//			if (!confirm("ok?")) {
	//			  info.revert();
	//			} else {
				$.ajax({
					url: DIRPAGE+'agenda/atualizar',
					data: 'title='+info.event.title+'&start='+getISODateTime(info.event.start)+'&end='+getISODateTime(info.event.end)+'&id='+info.event.id +'&cliId='+info.event.extendedProps.idCli +'&celCli='+info.event.extendedProps.celCli +'&colabId='+info.event.extendedProps.idColab,
					type: "POST",
					success: function(response) {
						if (!response == 1) {
							alert('Erro movendo\nEvento Revertido.' );
							info.revert();
						} /*else {
							alert('Sucesso movendo.' );
							return false;
						}*/
					},
				});
	//			}
		},
		
		eventResize: function(info) {
	//			if (!confirm("ok?")) {
	//			  info.revert();
	//			} else {
				$.ajax({
					url: DIRPAGE+'agenda/atualizar',
					data: 'title='+info.event.title+'&start='+getISODateTime(info.event.start)+'&end='+getISODateTime(info.event.end)+'&id='+info.event.id +'&cliId='+info.event.extendedProps.idCli +'&celCli='+info.event.extendedProps.celCli +'&colabId='+info.event.extendedProps.idColab,
					type: "POST",
					success: function(response) {
						if (!response == 1) {
							alert('Erro alterando tamanho\nEvento Revertido.' );
							info.revert();
						} /*else {
							alert('Sucesso.' );
							return false;
						}*/
					},
				});
	//			}
		},		
		
		// events: DIRPAGE+'agenda/ListaTodosEventos', 

	});
	calendar.render();

    $("#modalFormAgenda").on('shown.bs.modal', function(){
		$(".date-mask").mask("00/00/0000");
		$(".time-mask").mask("00:00:00");
		$(".date-time-mask").mask("00/00/0000 00:00:00");
		$(".cep-mask").mask("00000-000");
		$(".phone-mask").mask("0000-0000");
		$(".phone-ddd-mask").mask("(00) 0000-0000");
		$(".cel-sp-mask").mask("(00) 00009-0000");
		$(".mixed-mask").mask("AAA 000-S0S");
		$(".cpf-mask").mask("000.000.000-00",{reverse:!0});
		$(".money-mask").mask("#.##0,00",{reverse:!0});
		if ($('#upd #id').val() > 0) {
			$('#modalFormAgenda').find('#formItens #NomeItem').focus();
		} else {
			$('#modalFormAgenda').find('#upd #nomeCli').focus();
		}
		$('#formItens #qtdFaturar').val('1');	
	});

	$(document).on('click', '.form-check', function(event) {
		// event.preventDefault();
		var radios = document.getElementsByName('idColab');
		for (var i = 0, length = radios.length; i < length; i++) {
			if (radios[i].checked) {
				// do whatever you want with the checked radio
				var idColab = radios[i].value;
				// only one radio can be logically checked, don't check the rest
				break;
			}
		}
		// alert('clicou '+idColab);
		var eventSources = calendar.getEventSources(); 
		var len = eventSources.length;
		for (var i = 0; i < len; i++) { 
			eventSources[i].remove(); 
		};

		$url = DIRPAGE+'agenda/ListaTodosEventos';
		var dados = {};
		dados.colabId = idColab;
		$.ajax({
			method: "POST",
			dataType: "json",
			// async:false,
			url: $url,
			data: dados,
            complete:  function(jqXHR, textStatus) {
                if (textStatus !== "success"){
                    $("#AlertAgenda").html('Status:'+textStatus+'<br>'+jqXHR.responseText);
                    $("#AlertAgenda").show();
					return false;
                }
                $("#AlertAgenda").html('Status:'+textStatus);
                $("#AlertAgenda").show();
				calendar.addEventSource( jqXHR.responseJSON );
				calendar.unselect();
				calendar.refetchEvents();
			// var out = '';
            //     for (var i in jqXHR.responseJSON.dados) {
            //         out += 'linha '+i + ": " + jqXHR.responseJSON.dados[i].id + "\n";
            //     }
            //     // $("#retorno").text('Linhas afetadas:'+jqXHR.responseJSON.result.numrows + '\n'+out);
            },

		});






	});


	$(document).on('click', '#DelTransacao', function(event) {
		event.preventDefault();
		// alert('Excluir ' + idTransacao);
		$url = DIRPAGE+"agenda/ExcluiItemTransacao";
		var data = {};
		data.idItemTransacao = $(this).attr('idItemTransacao');
		$.ajax({
			method: "POST",
			dataType: "json",
			// async:false,
			url: $url,
			data: data,
			success:  function(json) { //json = {id: "12"}
				jQuery("#AlertUpd").html("Item "+json.id+" Excluído com sucesso!");
				$("#AlertUpd").show();
				$("#listaItens").html(GeraTabelaItens($('#upd #id').val()));
			},
			error:  function(json) {
				// jQuery("#AlertUpd").html(json.responseText);
				// $("#AlertUpd").show();
			},
			complete:  function(json) {
				// jQuery("#AlertUpd").html(json.responseText);
				// $("#AlertUpd").show();
			},		
		});
	});

	// nome do cliente autocomplete para update/delete
	$('#upd #nomeCli').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#upd #nomeCli').val();
			$pesquisa = DIRPAGE+'cliente/AutoComplete?nome='+$pesquisa;
			$.getJSON($pesquisa, 
				function(data){
					// jQuery("#AlertUpd").html(data); 
					// $("#AlertUpd").show();
					var dados = [];
					$(data).each(function(key, value) {
						dados.push({label: value.nome, id: value.idCli, celular: value.celular });
					});
					if (dados.length == 1){
						if (dados[0].label  !== $('#upd #nomeCli').val()){
							$('#upd #idCli').val(0);
							$('#upd #celCli').val("");
						}else{
							$('#upd #idCli').val(dados[0].id);
							$('#upd #celCli').val(dados[0].celular);
						};
					};
					$('#upd #nomeCli').autocomplete({ 
						source: dados,
						// minLength: 1,
						select: function (event, ui) {
							if (ui.item && ui.item.id) {
								$("#upd #nomeCli").val(ui.item.label);
								$("#upd #idCli").val(ui.item.id);
								$("#upd #celCli").val(ui.item.celular);
								$("#upd #title").val($("#upd #nomeColab").val()+"/"+$("#upd #nomeCli").val());
								jQuery("#AlertUpd").html("Cliente Ok!"); 
								$("#AlertUpd").show();
								return false;
							}   
						},
					});
				}
			) //getJSON
        };
		$("#upd #title").val($("#upd #nomeColab").val()+"/"+$("#upd #nomeCli").val());
    });


	// nome do colaboradro autocomplete para update/delete
	$('#upd #nomeColab').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#upd #nomeColab').val();
			$pesquisa = DIRPAGE+'colaborador/AutoComplete?nome='+$pesquisa;
			$.getJSON($pesquisa, 
				function(data){
					var dados = [];
					$(data).each(function(key, value) {
						dados.push({label: value.nome, id: value.idColab });
					});
					if (dados.length == 1){
						if (dados[0].label  !== $('#upd #nomeColab').val()){
							$('#upd #idColab').val(0);
						}else{
							$('#upd #idColab').val(dados[0].id);
						};
					};
					$('#upd #nomeColab').autocomplete({ 
						source: dados,
						// minLength: 1,
						select: function (event, ui) {
							if (ui.item && ui.item.id) {
								$("#upd #nomeColab").val(ui.item.label);
								$("#upd #idColab").val(ui.item.id);
								$("#upd #title").val($("#upd #nomeColab").val()+"/"+$("#upd #nomeCli").val());
								jQuery("#AlertUpd").html("Colaborador Ok!");
								$("#AlertUpd").show();
								return false; 
							}   
						},
					});
				}
				// .autocomplete( "instance" )._renderItem = function( ul, item ) {
				//     return $( "<li>" )
				// .append( "<div>" + item.label + "<br>" + item.desc + "</div>" )
				// .appendTo( ul );
				// }
			) //getJSON
        };
		$("#upd #title").val($("#upd #nomeColab").val()+"/"+$("#upd #nomeCli").val());
    });
	

	
	$('#btn-AddItens').on('click', function(e){ 
		e.preventDefault();
		// alert('Additens');
	 	$url = DIRPAGE+"agenda/SalvaItemTransacao";
		var data = {};
		data.idItemTransacao = 0;
		data.id = $('#upd #id').val(); 
		data.cliId = $('#upd #idCli').val(); 
		data.colabId  = $('#upd #idColab').val(); 
		if ($('#formItens  #tipoReceita').val() == 's'){
			data.idServ = $('#formItens  #idReceita').val();  
			data.idProdt = 0;
		} else {
			data.idServ = 0  
			data.idProdt = $('#formItens #idReceita').val(); 
		}
		data.valor =  $('#formItens #valFaturar').val();
		data.qtd =  $('#formItens #qtdFaturar').val();
		data.descProdtServ = "Agendamento " + $('#upd #title').val(); 
		// $("#tipoReceita").val();
		// $("#idReceita").val();

		// debugger;
		$.post($url, data)
		.done(function (response) {
			obj = JSON.parse(response);
			if (obj.id) {
				jQuery("#AlertUpd").html("Item "+obj.id+" incluido com sucesso!");
				$("#AlertUpd").show();
				$('#formItens #NomeItem').val(''); //limpar depois de adicionar.
				$('#formItens #valFaturar').val('');
				$('#formItens #qtdFaturar').val('1');
			}else {
				jQuery("#AlertUpd").html(response); 
				$("#AlertUpd").show();
			}
			$("#listaItens").html(GeraTabelaItens($('#upd #id').val()));
			$('#modalFormAgenda').find('#formItens #NomeItem').focus();
		});
	});

	$(document).on('click', '#btn-faturar', function(event) {
		event.preventDefault();
		jQuery("#AlertUpd").html("Faturar R$ "+$('#formItens #TotalValFaturar').val());
		$("#AlertUpd").show();
		// ajax para faturar aqui, dpeois zerar TotalValFaturar
			// $('#formItens #TotalValFaturar').val(0);
	});
	
	$("#modalFormAgenda").on("hide.bs.modal", function () {
		$(this)
		.find("input,textarea,select")
		   .val('')
		   .end()
		.find("input[type=checkbox], input[type=radio]")
		   .prop("checked", "")
		   .end();		// put your default event here
	});


	
	// $("#modalFormAgenda").on("show.bs.modal", function() {
	// 	if ($('#upd #id').val() > 0) {
	// 		jQuery("#mainAlerta").html("Insira os itens de faturamento");
	// 		$("#mainAlerta").show();
	// 		$('#formItens').css("display","block");
	// 		// document.getElementById("btn-AddItens").disabled = false;
	// 	}else {
	// 		jQuery("#mainAlerta").html("Informe os dados do cliente e colaborador");
	// 		$("#mainAlerta").show();
	// 		$('#formItens').css("display","none");
	// 		// document.getElementById("btn-AddItens").disabled = true;
	// 	} //display: block
	// });
	

	$('.modal-content #updateButton').on('click', function(e){ // update event clicked
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		var nomeCli = $('#upd #nomeCli').val();
		var nomeColab = $('#upd #nomeColab').val();
        if(nomeCli != '' && nomeColab != '') {
			var idColab = $('#upd #idColab').val();
			if (idColab > 0){
				// $("#upd #title").val($("#upd #nomeColab").val()+"/"+$("#upd #nomeCli").val());
				doUpdate(); //send data to update function
			} else {
				alert('Escolha um colaborador cadastrado!');
			}
		} else {
			alert('Informe Cliente e Colaborador!');
		}
	});

	$('#deleteButton').on('click', function(e){ // delete event clicked
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		doDelete(); //send data to delete function
	});


	$('#formItens #NomeItem').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#formItens #NomeItem').val();
			$pesquisa = DIRPAGE+'transacao/AutoComplete?search='+$pesquisa;
			$.getJSON($pesquisa, 
				function(data){
					var dados = [];
					$(data).each(function(key, value) {
						dados.push({id: value.id, tipo: value.tipo, label: value.descr, valbase: value.valbase });
						// dados.push({label: value.descr, id: value.id });
					});
					$('#formItens #NomeItem').autocomplete({ 
						source: dados,
						// minLength: 1,
						select: function (event, ui) {
							if (ui.item && ui.item.id) {
								$("#formItens #NomeItem").val(ui.item.label +"(R$" +ui.item.valbase+")");
								$("#formItens #valFaturar").val(ui.item.valbase.replace(".", ","));
								// $("#valFaturar").val(ui.item.valbase); 
								$("#formItens #tipoReceita").val(ui.item.tipo);
								$("#formItens #idReceita").val(ui.item.id);
								// jQuery("#AlertUpd").html("Receita Ok!"); 
								// $("#AlertUpd").show();
								return false;
							}
						},
					});
				}
			) //getJSON
        };
    });


	function doDelete(){  // delete event 
		var eventID = $('#upd #id').val();
//		alert(eventID);
		$.ajax({
			url: DIRPAGE+'agenda/excluirEvento',
			data: 'id='+eventID,
			type: "POST",
			error: function(e) {
				jQuery("#AlertUpd").html(e["responseText"]);
				$("#AlertUpd").show();
			},
			success: function(json) {
				obj = JSON.parse(json);
				if(obj.deletedId) {
					var event = calendar.getEventById( eventID );
					event.remove()	;
					jQuery("#mainAlerta").html("Agenda #"+eventID+" excluído com sucesso!");
					$("#mainAlerta").show();
				} else {
					jQuery("#mainAlerta").html("Agenda #"+eventID+" Algo errado ocorreu!");
					$("#mainAlerta").show();
				}
				$("#modalFormAgenda").modal('hide');

			}
			// complete:  function(json) {
			// 	jQuery("#mainAlerta").html("Agenda #"+eventID+" algum problema!");
			// 	$("#mainAlerta").show();
			// }
		});
	}

	function doUpdate(){  // update event 
		// $("#modalFormAgenda").modal('hide');
		var eventID = $('#upd #id').val();
		var startTime = $('#upd #startTime').val();
		var endTime   = $('#upd #endTime').val();
		var diaInteiro = $('#upd #diaInteiro').val();
		var nomeCli  = $('#upd #nomeCli').val();
		var DescEvento  = $('#upd #title').val();
		var cliId  = $('#upd #idCli').val();
		var celCli  = $('#upd #celCli').val();
		var colabId  = $('#upd #idColab').val();

		var Dados = 'id='+eventID+'&title='+DescEvento+'&allday='+diaInteiro  +'&start='+startTime+'&end='+endTime+'&cliId='+cliId+'&nomeCli='+nomeCli+'&celCli='+celCli+'&colabId='+colabId;
		// alert("atualizar\n"+Dados);
		$.ajax({
			url: DIRPAGE+'agenda/atualizar',
			data: Dados,
			dataType: "json",
			type: "POST",
            complete:  function(jqXHR, textStatus) {
                if (textStatus !== "success"){
                    $("#AlertUpd").html('Status:'+textStatus+'<br>'+jqXHR.responseText);
                    $("#AlertUpd").show();
                    return false;
				}
				if (jqXHR.responseJSON.insertedId) {
					jQuery("#AlertUpd").html("Agenda #" +jqXHR.responseJSON.insertedId+" gravada com sucesso!");
					$('#upd #id').val(jqXHR.responseJSON.insertedId);
					document.getElementById('modaltitle').innerText = 'Editar Evento ' + jqXHR.responseJSON.insertedId;		
				}
				if (jqXHR.responseJSON.updatedId) {
					jQuery("#AlertUpd").html("Agenda #" +jqXHR.responseJSON.updatedId+" atualizada com sucesso!");
				} 
				$("#AlertUpd").show();
				$('#formItens').css("display","block");
				calendar.unselect();
				calendar.refetchEvents();
			}
		});
	}

});
