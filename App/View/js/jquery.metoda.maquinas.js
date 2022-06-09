/*
 *   Desenvolvido por:
 *        METODA
 *    TIAGO A. SILVA
 *   www.metoda.com.br
 */
$(document).ready(function()
{
	/**
	 * Botão voltar com ajax.
	 */
	window.onpopstate = function(e) 
	{
		if(e.state)
			window.location.reload();
	};
	
	
	/**
	 * Foca o cursor do mouse caso tenha passado a enfase (ancora) na barra de enderecos
	 */
		 if(window.location.hash)
	 	$("#search").focus();
	
	
	/**
	 * Ajax da pesquisa de produtos.
	 */	
	$("#maquinas-form-search").submit(function()
	{
		var search    = $("#search").val();
		var linha     = $("#linha").val();
		var categoria = $("#categoria").val();
		
		var query_string = '?search=' + search + '&linha=' + linha + '&categoria=' + categoria;	

		$("#lista-produtos").hide();
		$("#lista-produtos-status").hide().html("<h3>Carregando...</h3>").fadeIn();
		
		$.ajax({
			url: '/produtos/maquinas/busca' + query_string,
			type: 'GET',
			dataType: 'html',
			success: function(data) 
			{
				$("#produtos-lista-produtos").hide().html(data).fadeIn();
				
				window.history.pushState('Object', "SpartansFit: Busca de Máquinas", '/produtos/maquinas/busca' + query_string);
			},
			error:function(xhr, ajaxOptions, thrownError)
			{
				alert('Ocorreu um erro ao obter a lista de produtos. Atualize a página e tente novamente. \n' + thrownError);									
			}
		});	
		
		return false;	
	});
	
	
	
	
	
	/**
	 * Alterando as categorias conforme a seleção da Marca.
	 */
	$("#linha").on('change', function()
	{
		var linha = $(this).val();
		
		getCategoriasByLinha($(this).val());
		
		window.history.pushState('Object', "SpartansFit: Máquinas por Linha", '/produtos/maquinas/busca?linha=' + linha);
	});
	
	
	/**
	 * Função para carregar a lista de categorias de produtos que uma marca tem.
	 */
	function getCategoriasByLinha(linha)
	{
		var categorias = $("#categoria");
			
		categorias.empty();	
		
		categorias.append('<option value="">Carregando...</option>');		
		
		$.ajax({
			url: '/produtos/maquinas/categoriasByLinhaAsJson?linha=' + linha,
			type: 'GET',
			dataType: 'json',
			success: function(data) 
			{
				categorias.empty();	
				
				categorias.append('<option value="">Selecione a Categoria</option>');
				categorias.append('<option disabled />');
					
				for(var i=0; i<data.length; i++)
					categorias.append('<option value="' + data[i].id + '">' + data[i].descricao + ' (' + data[i].total_maquinas +')</option>');
			},
			error:function(xhr, ajaxOptions, thrownError)
			{
				alert('Ocorreu um erro ao obter a lista de categorias. Atualize a página e tente novamente. \n' + thrownError);									
			}
		});
	}	
});