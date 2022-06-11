<?php

namespace App\Controller;

use App\Model\VagaModel;

final class VagaController extends Controller
{
    /**
     * 
     */
    public static function index()
    {      
        $model = new VagaModel(); 
        $model->getAllRows();

        parent::render('Vaga/ListaVaga', $model);
    }


    /**
     * 
     */
    public static function cadastro()
    {
        parent::isProtected();

        $model = new VagaModel(); 

        if($_POST)
        {
            $model->id =  isset($_POST['id']) ? $_POST['id'] : null;
            $model->nome = $_POST['nome'];
            $model->cpf = $_POST['cpf'];
            $model->data_nascimento = $_POST['data_nascimento'];
     
            $model->save(); 

        } else {

            if(isset($_GET['id'])) 
                $model = $model->getById( (int) $_GET['id']);            
        }

        parent::render('Vaga/form-cadastro-vaga', $model);
    }


    /**
     * 
     */
    public static function ver()
    {      
        $model = new VagaModel(); 
        $model->getAllRows();

        parent::render('Pessoa/ListaPessoa', $model);
    }


    /**
     * 
     */
    public static function candidatar()
    {
        parent::isProtected();

        $model = new VagaModel(); 
        $model->getAllRows();

        parent::render('Pessoa/ListaPessoa', $model);
    }


    /**
     * 
     */
    public static function delete()
    {
        parent::isProtected();
        
        $model = new VagaModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /vagas"); // redirecionando o usuário para outra rota.
    }  
}