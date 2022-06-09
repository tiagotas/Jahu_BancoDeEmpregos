/*
 *   Desenvolvido por:
 *        METODA
 *    TIAGO A. SILVA
 *   www.metoda.com.br
 */
$(document).ready(function()
{
	$(".logout").on('click', function()
	{
		//$('.modal-body').html("Tem certeza que deseja sair?");
		//$('#cadastro-modal').modal("show");

		//if(!)


		if(!confirm("Tem certeza que deseja sair?"))
		{
			return false;
		}
	});

	$(".send").on('click', function()
	{
		if(!confirm("Tem certeza que deseja enviar? Já adicionou todos os produtos que precisa?"))
		{
			return false;
		}
	});



	/**
	 * Rotina para remover itens do orçamento.
	 */
	$(".item-delete").click(function()
	{
		var item_orcamento = $(this);
		
		if(confirm('Tem certeza que deseja remover ' + item_orcamento.attr('data-codigo') + ' do orçamento?'))
		{
			$.ajax({
					url: '/orcamento/item/remove?produto=' + item_orcamento.attr('data-produto'),
					type: 'GET',
					success: function(data) 
					{
						/* Removendo a linha da tabela */
						var tr    = item_orcamento.parent().parent();
						var tbody = tr.parent();
						
						tr.remove();
						
						if(tbody.has('tr').length == 0)
						{
							tbody.append('<tr><td colspan="4">Não há itens no seu orçamento. Navegue no site e adicione produtos.</td></tr>');
							$(".send").hide();
							$(".add-more").removeClass("float-left").html("ADICIONAR PRODUTOS");
							$(".itens-orcamento").html("Itens no Orçamento (0)");
						} else
							$(".send").show();
						
					},
					error:function(xhr, ajaxOptions, thrownError)
					{
						alert('Ocorreu um erro ao remover o item do orçamento. ' + thrownError);									
					}
			});
		}
		
		return false;
	});
	
	
	/**
	 * Rotina para editar itens do orçamento.
	 */	
	$(".item-edit").click(function()
	{		
		var item_orcamento = $(this);
		var item_p_qnt     = $("#orcamento-qnt-item-" + item_orcamento.attr('data-produto'));
		
		var input_qnt = $('<input>').attr('type','number')
									.attr('value', item_p_qnt.attr('data-quantidade'))
									.attr('class', 'input-white')
									.css('width', '40px')
									.keypress(function(e)
									{
										if(e.which == 13)
        									$(this).blur();
									})
									.blur(function()
									{
										var current_input = $(this);
										
										if(isNaN(current_input.val()))
										{
											alert('Digite uma quantidade.');
											current_input.select();
											return false;
										}
										
										if(current_input.val() == '')
											current_input.val(0)										
										
										item_p_qnt.html(current_input.val()); // Definindo o valor exibido conforme o digitado.
										item_p_qnt.attr('data-quantidade', current_input.val()) // Valor do atributo também
										
										
										/**
										 * Ajax para atualizar o item do orçamento.
										 */
										$.ajax({
											url: '/orcamento/item/edit?produto=' + item_orcamento.attr('data-produto') + '&quantidade=' + current_input.val(),
											type: 'GET',
											error:function(xhr, ajaxOptions, thrownError)
											{
												alert('Ocorreu um erro ao remover o item do orçamento. ' + thrownError);									
											}
										});
									});
									
		item_p_qnt.html('');
		item_p_qnt.append(input_qnt);
		input_qnt.select(); // Seleciona o conteúdo do input
		
		return false;
	});	
});


/**
 * Rotina de envio do formulário de satisfação do cliente.
 */
function enviarFormularioSatisifacaoCliente()
{
	$("#form-satisfacao-cliente").submit(function()
	{	
		/* Atendimento */
	   if($("input[name=atendimento_cortesia]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a cortesia do nosso atendimento.');
		  return false;
	   }
	   
	   if($("input[name=atendimento_eficiencia]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a eficiencia do nosso atendimento.');
		  return false;
	   }
	   
	   if($("input[name=atendimento_entrega]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a entrega (serviços da transportadora).');
		  return false;
	   }
	   
	   if($("input[name=atendimento_prazo_entrega]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para o prazo de entrega.');
		  return false;
	   }
	   
	   if($("input[name=atendimento_pos_venda]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para o pós venda.');
		  return false;
	   }
	   
	   /* Produto */
	   if($("input[name=produto_apresentacao]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a apresentação do nosso produto.');
		  return false;
	   }
	   
	   if($("input[name=produto_embalagem]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a embalagem dos produtos.');
		  return false;
	   }
	   
	   if($("input[name=produto_forma_pagamento]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para as formas de pagamento oferecidas.');
		  return false;
	   }
	   
	   if($("input[name=produto_preco]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para o preço dos produtos.');
		  return false;
	   }
	   
	   if($("input[name=produto_pos_venda]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para o pós venda dos produtos.');
		  return false;
	   }
	   
	   
	   /* Imagem */
	   if($("input[name=imagem_divulgacao]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a divulgação da nossa imagem.');
		  return false;
	   }
	   
	   if($("input[name=imagem_credibilidade]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a credibilidade da nossa imagem.');
		  return false;
	   }
	   
	   /* Competencia */
	  if($("input[name=competencia_capacidade_pessoal]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a capacidade pessoal dos funcionários da MG Freios.');
		  return false;
	   }
	   
	   if($("input[name=competencia_adaptabilidade]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a adaptabilidade da empresa.');
		  return false;
	   }
	   
	   if($("input[name=competencia_atualizacao]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a atualização dos produtos e serviços.');
		  return false;
	   }
	   
	   if($("input[name=competencia_qualidade]").is(':checked') == false)
	   {
		  alert('Por favor, dê uma avaliação para a qualidade dos produtos e serviços.');
		  return false;
	   }
	   
	   alert("Muito obrigado por participar da pesquisa!");
	});
}