<?php

namespace App\Model;

use App\DAO\PessoaDAO;

class PessoaFisicaModel extends PessoaModel
{
    public $id_pessoa_fisica, $nome, $data_nascimento, $cpf, $genero;

    
    /**
     * 
     */
    public function save()
    {
        $dao = new PessoaDAO(); 

        if(empty($this->id_pessoa))
        {
            $dao->insertPessoaFisica($this);

        } else {

            //$dao->update($this); 
        }        
    }
}