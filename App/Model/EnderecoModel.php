<?php

namespace App\Model;

use App\DAO\EnderecoDAO;

class EnderecoModel extends Model
{
    public $id_endereco, $cidade, $bairro, $cep;

    /**
     * 
     */
    public function save()
    {
        $dao = new EnderecoDAO(); 

        if(empty($this->id_pessoa))
        {
           // $dao->insertPessoaFisica($this);

        } else {

            //$dao->update($this); 
        }        
    }
}