<?php

require_once __DIR__ . "/vendor/autoload.php";

use app\views\login\Avisos\Avisos;

$salvar = new Avisos();
$salvar->paginaHtmlCriarConta();
return $salvar;