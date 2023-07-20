<?php

namespace routes;

use routes\Router;

class RouteConfig
{
    public function acessandoArquivos(): void
    {
        $router = new Router();
        $routes = $router->routes();

        $url = $_SERVER['REQUEST_URI'];

        if (array_key_exists($url, $routes)) {
            $dividindoRota = explode('@', $routes[$url]);
            
            $controller = $dividindoRota[0];
            $metodo = $dividindoRota[1];

            $arquivoController = '../app/Controllers/' . $controller . '.php';

            require_once $arquivoController;

            $controllerObj = new $controller();
            $controllerObj->$metodo();

            return;
        }

        print 'Erro: Página não encontrada nas rotas';
    }
}