<?php

namespace app\Models\Crud\Utilizadores;

use app\Models\Crud\Functions\Deletar;
use app\Models\Crud\Functions\Inserir;
use app\Models\Database\Connection;

class Tabela extends Connection
{
    private $table;

    public function __construct(string $nomeTable, string $nomeSchema = "public")
    {
        $this->table = $nomeTable;
    }

    public function salvarInserir(array $arInserir = []): void
    {
        $inserir = new Inserir($this->table);
        $chave = $inserir->inserir($arInserir);
    }
    
    public function salvarDelete(array $arDeletar = []): void
    {
        $deletar = new Deletar($this->table);
        $chave = $deletar->deletar($arDeletar);
    }
}
