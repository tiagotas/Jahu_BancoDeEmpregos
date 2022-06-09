<?php

namespace App\Controller;

use App\Model\{ PessoaJuridicaModel, EnderecoModel, TelefoneModel };

final class PessoaJuridicaController extends PessoaController
{
    /**
     * 
     */
    public static function checkCNPJ()
    {
        $model = new PessoaJuridicaModel(); 
    }

    /**
     * 
     */
    public static function cadastro()
    {
        if($_POST)
        {
            $model = new PessoaJuridicaModel(); 

            $model->nome_fantasia = $_POST['nome_fantasia'];
            $model->razao_social = $_POST['razao_social'];
            $model->cnpj = $_POST['cnpj'];
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

            parent::render('PessoaJuridica/form-cadastro-pj');
        }
    }

    /**
     * 
     */
    public static function meusDados()
    {
        if($_POST)
        {
            $model = new PessoaJuridicaModel(); 


        } else {

            parent::render('Vaga/FormVaga');
        }
    }
}