/*
 *   Desenvolvido por:
 *        METODA
 *    TIAGO A. SILVA
 *   www.metoda.com.br
 */
$(document).ready(function () {
	var cpf = $("#cpf");

	/**
	 * Verificando se  um CPF já foi cadastrado.
	 */
	cpf.blur(function () {
		if (cpf.val() == '') return false;

		$.ajax({
			url: '/trabalhe-conosco/check-cpf?cpf=' + cpf.val(),
			type: 'GET',
			dataType: 'json',
			async: false,
			success: function (data) {
				if (!data.response_successful) {
					alert(data.response_data[0].message);
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Desculpe, ocorreu um erro ao verificar o CPF. Atualize a Página. \n ' + thrownError);
			}
		});
	});


	/**
	 * Obtendo as cidades de um determinado estado.
	 */
	$("#estado").change(function () {
		$.ajax({
			url: '/trabalhe-conosco/cidades-por-estado?estado=' + $(this).val(),
			type: 'GET',
			dataType: 'json',
			async: false,
			success: function (data) 
			{
				if (data.response_successful) 
				{
					var cidades = $("#cidade");
					cidades.empty();

					for (i = 0; i < data.response_data.length; i++)
						cidades.append('<option value="' + data.response_data[i].id + '">' + data.response_data[i].nome + '</option>');
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Desculpe, ocorreu um erro ao obter as cidades. Atualize a Página. \n ' + thrownError);
			}
		});
	});


	$("#form-trabalhe-conosco").submit(function () {
		var cpf = $("#cpf");

		if (cpf.attr('data-invalido') == true) {
			alert('Desculpe, o CPF informado é inválido. Verifique.');
			return false;
		}

		if (cpf.attr('data-duplicado') == true) {
			alert('Desculpe, o CPF informado já foi cadastrado. Verifique.');
			return false;
		}

		var iframe = $("#form-upload");

		iframe.unbind('load').on('load', function () {
			$("#form-returned-data").html(iframe.contents().find('div'));

			$('html,body').animate({ scrollTop: $('header').offset().top }, 200);
		});
	});


	/**
	 * Verificando se o CNPJ já está cadastrado.
	 */
	$("#form-cadastro").submit(function () {

	});
});