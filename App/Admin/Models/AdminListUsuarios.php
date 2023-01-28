<?php

namespace Admin\Models;

/**
 * Classe responsável na listagem de cursos do banco de dados
 */
class AdminListUsuarios
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

    public function viewUsuarios(): void
    {
        $listUsers = new \Admin\Models\helper\crud\AdminRead();
        $listUsers->fullRead("SELECT idUsuario, nomeCompleto, nomeUsuario, email, imagem, adms_user_sits FROM usuario WHERE idUsuario !=:idUsuario", "idUsuario={$_SESSION['user_idUsuario']}");

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
        $listUsers->fullRead("SELECT idUsuario, nomeUsuario, email FROM usuario WHERE nomeCompleto LIKE '%{$key}%'
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
