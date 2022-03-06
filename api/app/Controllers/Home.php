<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo '<h1>API desafio Sky Solar</h1>';

    }

    public function page_not_found()
    {
        echo 'Método não encontrado';

    }
}
