<?php

namespace App\DAO;

use App\Model\{PessoaModel, PessoaJuridicaModel, PessoaFisicaModel};
use \PDO, PDOException, Exception;

final class PessoaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();       
    }

    /**
     * Verifica se um CNPJ já foi cadastrado.
     */
    public function isDuplicatedCNPJ($cnpj)
    {
        try
        {        
            $stmt = $this->cnn->prepare("SELECT id FROM pessoa_juridica WHERE cnpj = :cnpj ");
            $stmt->execute(array('cnpj' => $cnpj));

            return ($stmt->rowCount() > 0) ? true : false;

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Verfifica se um CPF já foi cadastrado.
     */
    public function isDuplicatedCPF($cpf)
    {
        try
        {        
            $stmt = $this->cnn->prepare("SELECT id FROM pessoa_fisica WHERE cpf = :cpf ");
            $stmt->execute(array('cpf' => $cpf));

            return ($stmt->rowCount() > 0) ? true : false;
            
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    /**
     * Verfifica se um E-mail já foi cadastrado.
     */
    public function isDuplicatedEmail($email)
    {
        try
        {        
            $stmt = $this->cnn->prepare("SELECT id FROM pessoa WHERE email = :email ");
            $stmt->execute(array('email' => $email));

            return ($stmt->rowCount() > 0) ? true : false;
            
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    /**
     * 
     */
    public function insertPessoaJuridica(PessoaJuridicaModel $model)
    {
        $this->conexao->beginTransaction();

        // Insert na tabela de Pessoa
        $sql = "INSERT INTO pessoa (email, senha) VALUES (?, sha1(?) ) ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->email);
        $stmt->bindValue(2, $model->senha);
        $stmt->execute();

        $id_pessoa = $this->conexao->lastInsertId();

        // Insert na tabela de Pessa Juridica
        $sql = "INSERT INTO pessoa_juridica (id_pessoa, nome_fantasia, razao_social, cnpj) VALUES (?, ?, ?, ?) ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_pessoa);
        $stmt->bindValue(2, $model->nome_fantasia);
        $stmt->bindValue(3, $model->razao_social);
        $stmt->bindValue(4, $model->cnpj);
        $stmt->execute();

        // Insert na tabela de Endereco
        $sql = "INSERT INTO pessoa_endereco (id_pessoa, cidade, bairro, cep) VALUES (?, ?, ?, ?) ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_pessoa);
        $stmt->bindValue(2, $model->cidade);
        $stmt->bindValue(3, $model->bairro);
        $stmt->bindValue(4, $model->cep);
        $stmt->execute();

        // Insert na tabela de Telefone
        $stmt = $this->conexao->prepare("INSERT INTO telefone (id_pessoa, numero, whatsapp) VALUES (:id_pessoa, :numero, :whatsapp) ");
        $stmt->execute(['id_pessoa' => $id_pessoa, 'email' => $model->email, 'senha' => $model->senha]);

        $this->conexao->commit();
    }


    /**
     * 
     */
    public function insertPessoaFisica(PessoaFisicaModel $model)
    {
        $this->conexao->beginTransaction();

        // Insert na tabela de Pessoa
        $sql = "INSERT INTO pessoa (email, senha) VALUES (?, sha1(?) ) ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->email);
        $stmt->bindValue(2, $model->senha);
        $stmt->execute();

        $id_pessoa = $this->conexao->lastInsertId();

        // Insert na tabela de Pessa Juridica
        $sql = "INSERT INTO pessoa_juridica (id_pessoa, nome, cpf, data_nascimento, genero) VALUES (?, ?, ?, ?, ?) ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_pessoa);
        $stmt->bindValue(2, $model->nome);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->genero);
        $stmt->execute();

        // Insert na tabela de Endereco
        $sql = "INSERT INTO pessoa_endereco (id_pessoa, cidade, bairro, cep) VALUES (?, ?, ?, ?) ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_pessoa);
        $stmt->bindValue(2, $model->cidade);
        $stmt->bindValue(3, $model->bairro);
        $stmt->bindValue(4, $model->cep);
        $stmt->execute();

        // Insert na tabela de Telefone
        $stmt = $this->conexao->prepare("INSERT INTO telefone (id_pessoa, numero, whatsapp) VALUES (:id_pessoa, :numero, :whatsapp) ");
        $stmt->execute(['id_pessoa' => $id_pessoa, 'email' => $model->email, 'senha' => $model->senha]);

        $this->conexao->commit();
    }


    /**
     * 
     */
    public function delete(int $id_pessoa)
    {
        $sql = "UPDATE pessoa SET ativo = 'N' WHERE id_pessoa = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_pessoa);
        $stmt->execute();
    }
}