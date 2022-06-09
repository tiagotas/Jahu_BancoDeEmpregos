$(document).ready(function () 
{
    metodaLoadData({ query_url: 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', data_type: 'script' });
    metodaLoadData({ query_url: '/App/View/Site/js/js.cookie.js', data_type: 'script' });
    metodaLoadData({ query_url: '/App/View/Site/js/jquery.metoda.lgpdcookie.js', data_type: 'script' });
    metodaLoadData({ query_url: 'https://use.fontawesome.com/releases/v5.7.0/css/all.css', data_type: 'script' });
});

function metodaLoadData(e){var t,r={query_url:void 0===e.query_url?null:e.query_url,target_div:void 0===e.target_div?null:e.target_div,data_type:void 0===e.data_type?"html":e.data_type,method:void 0===e.method?"GET":e.method,window_title:void 0===e.window_title?null:e.window_title,window_url:void 0===e.window_url?null:e.window_url};return $.ajax({url:r.query_url,type:r.method,dataType:r.data_type,cache:!0,async:!1,beforeSend:function(){},complete:function(){},success:function(e,o,a){if("text/css; charset=UTF-8"==a.getResponseHeader("Content-Type"))$(document.createElement("link")).attr({type:"text/css",rel:"stylesheet",href:r.query_url}).appendTo($("head"));window.history.pushState("Object",r.window_title,r.window_url),t=e},error:function(e,t,r){alert("Ops, ocorreu um erro durante a requisição. Atualize a página. Erro: "+r)}}),t}