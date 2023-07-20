<?php

namespace app\Models\Crud;

use PDOException;
use app\Models\Crud\Functions\Select;
use app\Models\Crud\Functions\Update;
use app\Models\Crud\Utilizadores\Banco;
use app\Models\Crud\Utilizadores\Tabela;

class InserirDados extends Banco
{
    public function deletar(): void
    {
        $table = new Tabela("usuario");

        $arTable = [
            "id_user" => "27",
        ];

        $table->salvarDelete($arTable);
        print "\t\033[1;32mDado\033[0m\033[1;31m deletado \033[0m\033[1;32mcom sucesso!\033[0m\n";
    }

    public function inserir(string $table, array $arTable = []): void
    {
        $table = new Tabela("usuario");

        $arTable = [
            "nome" => "Antonela",
            "email" => "antonelaexemplo@gmail.com",
            "senha" => "exemplo@123",
        ];

        $table->salvarInserir($arTable);
        print " \t\033[1;32mNovo dado inserido com sucesso!\033[0m\n";
    }

    public function select(): void
    {
        $table = new Select("login");

        $arDados = [
            "COLUMN" => "email",
            "WHERE" => "email = 'antonelaexemplo@gmail.com'",
            "ORDER BY" => "",
            "LIMIT" => "",
            "OFFSET" => "",
            "BETWEEN" => "",
            "'AND'" => "",
            "NULLS FIRST" => "",
            "IS NULL" => "",
            "INNER JOIN" => "",
            "LEFT JOIN" => "",
            "FULL JOIN" => "",
            "RIGHT JOIN" => "",
            "ON" => "",
            "IS NOT NULL" => "",
        ];

        try {
            $executar = $this->executarFetchAll($table->condicoes($arDados));
            print "\n\033[1;32mSelect será realizado com sucesso.\033[0m\n\n";
            print_r($executar);
        } catch (PDOException $erro) {
            print "\n\033[1;31mErro ocorrido ao tentar encontrar dado na tabela:\033[0m\n\n\033[1;37m{$erro}\033[0m\n";
        }
    }

    public function update(): void
    {
        $table = new Update("usuario");

        $arDados = [
            "SET" => "nome = 'Antonela'",
            "WHERE" => "id_user = 6",
            "'AND'" => "",
            "RETURNING" => "",
        ];

        $executar = $this->executarFetchAll($table->condicoes($arDados));
        print_r($executar);
    }
}