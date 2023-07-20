<?php

require __DIR__ . '../../../../vendor/autoload.php';

use app\Views\Login\Avisos\Avisos;

$salvar = new Avisos();
$salvar->paginaHtmlCriarConta();
return $salvar;