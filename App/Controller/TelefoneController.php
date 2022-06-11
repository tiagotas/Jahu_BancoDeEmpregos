<?php

namespace App\Controller;

use App\Model\TelefoneModel;
use App\Helpers\String_Utils;

class TelefoneController extends Controller
{
    /**
     * 
     */
    public static function cadastro()
    {
        parent::isProtected();

        $model = new TelefoneModel();

        if($_POST)
        {            
            $model->id_pessoa = parent::getCurrentPessoaId();
            $model->numero = String_Utils::toNumber($_POST['numero']);
            $model->whatsapp = isset($_POST['whatsapp']) ? 'S' : 'N';

            $model->save();
        }

        parent::render('Telefone/form-telefone', $model);
    }


    /**
     * 
     */
    public static function save()
    {
        parent::isProtected();

        if($_POST)
        {
            $model = new TelefoneModel();
        }

        parent::render('Telefone/form-telefone');
    }

    /**
     * 
     */
    public static function delete()
    {
        parent::isProtected();

        if($_POST)
        {
            $model = new TelefoneModel();
        }

        parent::render('Telefone/form-telefone');
    }
}