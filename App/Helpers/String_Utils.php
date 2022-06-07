<?php

/**
* A classe String tatra as corriqueiras entradas de dados, nota-se que todas as entradas de formularios vem como String, isto é, independentemente se o usuário
* está entrando com uma data ou preço, o conteúdo digitado é covertido para String. Está classe têm métodos que "reconvertem" as strings para seus tipos originais
* além de validar datas, CPFs, e CNPJs, informados pelo usuário.
*/

namespace App\Helpers;

use Exception;

class String_Utils
{
	/**
	 * É setado com privado para garantir que a classe nunca será instânciada.
	 * @access private
	 * @return Void
	 */		
	private function __construct()
	{	
	}

	
	/**
	 * Resume uma string com base em um limite.
	 */
	public static function limitStrTo($str, $limit) 
	{
		return (strlen($str) > $limit) ? substr($str, 0, $limit) . '...' : $str;
	}


	public static function toMaskedPhone($number)
	{
		return "(".substr($number,0,2).") ".substr($number,2,-4)."-".substr($number,-4);
	}
	
	public static function getFullNameBrazilianState($uf)
	{
		$estados = array('AC' => 'Acre',
						'AL' => 'Alagoas',
						'AP' => 'Amapá',
						'AM' => 'Amazonas',
						'BA' => 'Bahia',
						'CE' => 'Ceára',
						'DF' => 'Distrito Federal',
						'ES' => 'Espírito Santo',
						'GO' => 'Goiás',
						'MA' => 'Maranhão',
						'MS' => 'Mato Grosso do Sul',
						'MT' => 'Mato Grosso',
						'MG' => 'Minas Gerais',
						'PA' => 'Pará',
						'PB' => 'Paraíba',
						'PR' => 'Paraná',
						'PE' => 'Pernambuco',
						'PI' => 'Piauí',
						'RJ' => 'Rio de Janeiro',
						'RN' => 'Rio Grande do Norte',
						'RS' => 'Rio Grande do Sul',
						'RO' => 'Rôndonia',
						'RR' => 'Roraima',
						'SC' => 'Santa Catarina',
						'SP' => 'São Paulo',
						'SE' => 'Sergipe',
						'TO' => 'Tocantins'
						);
		
			return $estados[strtoupper($uf)];	
	}	
	
	
	/**
	 * Converter uma string com virgulas para um valor do tipo Double
	 * @access public
	 * @param String $s => String a ser convertida para o tipo Double
	 * @return Double
	 */		
	public static function toDouble($s)
	{
		$a = array( "/[R$]/"  => "",
					"/[.]/" => "",
					"/[,]/" => "."
		);
		
		return (double) preg_replace(array_keys($a), array_values($a), $s);
	}



	
	
