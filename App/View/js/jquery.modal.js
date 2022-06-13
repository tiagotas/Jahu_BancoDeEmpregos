$(document).ready(function(){     
    $(document).on('click', '#getEmployee', function(e){  
    e.preventDefault();  
    var idUsuario = $(this).data('idUsuario');

    $('#employee_data-loader').show();  
    
    $.ajax({
         url: 'empData.php',
         type: 'POST',
         data: 'idUsuario='+idUsuario,
         dataType: 'json',
         cache: false
    })
    .done(function(data){
         console.log(data.nome);
         $('#employee-detail').hide();
         $('#employee-detail').show();
         $('#idUsuario').html(data.id);
         $('#nome').html(data.nome);
         $('#login').html(data.login);
         $('#nivel').html(data.nivel);
         $('#employee_data-loader').hide();
    })
    .fail(function(){
         $('#employee-detail').html('Erro, Tente Novamente...');
         $('#employee_data-loader').hide();
    });
   });  
     
});