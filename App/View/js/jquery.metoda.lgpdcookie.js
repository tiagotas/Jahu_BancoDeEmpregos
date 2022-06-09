$(document).ready(function () {

    if (Cookies.get('spartansfit_accept_cookie') !== 'true')
        $('.toast').toast('show');
    else
        $('.toast').remove();

    $('.lgpd-prosseguir').click(function () {
        Cookies.set('spartansfit_accept_cookie', 'true', { expires: 30 })
        $('.toast').remove();
    });
});