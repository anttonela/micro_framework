<?php

namespace app\Models\Crud;

require_once __DIR__ . "/../vendor/autoload.php";

use app\Models\Crud\InserirDados;

$salvar = new InserirDados();
$salvar->select();
return $salvar;