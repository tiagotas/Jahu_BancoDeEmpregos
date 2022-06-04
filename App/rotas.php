<?php


use App\Controller\{PessoaController, VagaController};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Para saber mais estrutura switch, leia: https://www.php.net/manual/pt_BR/control-structures.switch.php
switch ($url) 
{
    case '/':
        echo "Tela Inicial";
    break;


    /**
     * Rotas para Controle de Usuário
     */
    case '/pessoa/fisica/login':
    break;

    case '/pessoa/juridica/login':
    break;

    case '/pessoa/recuperar-senha':
    break;

    case '/pessoa/fisica/meus-dados':
    break;

    case '/pessoa/juridica/meus-dados':
    break;


    /**
     * Rotas para Controle de Vagas
     */
    case '/vagas':
        VagaController::index();
    break;

    case '/vagas/ver':
        VagaController::ver();
    break;

    case '/vagas/candidatar':
        VagaController::candidatar();
    break;

    case '/vagas/candidatar/remover':
        VagaController::candidatar();
    break;

    case '/vagas/cadastro':
        VagaController::cadastro();
    break;

    case '/vagas/delete':
        VagaController::delete();
    break;
    

    /**
     * Rota para Página 404
     */
    default:
        echo "Erro 404";
        break;
}