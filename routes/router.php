<?php

function verificandoController(string $controller, string $action): void
{
    try {
        $controllerNamespace = "app\\controllers\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception(
                "O método {$action} não existe no controller {$controller}"
            );
        }

        $controllerInstance->$action((object) $_REQUEST);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$router = [
  "GET" => [
    "/" => fn () => verificandoController("HomeController", "index"),
    "/contact" => fn () => verificandoController("ContactController", "index"),
  ],
  "POST" => [
    "/contact" => fn () => verificandoController("ContactController", "store"),
  ],
];
