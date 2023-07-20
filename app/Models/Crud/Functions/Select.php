<?php

namespace app\Models\Crud\Functions;

use app\Models\Crud\Utilizadores\Banco;

class Select extends Banco
{
    public $sql;
    public $table;
    public $column;
    public $where;
    public $orderBy;
    public $limit;
    public $offset;
    public $between;
    public $and;
    public $nullsFirst;
    public $isNull;
    public $innerJoin;
    public $leftJoin;
    public $fullJoin;
    public $rightJoin;
    public $on;
    public $notNull;

    public function __construct(string $nomeTable)
    {
        $this->table = $nomeTable;
    }

    public function setSelect(array $arSelect = []): void
    {
        $arDados = $this->getValores($arSelect);

        $this->column = $arDados[0];
        $this->where = $arDados[1];
        $this->orderBy = $arDados[2];
        $this->limit = $arDados[3];
        $this->offset = $arDados[4];
        $this->between = $arDados[5];
        $this->and = $arDados[6];
        $this->nullsFirst = $arDados[7];
        $this->isNull = $arDados[8];
        $this->innerJoin = $arDados[9];
        $this->leftJoin = $arDados[10];
        $this->fullJoin = $arDados[11];
        $this->rightJoin = $arDados[12];
        $this->on = $arDados[13];
        $this->notNull = $arDados[14];

        return;
    }

    public function selectTable(): string
    {
        $sql = "select * from {$this->table}";
        return $sql;
    }

    public function selectColumn(): string
    {
        $sql = "select {$this->column} from {$this->table}";
        return $sql;
    }

    public function condicoes(array $arDados = []): string
    {
        $sql = $this->sql;

        $this->setSelect($arDados);
        
        if (empty($this->column) && empty($this->where) && empty($this->on) && empty($this->limit) && empty($this->notNull) && empty($this->isNull)) {
            $this->sql = $this->selectTable();
            return $this->sql.";";
        }

        empty($this->column) && !empty($this->where) ? $sql = $sql . $this->selectTable() : null;
        !empty($this->column) ? $sql = $sql . $this->selectColumn() : null;
        !empty($this->offset) ? $sql = $sql . " offset " . $this->offset : null;
        !empty($this->between) && !empty($this->and) ? $sql = $sql . " between " . $this->between . " and " . $this->and : null;
        !empty($this->isNull) ? $sql = $sql . " is null " : null;
        !empty($this->notNull) ? $sql = $sql . " is not null " : null;
        !empty($this->fullJoin) ? $sql = $sql . " full join " . $this->fullJoin : null;
        !empty($this->leftJoin) ? $sql = $sql . " left join " . $this->leftJoin : null;
        !empty($this->innerJoin) ? $sql = $sql . " inner join " . $this->innerJoin : null;
        !empty($this->rightJoin) ? $sql = $sql . " right join " . $this->rightJoin : null;
        !empty($this->on) ? $sql = $sql . " on " . $this->on : null;
        !empty($this->where) ? $sql = $sql . " where " . $this->where : null;
        !empty($this->orderBy) ? $sql = $sql . " order by " . $this->orderBy : null;
        !empty($this->limit) ? $sql = $sql . " limit " . $this->limit : null;
        !empty($this->nullsFirst) ? $sql = $sql . " nulls first " : null;

        return $sql . ";";
    }
}
