$('#upd #celCli').mask('(00) 0 0000-0000');
$('#upd #valFaturar').mask('#.##0,00', {reverse: true});
$('#upd #vlrcomdesconto').mask('#.##0,00', {reverse: true});


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
			var lista='';
			var somaReceita=0;
			$(json).each(function(key, value) {
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
				lista = lista + '<td style="text-align:right;" scope="row">' + formatNumberBR(value.valor) +'</td>';
				lista = lista + '<td style="text-align: center"><span class="btn btn-danger btn-sm w-25 p-0" id="DelTransacao" idItemTransacao="'+value.id+'" title="Excluir '+value.id+'"><i class="far fa-trash-alt"> </span></td>';
				somaReceita = somaReceita + parseFloat(value.valor);
				// dados.push({id: value.id, tipo: value.tipo, descricao:value.descricao, valor:value.valor  });
			});
			lista = lista + '</tr>';
			lista = lista + '<tr>';
			lista = lista + '<td colspan="3" style="text-align: right"><strong>Total:</strong></td>';
			lista = lista + '<td style="text-align: right"><strong>'+somaReceita+'</strong></td>';
			lista = lista + '</tr>';
			lista = lista + '<tr>';
			lista = lista + '	<td colspan="3" style="text-align: right"><strong>Valor da fatura:</strong></td>';
			lista = lista + '	<td style="text-align:right;"> <input class="form-control" style="text-align:right;" class="span12" id="vlrcomdesconto" type="text" name="vlrcomdesconto" value="'+somaReceita.toFixed(2)+'"/> </td>';
			
			lista = lista + '	<td style="text-align:center"> <button class="btn btn-faturar btn-info btn-sm" id="btn-faturar">Faturar</button></td>';
			lista = lista + '</tr>';


			// var dados = JSON.parse(json);
			// jQuery("#AlertUpd").text(lista); 
			// $("#AlertUpd").show();
			retorno = lista;
		},
		error:  function(json) {
		},
		complete:  function(json) {
		},
	});
	return retorno;
}




//$(document).ready(function(){
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
			listMonth: { buttonText: 'Agendados' }
		},
//		defaultDate: '<?php echo date('Y-m-d'); ?>',
		minTime: '08:00:00',
		maxTime: '19:00:00',
		contentHeight: 'auto', //Ajustar conform minTime e Maxtime
