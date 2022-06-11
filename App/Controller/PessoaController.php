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

        $model->checkEmail($_GET['email']);

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
        if($_POST)
        {
            $model = new PessoaModel();
            
            if($model->login())
                header("Location: /");
        }

        parent::render('Login/form-login');
    }


    /**
     * 
     */
    final public static function logout()
    {
        $model = new PessoaModel(); 

        $model->logout();

        header("Location: /");
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
    final public static function recuperarSenha()
    {
        if($_POST)
        {
            $model = new PessoaModel(); 


        }

        parent::render('Login/form-esqueci-senha');
    }

    /**
     * [OK] Obtém a lista de cidades de acordo com um estado.
     */
    public static function cidadesByEstado()
    {
        $model = new CadastroModel();

        $cidades = $model->getCitiesByState($_GET['estado']);

        parent::setResponseAsJSON($cidades);
    }

    
    /**
     * [OK] Define qual área de atuação está selecionada em caso de validação do formulário.
     */
    public static function setTelefoneWhatsappCheck($model_value)
    {
        return ($model_value == 'S') ? 'checked' : '';
    }


    /**
     * [OK] Define qual área de atuação está selecionada em caso de validação do formulário.
     */
    public static function setSexoSelected($sexo, $model_value)
    {
        return ($sexo == $model_value) ? 'selected' : '';
    }


    /**
     * [OK] Define qual área de atuação está selecionada em caso de validação do formulário.
     */
    public static function setPrivacyPolicyCheck($model_value)
    {
        return (!empty($model_value)) ? 'checked' : '';
    }
}