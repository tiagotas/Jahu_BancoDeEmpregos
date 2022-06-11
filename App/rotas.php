<?php

use App\Controller\
{
    EnderecoController, 
    HomeController, 
    PessoaController, 
    PessoaFisicaController, 
    PessoaJuridicaController, 
    VagaController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) 
{
    case '/':
        HomeController::index();
    break;

    
    /**
     * Rotas para verificar duplicidades
     */
    case '/pessoa/check-email':
        PessoaController::checkEmail();
    break;

    case '/pessoa/fisica/check-cpf':
        PessoaFisicaController::checkCPF();
    break;

    case '/pessoa/juridica/check-cnpj':
        PessoaJuridicaController::checkCNPJ();
    break;


    /**
     * Rotas para Controle de Cadastro de Novos Usuários
     */
    case '/pessoa/fisica/cadastro':
        PessoaFisicaController::cadastro();
    break;

    case '/pessoa/juridica/cadastro':
        PessoaJuridicaController::cadastro();
    break;


    /**
     * Rotas para os Dados do Usuário
     */
    case '/pessoa/fisica/meus-dados':
        PessoaFisicaController::meusDados();
    break;
    
    case '/pessoa/juridica/meus-dados':
        PessoaJuridicaController::meusDados();
    break;


    /**
     * Rotas para o usuário adicionar telefone e endereco
     */
    case '/pessoa/endereco/cadastro':
        EnderecoController::cadastro();
    break;

    case '/pessoa/endereco/remover':
        EnderecoController::delete();
    break;

    case '/pessoa/telefone/cadastro':
        EnderecoController::cadastro();
    break;

    case '/pessoa/telefone/delete':
        EnderecoController::delete();
    break;


    /**
     * Rotas para Controle de Usuário
     */
    case '/pessoa/login':
        PessoaController::login();
    break;

    case '/pessoa/logout':
        PessoaController::logout();
    break;

    case '/pessoa/recuperar-senha':
        PessoaController::recuperarSenha();
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