//		aspectRatio: 1.3 ,

		defaultView: 'timeGridDay',
		locale: initialLocaleCode,
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


		eventClick:  function(info) {  // when some one click on any event
//			alert('clicou em alterar/excluir');
			$("#AlertUpd").hide();

			endtime = getISODateTime(info.event.end);
			starttime = getISODateTime(info.event.start);

			$('#view #cardheader').text("Detalhes do evento " + info.event.id);
			$('#view #title').html(info.event.title);
			$('#view #celCli').text(info.event.extendedProps.celCli);
			var mywhen = starttime + ' – ' + endtime;
			$('#view #when').text(mywhen);

			$('#upd #when').text(mywhen);
			$('#upd #id').val(info.event.id);
			$('#upd #title').val(info.event.title);
			$('#upd #nomeCli').val(info.event.extendedProps.nomeCli);
			$('#upd #celCli').val(info.event.extendedProps.celCli);
			$('#upd #nomeColab').val(info.event.extendedProps.nomeColab);
			$('#upd #idCli').val(info.event.extendedProps.idCli);
			$('#upd #idColab').val(info.event.extendedProps.idColab);
//			starttime = info.event.start.toLocaleString();
			$('#upd #startTime').val(starttime);
			$('#upd #endTime').val(endtime);

			$('#upd #id').val(info.event.id);
			// $('#upd #modalIdTxt').text("Dados do Evento:"+info.event.id);
			
			$('#visualizar').modal('show');
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
		
		select: function(info) { //Adicionar novo
			if (info.allDay === true) {
				diaInteiro = 1;
			} else {
				diaInteiro = 0;
	//			alert('clicou em novo');
				endtime = getISODateTime(info.end);
				starttime = getISODateTime(info.start);
				var mywhen = starttime + ' – ' + endtime;
				$('#add #startTime').val(starttime);
				$('#add #endTime').val(endtime);
				$('#add #when').text(mywhen);
				$('#add #diaInteiro').val(diaInteiro);
				$('#add #allDay').val(info.allDay);
				$('#cadastrar').modal('show'); 
			};

		},

		events: DIRPAGE+'agenda/ListaTodosEventos', 
			// events: [                {
			// 		id: 100,
			// 		title: 'serviço é corte de cabelo',
			// 		start: '2019-12-18 13:30:00',
			// 		end: '2019-12-18 15:00:00',
			// 	}],
	

	});
	calendar.render();

	// Abrir Editar.
	$('#visualizar #btn-canc-vis').on("click", function(e) {
		$('.form').slideToggle();
		$('.visualizar').slideToggle();
		$("#listaItens").html(GeraTabelaItens($('#upd #id').val()));
	});

	// Abrir Visualizar.
	$('#visualizar #btn-canc-edit').on("click", function(e) {
		$('.visualizar').slideToggle();
		$('.form').slideToggle();
	});

	$(document).on('click', '#DelTransacao', function(event) {
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

	// nome do cliente autocomplete para add
	$('#add #nomeCli').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#add #nomeCli').val();
			$pesquisa = DIRPAGE+'cliente/AutoComplete?nome='+$pesquisa;
			$.getJSON($pesquisa, 
				function(data){
					var dados = [];
					$(data).each(function(key, value) {
						dados.push({label: value.nome, id: value.idCli, celular: value.celular });
					});
					$('#add #nomeCli').autocomplete({ 
						source: dados,
						minLength: 1,
						select: function (event, ui) {
							if (ui.item && ui.item.id) {
								$("#add #nomeCli").val(ui.item.label);
								$("#add #cliId").val(ui.item.id);
								$("#add #celCli").val(ui.item.celular);
								$("#add  #title").text($("#add #nomeColab").val()+"/"+$("#add #nomeCli").val());
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
		$("#add #title").text($("#add #nomeColab").val()+"/"+$("#add #nomeCli").val());
    });

	// nome do cliente autocomplete para update/delete
	$('#upd #nomeCli').on('keyup', function() {
		$('#upd #idCli').val("0");
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
				// .autocomplete( "instance" )._renderItem = function( ul, item ) {
				//     return $( "<li>" )
				// .append( "<div>" + item.label + "<br>" + item.desc + "</div>" )
				// .appendTo( ul );
				// }
			) //getJSON
        };
		$("#upd #title").val($("#upd #nomeColab").val()+"/"+$("#upd #nomeCli").val());
    });



	// nome do colaboradro autocomplete para add
	$('#add #nomeColab').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#add #nomeColab').val();
			$pesquisa = DIRPAGE+'colaborador/AutoComplete?nome='+$pesquisa;
			$.getJSON($pesquisa, 
				function(data){
					var dados = [];
					$(data).each(function(key, value) {
						dados.push({label: value.nome, id: value.idColab });
					});
					$('#add #nomeColab').autocomplete({ 
						source: dados,
						// minLength: 1,
						select: function (event, ui) {
							if (ui.item && ui.item.id) {
								$("#add #nomeColab").val(ui.item.label);
								$("#add #colabId").val(ui.item.id);
								$("#add #title").text($("#add #nomeColab").val()+"/"+$("#add #nomeCli").val());
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
		$("#add #title").text($("#add #nomeColab").val()+"/"+$("#add #nomeCli").val());
    });

	// nome do colaboradro autocomplete para update/delete
	$('#upd #nomeColab').on('keyup', function() {
		$('#upd #idColab').val("0");
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
	

	
	$('#btn-AddItens').on('click', function(e){ // add event submit
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		// alert('Additens');
	 	$url = DIRPAGE+"agenda/SalvaItemTransacao";
		var data = {};
		data.idItemTransacao = 0;
		data.id = $('#upd #id').val(); 
		data.cliId = $('#upd #idCli').val(); 
		data.colabId  = $('#upd #idColab').val(); 
		if ($('#upd #tipoReceita').val() == 's'){
			data.idServ = $('#upd #idReceita').val();  
			data.idProdt = 0;
		} else {
			data.idServ = 0  
			data.idProdt = $('#upd #idReceita').val(); 
		}
		data.valor =  $('#upd #valFaturar').val();
		data.descProdtServ = "Agendamento " + $('#upd #title').val(); 
		// $("#tipoReceita").val();
		// $("#idReceita").val();

		// debugger;
		$.post($url, data)
		.done(function (response) {
			obj = JSON.parse(response);
			if (obj.id) {
				// jQuery("#AlertUpd").html("Item "+json.id+" Excluído com sucesso!");
				// var obj = JSON.parse(response);
				// var myJSON = JSON.stringify(response);
				jQuery("#AlertUpd").html("Item "+obj.id+" incluido com sucesso!"); 
				$("#AlertUpd").show();
				$('#upd #NomeItem').val(''); //limpar depois de adicionar.
				$('#upd #valFaturar').val('0');
				$('#upd #qtdFaturar').val('1');
			}else {
				jQuery("#AlertUpd").html(response); 
				$("#AlertUpd").show();
			}
			$("#listaItens").html(GeraTabelaItens($('#upd #id').val()));
		});
	});

	$('#btn-faturar').on('click', function(e){ // add event submit
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		alert('faturar');
	//	window.open("transacao","janela1","width=800,height=600,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no");

	});
	


	$('#add #addButton').on('click', function(e){ // add event submit
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		var nomeCli = $('#add #nomeCli').val();
		var nomeColab = $('#add #nomeColab').val();
        if(nomeCli != '' && nomeColab != '') {
			var idColab = $('#add #colabId').val();
			if (idColab > 0){
				doSubmit(); // send to form submit function
			} else {
				alert('Escolha um colaborador cadastrado!');
			}
		} else {
			alert('Informe Cliente e Colaborador!');
		}
	});
		
	$('#upd #updateButton').on('click', function(e){ // update event clicked
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

	$('#upd #deleteButton').on('click', function(e){ // delete event clicked
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		doDelete(); //send data to delete function
	});


	$('#NomeItem').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#NomeItem').val();
			$pesquisa = DIRPAGE+'transacao/AutoComplete?search='+$pesquisa;
			$.getJSON($pesquisa, 
				function(data){
					var dados = [];
					$(data).each(function(key, value) {
						dados.push({id: value.id, tipo: value.tipo, label: value.descr, valbase: value.valbase });
						// dados.push({label: value.descr, id: value.id });
					});
					$('#NomeItem').autocomplete({ 
						source: dados,
						// minLength: 1,
						select: function (event, ui) {
							if (ui.item && ui.item.id) {
								$("#NomeItem").val(ui.item.label +"(R$" +ui.item.valbase+")");
								$("#valFaturar").val(ui.item.valbase.replace(".", ","));
								// $("#valFaturar").val(ui.item.valbase); 
								$("#tipoReceita").val(ui.item.tipo);
								$("#idReceita").val(ui.item.id);
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
		$("#visualizar").modal('hide');
		var eventID = $('#upd #id').val();
//		alert(eventID);
		$.ajax({
			url: DIRPAGE+'agenda/excluirEvento',
			data: 'id='+eventID,
			type: "POST",
			success: function(json) {
				if(json == 1) {
					var event = calendar.getEventById( eventID );
					event.remove()	;
					jQuery("#meuAlerta").html("Agenda Excluído com sucesso!");
					$("#meuAlerta").show();
				} else {
					return false;
				}
			}
		});
	}

	function doUpdate(){  // update event 
		// $("#visualizar").modal('hide');
		var eventID = $('#upd #id').val();
		var startTime = $('#upd #startTime').val();
		var endTime   = $('#upd #endTime').val();
		var nomeCli  = $('#upd #nomeCli').val();
		var DescEvento  = $('#upd #title').val();
		var cliId  = $('#upd #idCli').val();
		var celCli  = $('#upd #celCli').val();
		var colabId  = $('#upd #idColab').val();

		var Dados = 'id='+eventID+'&title='+DescEvento+'&start='+startTime+'&end='+endTime+'&cliId='+cliId+'&nomeCli='+nomeCli+'&celCli='+celCli+'&colabId='+colabId;
		// alert("atualizar\n"+Dados);
		$.ajax({
			url: DIRPAGE+'agenda/atualizar',
			data: Dados,
			dataType: "json",
			type: "POST",
			error: function(e) {
				jQuery("#AlertUpd").html(e["responseText"]);
				$("#AlertUpd").show();
			},
			success: function(retorno) {
				// jQuery("#AlertUpd").html(retorno["affected_rows"]);
				jQuery("#AlertUpd").html("Agenda alterado com sucesso!");
				$("#AlertUpd").show();
				// if(retorno["affected_rows"] == 1) { //comentado pois mesmo que usuario não altere nada, devemos fazer o refetch pois pode ser que o usuario tenha alterado o nome do usuario ou o telefone.
					calendar.unselect();
					calendar.refetchEvents();
				// } else {
				// 	return false;
				// }
			}
		});
	}

	function doSubmit(){ // add event
		$("#cadastrar").modal('hide');
		var title = $('#add #title').text();
		var startTime = $('#add #startTime').val();
		var endTime = $('#add #endTime').val();
		var diaInteiro = $('#add #diaInteiro').val();
		var cliId = $('#add #cliId').val();
		var nomeCli = $('#add #nomeCli').val();
		var celCli = $('#add #celCli').val();
		var colabId = $('#add #colabId').val();
		
		var data = 'title='+ encodeURIComponent(title)  
				+ '&start='+ encodeURIComponent(startTime)
				+ '&end='+ encodeURIComponent(endTime)
				+ '&allday='+ encodeURIComponent(diaInteiro)
				+ '&cliId='+ encodeURIComponent(cliId)
				+ '&nomeCli='+ encodeURIComponent(nomeCli)
				+ '&celCli=' + encodeURIComponent(celCli)
				+ '&colabId='+ encodeURIComponent(colabId);
		$.ajax({
			url: DIRPAGE+'agenda/cadastrar',
			data: data,
			type: "POST",
			success: function(json) {
					jQuery("#meuAlerta").html("Evento cadastrado com sucesso!");
					$("#meuAlerta").show();

					// calendar.addEvent({	
					// 	id: json.id,
					// 	title: title,
					// 	start: startTime,
					// 	end: endTime,
					// 	allDay: allDay,
					// 	idCli: cliId,
					// 	idColab: colabId
					// });
					// var event = calendar.getEventById( json.id );
					// event.setExtendedProp(idCli, cliId );
					// event.setExtendedProp( idColab, colabId);
					$('#add #title').text(''); //limpar depois de adicionar.
					$('#add #cliId').val('0'); //limpar depois de adicionar.
					$('#add #colabId').val('0'); //limpar depois de adicionar.
					$('#add #nomeCli').val(''); //limpar depois de adicionar.
					$('#add #celCli').val(''); //limpar depois de adicionar.
					$('#add #nomeColab').val(''); //limpar depois de adicionar.
					calendar.unselect();
					calendar.refetchEvents();
				}
		});
	}	
});
