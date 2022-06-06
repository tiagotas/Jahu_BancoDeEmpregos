<?php

namespace App\Model;

abstract class Model {

    public $data_cadastro, $ativo;

    /**
     * Propriedade que armazenará o array retornado da DAO com a listagem das pessoas.
     */
    public $rows;

}