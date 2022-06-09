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
	$("#produtos-form-search").submit(function()
	{
		var search    = $("#search").val();
		var marca     = $("#marca").val();
		var categoria = $("#categoria").val();
		
		var query_string = '?search=' + search + '&marca=' + marca + '&categoria=' + categoria;	

		$("#lista-produtos").hide();
		$("#lista-produtos-status").hide().html("<h3>Carregando...</h3>").fadeIn();
		
		$.ajax({
			url: '/produtos/busca' + query_string,
			type: 'GET',
			dataType: 'html',
			success: function(data) 
			{
				$("#produtos-lista-produtos").hide().html(data).fadeIn();
				
				window.history.pushState('Object', "MG Freios: Busca de Produtos", '/produtos/busca' + query_string);
			},
			error:function(xhr, ajaxOptions, thrownError)
			{
				alert('Ocorreu um erro ao obter a lista de produtos. Atualize a página e tente novamente. \n' + thrownError);									
			}
		});	
		
		return false;	
	});
	
	
	/**
	 * Ajax da lista de marcas para carregar produtos.
	 */
	$("#produtos-lista-marcas li a").click(function()
	{
		var marca  = $(this).attr('data-marca');

		$("#marca").val(marca);
		getCategoriasByMarca(marca);

		$('html,body').animate({scrollTop:$('#produtos-search-bar').offset().top}, 200);

		$("#lista-produtos").hide();
		$("#lista-produtos-status").hide().html("<h3>Carregando...</h3>").fadeIn();
		
		$.ajax({
			url: '/produtos/busca?search=&marca=' + marca + '&categoria=',
			type: 'GET',
			dataType: 'html',
			success: function(data) 
			{
				$("#produtos-lista-produtos").hide().html(data).fadeIn();

				window.history.pushState('Object', "MGFREIOS | Busca de Produtos", '/produtos/busca?search=&marca=' + marca + '&categoria=');
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
	$("#marca").on('change', function()
	{
		var marca = $(this).val();
		
		getCategoriasByMarca($(this).val());
		
		window.history.pushState('Object', "MGFREIOS: Produtos por Marca", '/produtos/busca/marca?marca=' + marca);
	});
	
	
	/**
	 * Função para carregar a lista de categorias de produtos que uma marca tem.
	 */
	function getCategoriasByMarca(marca)
	{
		var categorias = $("#categoria");
			
		categorias.empty();	
		
		categorias.append('<option value="">Carregando...</option>');		
		
		$.ajax({
			url: '/produtos/categoriasByMarcaAsJson?marca=' + marca,
			type: 'GET',
			dataType: 'json',
			success: function(data) 
			{
				categorias.empty();	
				
				categorias.append('<option value="">Selecione a Categoria</option>');
				categorias.append('<option disabled />');
					
				for(var i=0; i<data.length; i++)
					categorias.append('<option value="' + data[i].idCategoria + '">' + data[i].cat_descricao + ' (' + data[i].total_produtos +')</option>');
			},
			error:function(xhr, ajaxOptions, thrownError)
			{
				alert('Ocorreu um erro ao obter a lista de categorias. Atualize a página e tente novamente. \n' + thrownError);									
			}
		});
	}	
});