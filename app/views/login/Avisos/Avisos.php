<?php

namespace app\views\login\Avisos;

class Avisos
{
    public function paginaHtmlCriarConta(): string
    {
        $codigo = include_once('criar-conta-aviso.phtml');
        return $codigo;
    }

    public function paginaHtmlEntrar(): string
    {
        $codigo = include_once('entrar-aviso.phtml');
        return $codigo;
    }
}