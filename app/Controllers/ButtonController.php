<?php

namespace app\Controllers;

class ButtonController
{
    public function buttonControllers(): void
    {
        array_key_exists('botao_home', $_POST) ? require_once('../app/Views/Pages/home.phtml') : null;

        array_key_exists('botao_entrar', $_POST) ? require_once('../app/Views/Pages/entrar.html') : null;

        array_key_exists('botao_criar_conta', $_POST) ? require_once('../app/Views/Pages/entrar.html') : null;
    }
}