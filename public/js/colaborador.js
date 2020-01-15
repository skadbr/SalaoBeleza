document.addEventListener('DOMContentLoaded', function() {
	
    //	var DIRPAGE="http://"+document.location.hostname+":"+document.location.port+"/salao/";
        var DIRPAGE=document.location.origin+"/salao/";
    
        $('#add_button').click(function(){
            $('#user_form')[0].reset();
            $('.modal-title').text("Adicionar colaborador");
            $('#action').val("Salvar");
            $('#operacao').val("Add");
            $('#user_uploaded_image').html('');
        });
    
        var dataTable = $('#user_data').DataTable({
            "processing":true,
            responsive: true,
            "serverSide":true,
            "order":[],
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Adicionar novo',
                    action: function ( e, dt, node, config ) {
                        // alert( 'Button activated' );
                        $('#user_form')[0].reset();
                        $('.modal-title').text("Adicionar colaborador");
                        $('#action').val("Salvar");
                        $('#operacao').val("Add");
                        $('#user_uploaded_image').html('');
                        $('#userModal').modal('show');
                    }
                }
            ],

            "ajax":{
                type:"POST",
                url: DIRPAGE+"colaborador/buscar",
                error: function(err){  // error handling
                    console.log("error", err);
                }		
    
            },
            "columnDefs":[
                {
                    "targets":[0, 3, 4],
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
            var nome = $('#nome').val();
            var celular = $('#celular').val();
            var etx = $('#imagem_colaborador').val().split('.').pop().toLowerCase();
            if(etx != '')
            {
                if(jQuery.inArray(etx, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Formato da imagem inválido");
                    $('#imagem_colaborador').val('');
                    return false;
                }
            }
            if(nome != '' && celular != '')
            {
                $.ajax({
                    url: DIRPAGE+"colaborador/inserir_alterar",
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        // alert(data);
                        jQuery("#meuAlerta").html(data)
                        // $('#meuAlerta').text(data);
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
            var idColab = $(this).attr("id");
            $.ajax({
                url: DIRPAGE+"colaborador/busca_unica",
                method:"POST",
                data:{idColab:idColab},
                dataType:"json",
                success:function(data)
                {
                    $('#userModal').modal('show');
                    $('#nome').val(data.nome);
                    $('#celular').val(data.celular);
                    $('.modal-title').text("Editar colaborador");
                    $('#idColab').val(idColab);
                    $('#user_uploaded_image').html(data.imagem_colaborador);
                    $('#action').val("Salvar");
                    $('#operacao').val("Edit");
                }
            })
        });
        
        $(document).on('click', '.delete', function(){
            var idColab = $(this).attr("id");
            if(confirm("Confirma excluir este colaborador ?"))
            {
                $.ajax({
                    url: DIRPAGE+"colaborador/delete",
                    method:"POST",
                    data:{idColab:idColab},
                    success:function(data)
                    {
                        // alert(data);
                        jQuery("#meuAlerta").html(data)
                        // $('#meuAlerta').text(data);
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
    