	/**
	 * Converter uma string para um tipo Integer.
	 * @access public
	 * @param String $s => String a ser convetida para integer.
	 * @return Int
	 */		
	public static function toInteger($s)
	{
		return (int) self::toNumber($s);
	}
	
	
	/**
	 * Transforma uma String para um formato Date para ser inserida no banco de dados.
	 * @access public
	 * @param String $s => String a ser convertida para Date.
	 * @return String<Date>
	 */		
	public static function toDate($s)
	{
		//if(self::isDate($s))
			 return implode("-", array_reverse(explode("/", $s)));
		//else
			//throw new Exception('Desculpe, mas o valor infomado não é uma data válida.');
	}

	
	public static function toBrDate($s)
	{
		return implode("/", array_reverse(explode("-", $s)));
	}
	
	
	/**
	 * Converter uma String para números, deixando apenas os números.
	 * @param String $s => String a ser convertida para númerico.
	 * @access public
	 * @return Numeric
	 */		
	public static function toNumber($s)
	{
		return trim(preg_replace('#[^0-9]#', '', $s));
	}
	
	
	/**
	 * Tranforma uma String com máscara em um CPF com apenas números.
	 * @param String $s => String a ser convertida em CPF. 
	 * @access public
	 * @return String<CPF>
	 */		
	public static function toCPF($s) 
	{
		if(self::isCPF(self::toNumber($s)))
			return (string) self::toNumber($s);
		else
			throw new \Exception('Desculpe, mas o CPF informado não é válido.');
	}
	
	
	/**
	 * Tranforma uma String com máscara em um CNPJ com apenas números.
	 * @param String $s => String a ser convertida em CNPJ. 
	 * @access public
	 * @return String<CNPJ>
	 */		
	public static function toCNPJ($s) 
	{
		if(self::isCNPJ(self::toNumber($s)))
			return (string) self::toNumber($s);
		else
			throw new \Exception('Desculpe, mas o CNPJ informado não é válido.');
	}	
	
	
	/**
	 * Retorna um cep sem máscara de entrada.
	 * @param String $s => String contendo um CEP com máscara a ser removida.
	 * @access public
	 * @return String<CEP>
	 */		
	public static function toCEP($s) 
	{
		return self::toInteger($s);
	}		
	
	
	/**
	 * Renove os acentos de uma determinada String.
	 * @param String $s => String com acentos a serem removidos.
	 * @access public
	 * @return String
	 */		
	public static function removeAccents($s) 
	{
		$a = array(
					"/[ÂÀÁÄÃ]/" => "A",
					"/[âãàáä]/" => "a",
					"/[ÊÈÉË]/"  => "E",
					"/[êèéë]/"  => "e",
					"/[ÎÍÌÏ]/"  => "I",
					"/[îíìï]/"  => "i",
					"/[ÔÕÒÓÖ]/" => "O",
					"/[ôõòóö]/" => "o",
					"/[ÛÙÚÜ]/"  => "U",
					"/[ûúùü]/"  => "u"
		);
		
		return preg_replace(array_keys($a), array_values($a), $s);		
	}
	
	
	/**
	 * Verifica se uma String tem caracteres especiais
	 * @param String $s => String a ser verificada
	 * @access public
	 * @return Boolean
	 */		
	public static function isStringWithoutSpecialChars($s) 
	{
		if(preg_match('/[^a-zA-Z0-9\-]/i', $s))
			return true;
		else
			return false;	
	}	
	
	
	/**
	 * Verifica se a data informada é válida.
	 * @param String $o => String a ser validada se é uma data.
	 * @access public
	 * @return Boolean
	 */		
	public static function isDate($s)
	{
		$string = explode('/', $s);
		
		if(isset($string[0]))
			$dia = $string[0];
		else
			return false;
			
		if(isset($string[1]))
			$mes = $string[1];
		else
			return false;
			
		if(isset($string[2]))
			$ano = $string[2];
		else
			return false;
		
		if(checkdate($mes, $dia, $ano))
			return true;
		else
			return false;
	}
	
	
	/**
	 * Verifica se a string informada é um email válido.
	 * @param String $s => String a ser avaliada como email.
	 * @access public
	 * @return Boolean
	 */		
	public static function isEmail($s)
	{
		if(filter_var($s, FILTER_VALIDATE_EMAIL))
			return true;
		else
			return false;
	}
	
	
	/**
	 * Verifica se o CPF informado é válido.
	 * @param String $cpf => String contendo um possível CPF sem máscara.
	 * @access public
	 * @return Boolean
	 */		
	public static function isCPF($cpf) 
	{
		$cpf = self::toNumber($cpf);
		
		if(empty($cpf) || strlen($cpf) != 11)
			return false;
		else
		{
			if(self::checkFake($cpf, 11))
				return false;
			else
			{
				$sub_cpf = substr($cpf, 0, 9);

				$dv = 0;

				for($i = 0; $i < 9; $i++) 
					$dv += ($sub_cpf[$i] * (10-$i));
		
				if($dv == 0)
					return false;
			
				$dv = 11 - ($dv % 11);
				
				if($dv > 9)
					$dv = 0;
				
				if($cpf[9] != $dv)
					return false;
			
				$dv *= 2;
				
				for($i = 0; $i < 9; $i++) {
					$dv += ($sub_cpf[$i] * (11-$i));
				}
			
				$dv = 11 - ($dv % 11);
				
				if($dv > 9)
					$dv = 0;
			
				if($cpf[10] != $dv)
					return false;
			
				return true;
			}
		}
	}	
	
	
	/**
	 * Verifica se um CNPJ é válido
	 * @param String $cnpj => String contendo um possível CNPJ sem máscara.
	 * @access public
	 * @return Boolean
	 */	
	public static function isCNPJ($cnpj) 
	{
		$cnpj = self::toNumber($cnpj);
		
		if(empty($cnpj) || strlen($cnpj) != 14)
			return false;
		else
		{
			if(self::checkFake($cnpj, 14))
				return false;
			else
			{
				$rev_cnpj = strrev(substr($cnpj, 0, 12));

				$multiplier = 0;
				$sum = 0;
				
				for($i = 0; $i <= 11; $i++) 
				{
					$i == 0 ? $multiplier = 2 : $multiplier;
					$i == 8 ? $multiplier = 2 : $multiplier;
					$multiply = ($rev_cnpj[$i] * $multiplier);
					$sum = $sum + $multiply;
					$multiplier++;
				}
	
				$rest = $sum % 11;
				
				if($rest == 0 || $rest == 1)
					$dv1 = 0;
				else
					$dv1 = 11 - $rest;
		
				$sub_cnpj = substr($cnpj, 0, 12);
				$rev_cnpj = strrev($sub_cnpj.$dv1);
				unset($sum);
		
				for($i = 0; $i <= 12; $i++) 
				{
					$i == 0 ? $multiplier = 2 : $multiplier;
					$i == 8 ? $multiplier = 2 : $multiplier;
					$multiply = ($rev_cnpj[$i] * $multiplier);
					@$sum = $sum + $multiply;
					$multiplier++;
				}
		
				$rest = $sum % 11;
				
				if($rest == 0 || $rest == 1)
					$dv2 = 0;
				else
					$dv2 = 11 - $rest;
		
				if($dv1 == $cnpj[12] && $dv2 == $cnpj[13])
					return true;
				else
					return false;
			}
		}		
	}		
	
	
	/**
	 * Retorna true caso a string informada não seja "fake"
	 * @access private
	 * @return Boolean
	 */	
	private static function checkFake($string, $length)
	{
		for($i = 0; $i <= 9; $i++) 
		{
			$fake = str_pad("", $length, $i);
			
			if($string === $fake)
				return(1);
		}
	}
	
	
	/**
	 * Verifica se uma determinada String tem o limite de caracteres estabelecidos.
	 * @access public
	 * @return Boolean
	 */		
	public static function checkMaxLength($string, $max_length)
	{
		if(strlen($string) <= $max_length)
			return true;
		else
			return false;		
	}

	/**
	 * Remove todos os caracteres especiais de uma string, deixando apenas letras ou numeros.
	 */
	public static function returnOnlyNumbersOrLetters($str)
	{
		return trim(preg_replace('/[^a-zA-Z0-9]/', '', $str));
	}
	
	
   /**
	* Retorna uma Exception com a informação de que determinado método chamado não existe (método que será herdado pelas classes filhas).
	* @access public
	* @return Object
	*/		
	public function __call($method, $arguments)
	{
		throw new Exception('O método ' . $method . ' não pertence a classe ' . __CLASS__ );
	}
}
?>