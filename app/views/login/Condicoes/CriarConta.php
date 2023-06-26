<?php

namespace app\views\login\Condicoes;

use library\crud\Functions\Select;
use library\crud\Utilizadores\Banco;
use library\crud\Utilizadores\Tabela;

class CriarConta extends Banco
{
    public $nome;
    public $idade;
    public $email;
    public $senha;
    public $confirmacaoSenha;
    public $arMensagem;

    public function setCriarConta(): void
    {
        $this->nome = $_POST['nome'];
        $this->idade = $_POST['idade'];
        $this->email = $_POST['email'];
        $this->senha = $_POST['senha'];
        $this->confirmacaoSenha = $_POST['confirmar-senha'];
    }

    public function verificandoRespostas(): void
    {
        $this->setCriarConta();

        if (empty($this->nome) || empty($this->idade) || empty($this->email) || empty($this->senha) || empty($this->confirmacaoSenha)) {
            $this->arMensagem[] = '<br>Cadastro incompleto';
            return;
        }
    }

    public function verificandoEmailValido(): void
    {
        $this->setCriarConta();

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false) {
            $this->arMensagem[] = '<br>E-mail inválido';
            $this->email = null;
            return;
        }
    }

    public function verificandoSeCadastroJaExiste(): void
    {
        $this->setCriarConta();

        $table = new Select("login");
        $arTable = [
            "COLUMN" => "email",
            "WHERE" => "email = '{$_POST['email']}'",
        ];

        $arSelectEmail = $this->executarFetchAll($table->condicoes($arTable));

        if ($arSelectEmail != null) {
            $this->arMensagem[] = '<br>E-mail já cadastrado';
            return;
        }
    }

    public function validandoSenha(): void
    {
        $this->setCriarConta();

        strlen($this->senha) <= 6 ? $this->arMensagem[] = "<br>Senha menor que 6 digitos" : null;
    }

    public function registrandoResposta(): void
    {
        $this->setCriarConta();
        $this->verificandoRespostas();
        $this->verificandoEmailValido();
        $this->verificandoSeCadastroJaExiste();
        $this->validandoSenha();

        if ($this->senha == $this->confirmacaoSenha && !isset($this->arMensagem[0])) {
            $table = new Tabela("login");

            $arTable = [
                "nome" => "{$this->nome}",
                "idade" => "{$this->idade}",
                "email" => "{$this->email}",
                "senha" => "{$this->senha}",
                "confirmacaoSenha" => "{$this->confirmacaoSenha}",
            ];

            $table->salvarInserir($arTable);            
            $this->arMensagem[] = "<br>Conta criada com sucesso!";
            return;
        }
 
        $this->arMensagem[] = "<br><br>Erro ao tentar criar conta: Verifique erros mostrados em aviso ou digitação na confirmação de senha";
    }

    public function imprimindoAviso(): void
    {
        $this->setCriarConta();
        $this->verificandoRespostas();
        $this->verificandoEmailValido();
        $this->registrandoResposta();
        
        foreach($this->arMensagem as $mensagem) {
            print $mensagem;
        }
    }
}
