/*
 *   Desenvolvido por:
 *        METODA
 *    TIAGO A. SILVA
 *   www.metoda.com.br
 */
$(document).ready(function()
{
	var cnpj = $("#cnpj");
	var email = $("#email");
	var cpf = $("#cpf");
	var data_nascimento = $("#data_nascimento");
	var senha_confirmacao = $("#senha_confirmacao");

	/**
	 * Verifica se a confirmação da senha corresponde a senha.
	 */
	senha_confirmacao.blur(function()
	{
		if(senha_confirmacao.val() == '') return false;

		var senha = $("#senha");

		if(senha_confirmacao.val() == senha.val())
		{
			senha_confirmacao.removeClass('is-invalid');
			senha.removeClass('is-invalid');

			senha_confirmacao.addClass('is-valid');
			senha.addClass('is-valid');

		} else {

			senha_confirmacao.addClass('is-invalid');
			senha.addClass('is-invalid');

			senha_confirmacao.removeClass('is-valid');
			senha.removeClass('is-valid');
		}
	});


	/**
	 * Verificando se a data de nascimento é válida
	 */
	data_nascimento.blur(function()
	{
		if(data_nascimento.val() == '') return false;
					
		$.ajax({
			url: '/cadastro/pessoa-fisica/check-data-nascimento?data_nascimento=' + data_nascimento.val(),
			type: 'GET',
			dataType: 'json',
			async: false,
			success: function(data) 
			{
				if (!data.response_successful) 
				{
					$('.modal-body').html(data.response_data[0].message);
					$('#cadastro-modal').modal("show");

					data_nascimento.addClass('is-invalid');
					data_nascimento.removeClass('is-valid');

					data_nascimento.focus();

				} else {
					data_nascimento.removeClass('is-invalid');
					data_nascimento.addClass('is-valid');
				}				
			},
			error:function(xhr, ajaxOptions, thrownError)
			{
				alert('Desculpe, ocorreu um erro ao verificar o CNPJ. Atualize a Página. \n ' + thrownError);									
			}
		});
	});

	/**
	 * Verificando se o E-Mail já está cadastrado.
	 */
	email.blur(function()
	{
		if(email.val() == '') return false;
					
		$.ajax({
			url: '/cadastro/check-email?email=' + email.val(),
			type: 'GET',
			dataType: 'json',
			async: false,
			success: function(data) 
			{
				if (!data.response_successful) 
				{
					//$('.modal-body').html(data.response_data[0].message);
					//$('#cadastro-modal').modal("show");

					email.addClass('is-invalid');
					email.removeClass('is-valid');

					//email.focus();

				} else {
					email.removeClass('is-invalid');
					email.addClass('is-valid');
				}				
			},
			error:function(xhr, ajaxOptions, thrownError)
			{
				alert('Desculpe, ocorreu um erro ao verificar o CNPJ. Atualize a Página. \n ' + thrownError);									
			}
		});
	});

	
	/**
	 * Verificando se  um CPF já foi cadastrado.
	 */
	cpf.blur(function () 
	{
		if (cpf.val() == '') return false;

		$.ajax({
			url: '/cadastro/pessoa-fisica/check-cpf?cpf=' + cpf.val(),
			type: 'GET',
			dataType: 'json',
			async: false,
			success: function (data) {
				if (!data.response_successful) 
				{
					$('.modal-body').html(data.response_data[0].message);
					$('#cadastro-modal').modal("show");

					cpf.addClass('is-invalid');
					cpf.removeClass('is-valid');

					cpf.focus().select();

				} else {
					cpf.addClass('is-valid');
					cpf.removeClass('is-invalid');
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Desculpe, ocorreu um erro ao verificar o CPF. Atualize a Página. \n ' + thrownError);
			}
		});
	});

	
	/**
	 * Verificando se o CNPJ já está cadastrado.
	 */
	cnpj.blur(function()
	{
		if(cnpj.val() == '') return false;
					
		$.ajax({
			url: '/cadastro/pessoa-juridica/check-cnpj?cnpj=' + cnpj.val(),
			type: 'GET',
			dataType: 'json',
			async: false,
			success: function(data) 
			{
				if (!data.response_successful) 
				{
					$('.modal-body').html(data.response_data[0].message);
					$('#cadastro-modal').modal("show");

					cnpj.addClass('is-invalid');
					cnpj.removeClass('is-valid');

					cnpj.focus().select();

				} else {
					cnpj.addClass('is-valid');
					cnpj.removeClass('is-invalid');
				}				
			},
			error:function(xhr, ajaxOptions, thrownError)
			{
				alert('Desculpe, ocorreu um erro ao verificar o CNPJ. Atualize a Página. \n ' + thrownError);									
			}
		});
	});
	
	
	/**
	 * Obtendo as cidades de um determinado estado.
	 */
	$("#estado").change(function()
	{
		$.ajax({
			url: '/cadastro/cidades-por-estado?estado=' + $(this).val(),
			type: 'GET',
			dataType: 'json',
			async: false,
			success: function(data) 
			{
				if (data.response_successful) 
				{
					var cidades = $("#cidade");
					cidades.empty();

					for (i = 0; i < data.response_data.length; i++)
						cidades.append('<option value="' + data.response_data[i].id + '">' + data.response_data[i].nome + '</option>');
				}				
			},
			error:function(xhr, ajaxOptions, thrownError)
			{
				alert('Desculpe, ocorreu um erro ao obter as cidades. Atualize a Página. \n ' + thrownError);									
			}
		});
	});
});