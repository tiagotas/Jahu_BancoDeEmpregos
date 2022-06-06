<?php

namespace App\Model;

use App\DAO\PessoaDAO;

class PessoaJuridicaModel extends PessoaModel
{
    /**
     * 
     */
    public $id_pessoa_juridica, $nome_fantasia, $razao_social, $cnpj;


    /**
     * 
     */
    public function save()
    {
        $dao = new PessoaDAO(); 

        if(empty($this->id_pessoa))
        {
            $dao->insertPessoaJuridica($this);

        } else {

            //$dao->update($this); 
        }        
    }
}