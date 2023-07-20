<?php

namespace app\Models\Crud\Functions;

use app\Models\Crud\Utilizadores\Banco;

class Update extends Banco
{
    public $sql;
    public $table;
    public $set;
    public $where;
    public $and;
    public $returning;

    public function __construct(string $nomeTable)
    {
        $this->table = $nomeTable;
    }

    public function setUpdate(array $arSelect = []): void
    {
        $arDados = $this->getValores($arSelect);

        $this->set = $arDados[0];
        $this->where = $arDados[1];
        $this->and = $arDados[2];
        $this->returning = $arDados[3];

        return;
    }

    public function updateTable(): string
    {
        $sql = "update {$this->table}";
        return $sql;
    }

    public function condicoes(array $arDados = []): string
    {
        $sql =$this->sql;
        
        $this->setUpdate($arDados);
        
        !empty($this->table) ? $sql = $this->updateTable() : null;
        !empty($this->set) ? $sql = $sql . " set " . $this->set : null;
        !empty($this->where) ? $sql = $sql . " where " . $this->where : null;
        !empty($this->and) ? $sql = $sql . " and " . $this->and : null;
        !empty($this->returning) ? $sql = $sql . " returning " . $this->returning : null;

        return $sql . ";";
    }
}
