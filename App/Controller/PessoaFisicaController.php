<?php

namespace App\Controller;

use App\Model\PessoaFisicaModel;

final class PessoaFisicaController extends PessoaController
{    
    public static function checkCPF()
    {
        $model = new PessoaFisicaModel(); 

    }

    public static function cadastro()
    {
        if($_POST)
        {
            $model = new PessoaFisicaModel(); 


        } else {

            parent::render('PessoaFisica/form-cadastro-pf');
        }
    }

    public static function meusDados()
    {
        if($_POST)
        {
            $model = new PessoaFisicaModel(); 


        } else {

            parent::render('Vaga/FormVaga');
        }
    }
}