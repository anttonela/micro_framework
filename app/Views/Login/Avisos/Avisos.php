<?php

namespace app\Views\Login\Avisos;

class Avisos
{
    public function paginaHtmlCriarConta(): string
    {
        $codigo = include_once('criarContaAviso.phtml');
        return $codigo;
    }

    public function paginaHtmlEntrar(): string
    {
        $codigo = include_once('entrarAviso.phtml');
        return $codigo;
    }
}