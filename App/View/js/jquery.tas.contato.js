/*
 *   Desenvolvido por:
 *        METODA
 *    TIAGO A. SILVA
 *   www.metoda.com.br
 */
$(document).ready(function()
{
	$("#form-contato").submit(function()
	{
		var iframe = $("#form-upload");

		iframe.unbind('load').on('load', function()
		{
			$("#form-returned-data").html(iframe.contents().find('div'));

			$('html,body').animate({scrollTop:$('header').offset().top}, 200);
		});
	});
	
});