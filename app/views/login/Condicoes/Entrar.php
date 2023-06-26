<?php

namespace app\login\Condicoes;

use library\crud\Functions\Select;
use library\crud\Utilizadores\Banco;

class Entrar extends Banco
{
    public $email;
    public $senha;
    public $arMensagem;

    public function setEntrar(): void
    {
        $this->email = $_POST['email'];
        $this->senha = $_POST['senha'];
    }

    public function verificandoEmailValido(): void
    {
        $this->setEntrar();

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false) {
            $this->arMensagem[] = '<br>E-mail inválido';
            $this->email = null;
            return;
        }
    }

    public function verificandoSeCadastroExiste(): void
    {
        $this->setEntrar();

        $table = new Select("login");
        $arTable = [
            "COLUMN" => "senha",
            "WHERE" => "email = '$this->email'",
        ];
        $arSelectSenha = $this->executarFetchAll($table->condicoes($arTable));

        $arSelectSenha[0]['senha'] === $this->senha ? $this->arMensagem[] = 'Você conseguiu entrar na sua conta com sucesso!': 
        $this->arMensagem[] = '<br>Autenticação falhou, tente novamente';
    }

    public function imprimindoAviso(): void
    {
        $this->verificandoEmailValido();
        $this->verificandoSeCadastroExiste();

        foreach($this->arMensagem as $mensagem) {
            print $mensagem;
        }
    }
}