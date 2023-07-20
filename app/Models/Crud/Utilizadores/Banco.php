<?php

namespace app\Models\Crud\Utilizadores;

use app\Models\Database\Connection;

class Banco extends Connection
{
    public function executar(string $query): void
    {
        $conexao = $this->connectionDataBase();
        $statement = $conexao->prepare($query);
        $statement->execute();
    }
    
    public function executarFetchAll(string $query): array
    {
        $conexao = $this->connectionDataBase();
        $statement = $conexao->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getNomeDosCampos($arValores = []): array
    {
        return array_keys($arValores);
    }

    public function getValores($arValores = []): array
    {
        $arResposta = [];

        foreach ($arValores as $chave => $valor) {
            $arResposta[] = $valor;
        }

        return $arResposta;
    }
}