<?php

namespace App\DAO;

use App\Model\EnderecoModel;
use \PDO, PDOException, Exception;

final class EnderecoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();       
    }


    /**
     * 
     */
    public function insert(EnderecoModel $model)
    {
        $sql = "INSERT INTO telefone (id_pessoa, numero, whatsapp) VALUES (?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_pessoa);
        $stmt->bindValue(2, $model->numero);
        $stmt->bindValue(3, $model->whatsapp);
        $stmt->execute(); 
    }


    /**
     * 
     */
    public function update(EnderecoModel $model)
    {
        $sql = "UPDATE telefone SET numero=? whatsapp=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->numero);
        $stmt->bindValue(2, $model->whatsapp);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();        
    }


    /**
     * 
     */
    public function selectById(int $id)
    {
        $sql = "SELECT * FROM telefone WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\EnderecoModel"); 
    }


    /**
     * 
     */
    public function selectAllByIdPessoa(int $id_pessoa)
    {
        $sql = "SELECT * FROM telefone WHERE ativo = 'S' AND id_pessoa = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_pessoa);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);  
    }


    /**
     * 
     */
    public function delete(int $id)
    {
        $sql = "UPDATE telefone SET ativo = 'N' WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        
    }
}