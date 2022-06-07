<?php

namespace App\Controller;

use App\Model\PessoaModel;

class PessoaController extends Controller
{
    /**
     * 
     */
    public static function checkEmail()
    {
        $model = new PessoaModel(); 

        $model->checkCPF($_GET['cpf']);

        if($model->hasValidationErrors()) 
        {
            $errors = $model->getValidationErrors();

            parent::setResponseAsJSON($errors, false);         
        } else
            parent::setResponseAsJSON(null, true);

    } 
    
    /**
     * 
     */
    final public static function login()
    {
        $model = new PessoaModel(); 

    }


    /**
     * 
     */
    public static function logout()
    {
        $model = new PessoaModel(); 

    }


    /**
     * 
     */
    public static function delete()
    {
        $model = new PessoaModel(); 

    }


    /**
     * 
     */
    public static function recuperarSenha()
    {
        if($_POST)
        {
            $model = new PessoaModel(); 


        } else {

            parent::render('Vaga/FormVaga');
        }
    }
}