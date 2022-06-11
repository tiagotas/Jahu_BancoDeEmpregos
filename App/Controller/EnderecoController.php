<?php

namespace App\Controller;

use App\Model\EnderecoModel;
use App\Helpers\String_Utils;

class EnderecoController extends Controller
{
    /**
     * 
     */
    public static function cadastro()
    {
        parent::render('Endereco/form-endereco');
    }


    /**
     * 
     */
    public static function save()
    {
        parent::isProtected();

        $model = new EnderecoModel();

        if($_POST)
        {            
            $model->id_pessoa = parent::getCurrentPessoaId();
            $model->numero = String_Utils::toNumber($_POST['numero']);
            $model->whatsapp = isset($_POST['whatsapp']) ? 'S' : 'N';

            $model->save();
        }

        parent::render('Telefone/form-endereco', $model);
    }

    
    /**
     * 
     */
    public static function delete()
    {
        parent::isProtected();

        if($_POST)
        {
            $model = new EnderecoModel();
        }

        parent::render('Telefone/form-endereco');
    }
}