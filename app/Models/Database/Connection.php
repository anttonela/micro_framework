<?php

namespace app\Models\Database;

use PDO;
use PDOException;

class Connection
{
    public function connectionDataBase(): PDO
    {
        try {
            $pdo = new PDO("pgsql:host=localhost; port=5432; dbname=posts", "postgres", "@postgres");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $erro) {
            print "Erro na conexão: \n{$erro}\n";
        }
    }
}
