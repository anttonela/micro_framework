<?php

namespace library\crud\Utilizadores;

use library\connection\Connection;
use library\crud\Functions\Deletar;
use library\crud\Functions\Inserir;

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
