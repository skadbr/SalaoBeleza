
/*
	onload = function () {
		onfocus = function () {
			onfocus = function () {}
			location.reload (true)
		}
	}
*/
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



//$(document).ready(function(){
document.addEventListener('DOMContentLoaded', function() {
	var DIRPAGE=document.location.origin+"/salao/";
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

		defaultView: 'timeGridWeek',
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
			var tooltip = new Tooltip(info.el, {
				title: info.event.text,
				start: info.event.start,
				placement: 'top',
				trigger: 'hover',
				container: 'body'
			});
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
			endtime = getISODateTime(info.event.end);
			starttime = getISODateTime(info.event.start);
//			starttime = info.event.start.toLocaleString();
			
			var mywhen = starttime + ' – ' + endtime;
			$('#visualizar #modalTitleUpd').val(info.event.title);
			$('#visualizar #modalTitle').text(info.event.title);
//			$('#visualizar #modalTitle').val(info.event.extendedProps.client);

			$('#visualizar #modalWhen').text(mywhen);
			$('#visualizar #modalId').val(info.event.id);
			$('#visualizar #modalIdTxt').text("Dados do Evento:"+info.event.id);
			$('#visualizar #startTime').val(starttime);
			$('#visualizar #startTime').text(starttime);
			$('#visualizar #endTime').val(endtime);
			$('#visualizar #endTime').text(endtime);
			$('#visualizar #cliIdUpd').val(info.event.extendedProps.idCli);
			$('#visualizar #nomeCliUpd').val(info.event.extendedProps.nomeCli);
			$('#visualizar #nomeCliTxt').text(info.event.extendedProps.nomeCli);
			$('#visualizar #celCliUpd').val(info.event.extendedProps.celCli);
			$('#visualizar #celCliTxt').text(info.event.extendedProps.celCli);
			$('#visualizar #colabIdUpd').val(info.event.extendedProps.idColab);
			$('#visualizar #nomeColabUpd').val(info.event.extendedProps.nomeColab);
			$('#visualizar #nomeColabTxt').text(info.event.extendedProps.nomeColab);
//			$('#visualizar #modalTitle').trigger('focus');
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
			};
//			alert('clicou em novo');
			endtime = getISODateTime(info.end);
			starttime = getISODateTime(info.start);
			var mywhen = starttime + ' – ' + endtime;
			$('#cadastrar #startTime').val(starttime);
			$('#cadastrar #endTime').val(endtime);
			$('#cadastrar #when').text(mywhen);
			$('#cadastrar #diaInteiro').val(diaInteiro);
			$('#cadastrar #allDay').val(info.allDay);
			$('#cadastrar').modal('show'); 

		},

		events: DIRPAGE+'agenda/ListaTodosEventos', 
			// events: [                {
			// 		id: 100,
			// 		title: 'serviço é corte de cabelo',
			// 		start: '2019-12-18 13:30:00',
			// 		end: '2019-12-18 15:00:00',
			// 	}],
	

	});
	
	// Abrir e fechar modal de visualização e edição.
	$('#visualizar #btn-canc-vis').on("click", function(e) {
		$('.form').slideToggle();
		$('.visualizar').slideToggle();

	});
	$('#visualizar #btn-canc-edit').on("click", function(e) {
		$('.visualizar').slideToggle();
		$('.form').slideToggle();
	});

	// nome do cliente autocomplete para add
	$('#nomeCli').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#nomeCli').val();
			$pesquisa = DIRPAGE+'cliente/AutoComplete?nome='+$pesquisa;
        $.getJSON($pesquisa, 
            function(data){
                var dados = [];
                $(data).each(function(key, value) {
                    dados.push({label: value.nome, id: value.idCli, celular: value.celular });
                });
                $('#nomeCli').autocomplete({ 
                    source: dados,
                    minLength: 2,
                    select: function (event, ui) {
                        if (ui.item && ui.item.id) {
                            $("#nomeCli").val(ui.item.label);
                            $("#cliId").val(ui.item.id);
                            $("#celCli").val(ui.item.celular);
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
    });

	// nome do cliente autocomplete para update/delete
	$('#nomeCliUpd').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#nomeCliUpd').val();
			$pesquisa = DIRPAGE+'cliente/AutoComplete?nome='+$pesquisa;
			$.getJSON($pesquisa, 
				function(data){
					var dados = [];
					$(data).each(function(key, value) {
						dados.push({label: value.nome, id: value.idCli, celular: value.celular });
					});
					$('#nomeCliUpd').autocomplete({ 
						source: dados,
						minLength: 1,
						select: function (event, ui) {
							if (ui.item && ui.item.id) {
								$("#nomeCliUpd").val(ui.item.label);
								$("#cliIdUpd").val(ui.item.id);
								$("#celCliUpd").val(ui.item.celular);
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
    });


	// nome do colaboradro autocomplete para add
	$('#nomeColab').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#nomeColab').val();
			$pesquisa = DIRPAGE+'colaborador/AutoComplete?nome='+$pesquisa;
        $.getJSON($pesquisa, 
            function(data){
                var dados = [];
                $(data).each(function(key, value) {
                    dados.push({label: value.nome, id: value.idColab });
                });
                $('#nomeColab').autocomplete({ 
                    source: dados,
                    minLength: 2,
                    select: function (event, ui) {
                        if (ui.item && ui.item.id) {
                            $("#nomeColab").val(ui.item.label);
                            $("#colabId").val(ui.item.id);
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
    });

	// nome do colaboradro autocomplete para update/delete
	$('#nomeColabUpd').on('keyup', function() {
        var length = $(this).val().length;
        if (length > 1) {
            $pesquisa = $('#nomeColabUpd').val();
			$pesquisa = DIRPAGE+'colaborador/AutoComplete?nome='+$pesquisa;
        $.getJSON($pesquisa, 
            function(data){
                var dados = [];
                $(data).each(function(key, value) {
                    dados.push({label: value.nome, id: value.idColab });
                });
                $('#nomeColabUpd').autocomplete({ 
                    source: dados,
                    minLength: 2,
                    select: function (event, ui) {
                        if (ui.item && ui.item.id) {
                            $("#nomeColabUpd").val(ui.item.label);
                            $("#colabIdUpd").val(ui.item.id);
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
    });
	



	$('#cadastrar #addButton').on('click', function(e){ // add event submit
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		doSubmit(); // send to form submit function
	});
		
	$('#visualizar #updateButton').on('click', function(e){ // update event clicked
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		doUpdate(); //send data to update function
	});

	$('#visualizar #deleteButton').on('click', function(e){ // delete event clicked
		// We don't want this to act as a link so cancel the link action
		e.preventDefault();
		doDelete(); //send data to delete function
	});


	


	function doDelete(){  // delete event 
		$("#visualizar").modal('hide');
		var eventID = $('#visualizar #modalId').val();
//		alert(eventID);
		$.ajax({
			url: DIRPAGE+'agenda/excluirEvento',
			data: 'id='+eventID,
			type: "POST",
			success: function(json) {
				if(json == 1) {
					var event = calendar.getEventById( eventID );
					event.remove()	;
				} else {
					return false;
				}
			}
		});
	}

	function doUpdate(){  // update event 
		$("#visualizar").modal('hide');
		var eventID = $('#visualizar #modalId').val();
		var startTime = $('#visualizar #startTime').val();
		var endTime   = $('#visualizar #endTime').val();
		var DescEvento  = $('#visualizar #modalTitleUpd').val();
		var cliId  = $('#visualizar #cliIdUpd').val();
		var nomeCli  = $('#visualizar #nomeCliUpd').val();
		var celCli  = $('#visualizar #celCliUpd').val();
		var colabId  = $('#visualizar #colabIdUpd').val();
		var Dados = 'id='+eventID+'&title='+DescEvento+'&start='+startTime+'&end='+endTime+'&cliId='+cliId+'&nomeCli='+nomeCli+'&celCli='+celCli+'&colabId='+colabId;
		// alert("atualizar\n"+Dados);
		$.ajax({
			url: DIRPAGE+'agenda/atualizar',
			data: Dados,
			dataType: "json",
			type: "POST",
			error: function(e) {
				jQuery("#meuAlerta").html(e["responseText"]);
				$("#meuAlerta").show();
			},
			success: function(retorno) {
				// jQuery("#meuAlerta").html(retorno["affected_rows"]);
				jQuery("#meuAlerta").html("Evento alterado com sucesso!");
				$("#meuAlerta").show();
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
		var title = $('#cadastrar #title').val();
		var startTime = $('#cadastrar #startTime').val();
		var endTime = $('#cadastrar #endTime').val();
		var diaInteiro = $('#cadastrar #diaInteiro').val();
		var cliId = $('#cadastrar #cliId').val();
		var nomeCli = $('#cadastrar #nomeCli').val();
		var celCli = $('#cadastrar #celCli').val();
		var colabId = $('#cadastrar #colabId').val();
		

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
					$('#cadastrar #title').val(''); //limpar depois de adicionar.
					$('#cadastrar #cliId').val('0'); //limpar depois de adicionar.
					$('#cadastrar #colabId').val('0'); //limpar depois de adicionar.
					$('#cadastrar #nomeCli').val(''); //limpar depois de adicionar.
					$('#cadastrar #celCli').val(''); //limpar depois de adicionar.
					$('#cadastrar #nomeColab').val(''); //limpar depois de adicionar.
					calendar.unselect();
					calendar.refetchEvents();
				}
		});
	}	
	calendar.render();
});
