document.addEventListener('DOMContentLoaded', function() {
	
	var DIRPAGE=document.location.origin+"/SalaoBeleza/";

	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Adicionar Cliente");
		$('#action').val("Salvar");
		$('#operacao').val("Add");
		$('#user_uploaded_image').html('');
	});

	var dataTable = $('#user_data').DataTable({
		"processing":true,
//		"lengthChange": false,
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
		// 			$('.modal-title').text("Adicionar Cliente");
		// 			$('#action').val("Salvar");
		// 			$('#operacao').val("Add");
		// 			$('#user_uploaded_image').html('');
		// 			$('#userModal').modal('show');
		// 		}
        //     }
        // ],

		"ajax":{
			type:"POST",
			url: DIRPAGE+"cliente/buscar",
			error: function(err){  // error handling
                console.log("error", err);
            }		

		},
		"columnDefs":[
			{"targets":[0, 3], "orderable":false, "searchable":false,},
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
		var nome = $('#nome').val();
		var celular = $('#celular').val();
		var etx = $('#imagem_cliente').val().split('.').pop().toLowerCase();
		if(etx != '')
		{
			if(jQuery.inArray(etx, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Formato da imagem inválido");
				$('#imagem_cliente').val('');
				return false;
			}
        }
        if(nome != '' && celular != '')
		{
			$.ajax({
				url: DIRPAGE+"cliente/inserir_alterar",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
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
			alert("Nome e Celular, Obrigatórios");
		}
	});
	
	$(document).on('click', '.update', function(){
		var idCli = $(this).attr("id");
		$.ajax({
			url: DIRPAGE+"cliente/busca_unica",
			method:"POST",
			data:{idCli:idCli},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#nome').val(data.nome);
				$('#celular').val(data.celular);
				$('.modal-title').text("Editar Cliente");
				$('#idCli').val(idCli);
				$('#user_uploaded_image').html(data.imagem_cliente);
				$('#action').val("Salvar");
				$('#operacao').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var idCli = $(this).attr("id");
		if(confirm("Confirma excluir este cliente ?"))
		{
			$.ajax({
				url: DIRPAGE+"cliente/delete",
				method:"POST",
				data:{idCli:idCli},
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
