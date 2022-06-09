<?php

namespace App\Controller;

use App\Model\PessoaModel;

class HomeController extends Controller
{
    /**
     * 
     */
    public static function index()
    {
        parent::render('Dashboard/home');
    }
}