<?php

namespace App\Model;

use App\Helpers\String_Utils;

abstract class Model 
{

    public $data_cadastro, $ativo, $recaptcha;

    /**
     * Propriedade que armazenará o array retornado da DAO com a listagem das pessoas.
     */
    public $rows;


    /**
     * Define que uma propriedade não pode receber valor nulo ou vazio.
     */
    const NOT_NULL_OR_EMPTY = 1;


    /**
     * Define que uma propriedade deve receber um e-mail válido.
     */
    const IS_EMAIL = 2;


    /**
     * Define que uma propriedade deve receber um CPF válido.
     */
    const IS_CPF = 3;


    /**
     * Define que uma propriedade deve receber um CNPJ válido.
     */
    const IS_CNPJ = 4;


    /**
     * Verifica se uma propriedade é uma data válida.
     */
    const IS_DATE = 5;


    /**
     * Verifica se um valor valor diferente de vazio ou nulo é um e-mail válido.
     */
    const IS_EMAIL_OR_NULL = 6;


    /**
     * Define que uma opção deverá estar definida.
     */
    const MUST_CHECK = 7;

    private $errors = array();

    /**
     * Array que contém as regras de validação, ex:
     * array('')
     */
    private $rules  = array();



    public function __set($field, $value)
    {
        if (property_exists($this, $field)) {
            $reflection = new \ReflectionProperty($this, $field);

            $reflection->setAccessible($field);

            $reflection->setValue($this, $value);
        }

        $this->validate($field, $value);
    }




    public function __get($field)
    {
        if (property_exists($this, $field)) {
            $reflection = new \ReflectionProperty($this, $field);

            $reflection->setAccessible($field);

            return $reflection->getValue($this);
        }
    }


    /**
     * Retorna se houve erros durante o processo de preenchimento do model.
     */
    public function hasValidationErrors()
    {
        return (count($this->errors) > 0) ? true : false;
    }


    /**
     * Retorna um array contendo os erros de validação de formulário.
     * @return array
     */
    public function getValidationErrors()
    {
        return $this->errors;
    }


    /**
     * Adiciona uma regra de validação a um determinado campo.
     * @param string $field Campo a ser validado.
     * @param string $message Mensagem de erro caso o campo não seja validado.
     * @param int $rule Regra de validação genérica prevista como constante na classe Model.
     */
    protected function setRule($field, $message, $rule)
    {
        $rule = array($field => array(
            'message' => $message,
            'rule' => $rule
        ));

        if (!in_array($rule, $this->rules))
            $this->rules[] = $rule;
    }


    /**
     * Define um novo erro na lista de erros de validação.
     * @param $field a propriedade onde ocorreu o erro de validação.
     * @param $message a mensagem de erro de validação
     */
    protected function setError($field, $message)
    {
        $this->errors[] = array(
            'field' => $field,
            'message' => $message
        );
    }


    private function validate($field, $value)
    {
        $rules = $this->getRulesByField($field);

        foreach ($rules as $current_rule) 
        {
            switch ($current_rule['rule']) 
            {
                case self::NOT_NULL_OR_EMPTY:

                    if (empty($value) || $value == NULL)
                        $this->setError($field, $current_rule['message']);
                    break;

                case self::IS_EMAIL:

                    if (!String_Utils::isEmail($value))
                        $this->setError($field, $current_rule['message']);
                    break;


                case self::IS_EMAIL_OR_NULL:

                    if (!empty($value)) {
                        if (!String_Utils::isEmail($value))
                            $this->setError($field, $current_rule['message']);
                    }
                    break;

                case self::IS_CPF:

                    if (!String_Utils::isCPF($value))
                        $this->setError($field, $current_rule['message']);
                    break;


                case self::IS_CNPJ:

                    if (!String_Utils::isCNPJ($value))
                        $this->setError($field, $current_rule['message']);
                    break;


                case self::IS_DATE:
                    
                    if (!String_Utils::isDate($value))
                        $this->setError($field, $current_rule['message']);
                    break;

                //case self::IS_CEP:
                //break;

                //case self::MUST_CHECK:

                  //  if()
            }
        }
    }


    private function getRulesByField($field)
    {
        $tmp_arr_rules = array();

        $total_rules = count($this->rules);

        for ($i = 0; $i < $total_rules; $i++) {
            if (isset($this->rules[$i][$field]))
                $tmp_arr_rules[] = $this->rules[$i][$field];
        }

        return $tmp_arr_rules;
    }


    /**
     * 
     */
    protected function checkRecaptcha()
    {
        $url = "https://www.google.com/recaptcha/api/siteverify"
            . "?secret=" . $_ENV['google_config']['recaptcha_secret_site_key']
            . "&response=" . $this->recaptcha
            . "&remoteip=" . $_SERVER['REMOTE_ADDR'];

        $resposta = json_decode(file_get_contents($url));

        if($resposta->success == false)
            $this->setError('recaptcha', "Por favor, verifique a ReCaptcha.");
    }

}