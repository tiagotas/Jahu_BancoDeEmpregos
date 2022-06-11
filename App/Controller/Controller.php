<?php

/**
 * Definição do namespace da controller. Veja que temos o namespace chamado "App"
 * e dentro do namespace App temos o subnamespace "Controller". Também é importante
 * observar que eles são o mesmo caminho de diretórios e usamos barra invertida
 * para definir os namespaces.
 * Leia mais sobre namespaces => http://www.diogomatheus.com.br/blog/php/entendendo-namespaces-no-php/
 * Namespaces no manual => https://www.php.net/manual/pt_BR/language.namespaces.rationale.php
 */
namespace App\Controller;


/**
 * Classe abstrata Controller para armazenar métodos comuns às classes Controller.
 * Manual do PHP => https://www.php.net/manual/pt_BR/language.oop5.abstract.php
 * Leia mais sobre abstração: https://www.devmedia.com.br/trabalhando-com-abstracao-em-php/28351
 */
abstract class Controller 
{
    /**
     * 
     */
    protected static function render($view, $model = null)
    {
        //$arquivo_view = "View/modules/$view.php";
        $arquivo_view = VIEWS . $view . ".php";

        //echo $arquivo_view;

        if(file_exists($arquivo_view))
            include $arquivo_view;
        else
            exit('Arquivo da View não encontrado. Arquivo: ' . $view);
    }


    /**
     * 
     */
    protected static function getCurrentPessoaId()
    {
        return $_SESSION['metoda_autenticated_user']['id'];
    }
    

    /**
     * 
     */
    protected static function isProtected()
    {
        

    }


    /**
     * 
     */
    protected static function isPessoaJuridica()
    {
        self::isProtected();

    }

    
    /**
     * 
     */
    protected static function isPessoaFisica()
    {
        self::isProtected();
        
    }


    /**
     * 
     */
    protected static function isAjax()
    {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strcmp(!strtolower($_SERVER['HTTP_X_REQUESTED_WITH']), 'xmlhttprequest'))
            return true;
        else 
            return false;
    }


    /**
     * 
     */
    protected static function setResponseAsJSON($data, $request_status = true)
    {
        $response = array('response_data' => $data, 'response_successful' => $request_status);

        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        exit(json_encode($response));
    }
}