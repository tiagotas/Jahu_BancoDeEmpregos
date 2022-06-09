/*
 *   Desenvolvido por:
 *        METODA
 *    TIAGO A. SILVA
 *   www.metoda.com.br
 */
$(document).ready(function() 
{	

	$('.mask-cnpj').mask('99.999.999/9999-99').on('focus click', function()
	{
		$(this)[0].setSelectionRange(0, 0);
	});
	
	$('.mask-cpf').mask('999.999.999-99').on('focus click', function()
	{
		$(this)[0].setSelectionRange(0, 0);
	});
	
	$('.mask-cep').mask('99.999-999').on('focus click', function()
	{
		$(this)[0].setSelectionRange(0, 0);
	});

	$('.mask-telefone-fixo').mask('(99) 9999-9999').on('focus click', function()
	{
		$(this)[0].setSelectionRange(0, 0);
	});
	
	$('.mask-telefone').mask('(99) 9 9999-999?9').on('focus click', function()
	{
		$(this)[0].setSelectionRange(0, 0);
	});
	
	$('.mask-date').mask('99/99/9999').on('focus click', function()
	{
		$(this)[0].setSelectionRange(0, 0);
	});		
});

