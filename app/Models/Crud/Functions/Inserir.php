<?php

namespace app\Models\Crud\Functions;

use app\Models\Crud\Utilizadores\Banco;

class Inserir extends Banco
{
    private $table;
    private $arNomeDosCampos;
    private $arValores;
    private $nome;
    private $email;

    public function __construct(string $nomeTable)
    {
        $this->table = $nomeTable;
    }

    public function set(array $arInserir = []): void
    {
        $this->arNomeDosCampos = $this->getNomeDosCampos($arInserir);
        $this->arValores = $this->getValores($arInserir);

        $this->nome = $this->arValores[0];
        $this->email = $this->arValores[1];

        return;
    }

    public function inserir(array $arInserir = []): void
    {
        $this->set($arInserir);

        $sqlInserir = "insert into {$this->table} 
        (".implode(",", $this->arNomeDosCampos).") 
        values ('".implode("','", $this->arValores)."');";

        is_numeric($this->nome) ? $sqlInserir = null . exit : $this->executar($sqlInserir);
    }
}