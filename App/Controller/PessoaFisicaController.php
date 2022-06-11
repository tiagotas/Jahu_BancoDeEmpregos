<?php

namespace App\Controller;

use App\Model\{ PessoaFisicaModel, EnderecoModel, TelefoneModel };

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

            $model->nome = $_POST['nome'];
            $model->rg = $_POST['rg'];
            $model->cpf = $_POST['cpf'];
            $model->genero = $_POST['genero'];
            $model->email = $_POST['email'];
            $model->senha = $_POST['senha'];

            $model_endereco = new EnderecoModel();
            $model_endereco->endereco = $_POST['endereco'];
            $model_endereco->cidade = $_POST['cidade'];
            $model_endereco->bairro = $_POST['bairro'];
            $model_endereco->cep = $_POST['cep'];

            $model_telefone = new TelefoneModel();
            $model_telefone->numero = $_POST['cep'];
            $model_telefone->whatsapp = $_POST['cep'];

            $model->endereco = $model_endereco;
            $model->telefone = $model_telefone;

            $model->save();


        } else {

            parent::render('PessoaFisica/form-cadastro-pf');
        }
    }

    public static function meusDados()
    {
        parent::isPessoaFisica();

        if($_POST)
        {
            $model = new PessoaFisicaModel(); 


        } else {

            parent::render('PessoaFisica/form-meus-dados-pf');
        }
    }


    
}