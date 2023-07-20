<?php

namespace routes;

class Router
{
    public function routes(): array
    {
        $routes = [
            '/' => 'HomeController@paginaHome',
            '/home' => 'HomeController@paginaHome',
            '/entrar' => 'EntrarController@paginaEntrar',
            '/criarConta' => 'CriarContaController@paginaCriarConta',
        ];

        return $routes;
    }
}