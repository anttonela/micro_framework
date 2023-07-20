<?php

namespace app\Models\Crud\Functions;

use app\Models\Crud\Utilizadores\Banco;

class Deletar extends Banco
{
    private $table;
    private $arNomeDosCampos;
    private $arValores;

    public function __construct(string $nomeTable)
    {
        $this->table = $nomeTable;
    }

    public function set(array $arDeletar = []): void
    {
        $this->arNomeDosCampos = $this->getNomeDosCampos($arDeletar);
        $this->arValores = $this->getValores($arDeletar);

        return;
    }

    public function deletar(array $arDeletar = []): void
    {
        $this->set($arDeletar);

        $sqlDeletar = "delete from {$this->table} where "
        .implode($this->arNomeDosCampos)." = ".implode($this->arValores).";";

        $this->executar($sqlDeletar);
    }
}