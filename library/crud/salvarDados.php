<?php

namespace library\crud;

require_once __DIR__ . "/../vendor/autoload.php";

use library\crud\InserirDados;

$salvar = new InserirDados();
$salvar->select();
return $salvar;