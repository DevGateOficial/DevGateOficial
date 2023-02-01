<?php

namespace Admin\Models;

class AdminListSolicitacoes
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data = null;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    private array|null $resultBd;

    private string $key;

    public function getResult(): bool
    {
        return $this->result;
    }

    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    public function viewSolicitacoes(): void
    {
        $listUsers = new \Admin\Models\helper\crud\AdminRead();
        $listUsers->fullRead("SELECT * FROM usuario JOIN endereco
                                ON usuario.endereco = endereco.idEndereco
                            WHERE idUsuario !=:idUsuario and adms_user_sits =:sit", 
                            "idUsuario={$_SESSION['user_idUsuario']}&sit=4");

        $this->resultBd = $listUsers->getResult();

        if($this->resultBd){
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }

    public function UsuarioSearch(string $key = null): void
    {
        $pesquisa = $key;
        $listUsers = new \Admin\Models\helper\crud\AdminRead();
        $listUsers->fullRead("SELECT * FROM usuario WHERE nomeCompleto LIKE '%{$key}%'
                                                        or email LIKE '%{$key}%' 
                                                        or nomeUsuario LIKE '%{$key}%'");
        $this->resultBd = $listUsers->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }
}