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

String.prototype.toDate = function(format)
{
  var normalized      = this.replace(/[^a-zA-Z0-9]/g, '-');
  var normalizedFormat= format.toLowerCase().replace(/[^a-zA-Z0-9]/g, '-');
  var formatItems     = normalizedFormat.split('-');
  var dateItems       = normalized.split('-');

  var monthIndex  = formatItems.indexOf("mm");
  var dayIndex    = formatItems.indexOf("dd");
  var yearIndex   = formatItems.indexOf("yyyy");
  var hourIndex     = formatItems.indexOf("hh");
  var minutesIndex  = formatItems.indexOf("ii");
  var secondsIndex  = formatItems.indexOf("ss");

  var today = new Date();

  var year  = yearIndex>-1  ? dateItems[yearIndex]    : today.getFullYear();
  var month = monthIndex>-1 ? dateItems[monthIndex]-1 : today.getMonth()-1;
  var day   = dayIndex>-1   ? dateItems[dayIndex]     : today.getDate();

  var hour    = hourIndex>-1      ? dateItems[hourIndex]    : today.getHours();
  var minute  = minutesIndex>-1   ? dateItems[minutesIndex] : today.getMinutes();
  var second  = secondsIndex>-1   ? dateItems[secondsIndex] : today.getSeconds();

  return new Date(year,month,day,hour,minute,second);
};

function datatimeFormatToInternational(data) {
	// var data = new Date(d);
        var dia  = data.getDate().toString();
        var diaF = (dia.length == 1) ? '0' + dia : dia;
        var mes  = (data.getMonth()+1).toString(); //+1 pois no getMonth() Janeiro começa com zero.
        var mesF = (mes.length == 1) ? '0' + mes : mes;
        var anoF = data.getFullYear();
        var hora = data.getHours();
        var minuto = data.getMinutes();
        var segundos = data.getSeconds();
	return anoF + "-" + mesF + "-" + diaF + " " + hora + ":" + minuto + ":" + segundos;
}

document.addEventListener('DOMContentLoaded', function() {
	
//	var DIRPAGE="http://"+document.location.hostname+":"+document.location.port+"/salao/";
	var DIRPAGE=document.location.origin+"/salao/";

	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Adicionar transação");
		$('#action').val("Salvar");
		$('#operacao').val("Add");
		$('#user_uploaded_image').html('');

	});

	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"lengthChange": false,
		responsive: true,
		"serverSide":true,
		"order":[],
        // dom: 'Bfrtip',
        // buttons: [
        //     {
        //         text: 'Adicionar novo',
        //         action: function ( e, dt, node, config ) {
        //             // alert( 'Button activated' );
		// 			$('#user_form')[0].reset();
		// 			$('.modal-title').text("Adicionar transação");
		// 			$('#action').val("Salvar");
		// 			$('#operacao').val("Add");
		// 			$('#user_uploaded_image').html('');
		// 			$('#userModal').modal('show');
		// 		}
        //     }
        // ],

		"ajax":{
			type:"POST",
			url: DIRPAGE+"transacao/buscar",
            // error: function(err){  // error handling
			// 	jQuery("#meuAlerta").html(err["responseText"]);
			// 	$("#meuAlerta").show();
			// console.log("error", err);
            // }		

		},
		"columnDefs":[
			{
				"targets":[0, 6, 7],
				"orderable":false,
			},

		],

		"oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                },

	});
	new $.fn.dataTable.FixedHeader( dataTable );


	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var data = $('#data').val();
		var data = data.toDate("dd/mm/yyyy hh:ii:ss");
		var data = datatimeFormatToInternational(data);
		// var entrada_saida = $('#entrada_saida').val();

		var radios = document.getElementsByName('entrada_saida');

		for (var i = 0, length = radios.length; i < length; i++) {
			if (radios[i].checked) {
				// do whatever you want with the checked radio
				var entrada_saida = radios[i].value;
				// only one radio can be logically checked, don't check the rest
				break;
			}
		}

		var id = $('#id').val();
		var idAgenda = $('#idAgenda').val();
		var idCli = $('#idCli').val();
		var nome = $('#nome').val();
		var idColab = $('#idColab').val();
		var valor = $('#valor').val();
		var descTransacao = $('#descTransacao').val();
		var operacao = $('#operacao').val();

		var dados = 'data='+ encodeURIComponent(data)  
				 + '&entrada_saida='+ encodeURIComponent(entrada_saida)
				 + '&idAgenda='+ encodeURIComponent(idAgenda)
				 + '&idCli='+ encodeURIComponent(idCli)
				 + '&nome='+ encodeURIComponent(nome)
				 + '&idColab='+ encodeURIComponent(idColab)
				 + '&valor=' + encodeURIComponent(valor)
				 + '&descTransacao='+ encodeURIComponent(descTransacao)
				 + '&operacao='+ encodeURIComponent(operacao)
				 + '&id='+ encodeURIComponent(id);


		if(data != '' && nome != '' && descTransacao != '')
		{
			$.ajax({
				url: DIRPAGE+"transacao/inserir_alterar",
				data:dados,
				type:'POST',
				// data:new FormData(this),
				// contentType:false,
				// processData:false,
				error:function(e){
					jQuery("#meuAlerta").html(e["responseText"]);
					$("#meuAlerta").show();
				},
				success:function(data)
				{
//					alert(data);
					jQuery("#meuAlerta").html(data)
					$("#meuAlerta").show();
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Data, Nome e Transação são Obrigatórios!");
		}
	});
	
	$(document).on('click', '.update', function(){
		var id = $(this).attr("id");
		$.ajax({
			url: DIRPAGE+"transacao/busca_unica",
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				// var data = $('#data').val();
				// var dataTrans = data.data.toDate("dd/mm/yyyy hh:ii:ss");
				// var data = datatimeFormatToInternational(data);
		
				$('#data').val(formatDateBR(data.data));
				$('#entrada_saida').val(data.entrada_saida);
				$('#idAgenda').val(data.idAgenda);
				$('#idCli').val(data.idCli);
				$('#nome').val(data.nome);
				$('#idColab').val(data.idColab);
				$('#valor').val(data.valor);
				$('#descTransacao').val(data.descTransacao);

				$('.modal-title').text("Editar transacao");
				$('#id').val(id);
				$('#action').val("Salvar");
				$('#operacao').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		if(confirm("Confirma excluir este transacao ?"))
		{
			$.ajax({
				url: DIRPAGE+"transacao/delete",
				method:"POST",
				data:{id:id},
				success:function(data)
				{
					// alert(data);
					jQuery("#meuAlerta").html(data)
					$("#meuAlerta").show();
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
