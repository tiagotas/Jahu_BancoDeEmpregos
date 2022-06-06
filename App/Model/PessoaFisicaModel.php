<?php

namespace App\Model;

use App\DAO\PessoaDAO;

class PessoaFisicaModel extends PessoaModel
{
    public $id_pessoa_fisica, $nome, $data_nascimento, $cpf, $genero;
}