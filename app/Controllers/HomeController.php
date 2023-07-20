<?php

use app\Controllers\ButtonController;

class HomeController extends ButtonController
{
    public function paginaHome(): void
    {
        if (array_key_exists('botao_entrar', $_POST) || array_key_exists('botao_criar_conta', $_POST) === true) {
            $this->buttonControllers();
            
            return;
        }

        require_once '../app/Views/Pages/home.phtml';
    }
}