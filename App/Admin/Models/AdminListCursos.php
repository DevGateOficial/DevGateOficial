<?php

namespace Admin\Models;

/**
 * Classe responsável na listagem de cursos do banco de dados
 */
class AdminListCursos
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

    public function viewCursos(): void
    {
        $listCurso = new \Admin\Models\helper\crud\AdminRead();
        if($this->verifyUser()){
            $listCurso->fullRead("SELECT * FROM curso");
        }else{
            $listCurso->fullRead("SELECT * FROM curso WHERE idResponsavel=:id", "id={$_SESSION['user_idUsuario']}");
        }
        $this->resultBd = $listCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }

    public function cursoSearch(string $key = null): void
    {
        $pesquisa = $key;
        $listCurso = new \Admin\Models\helper\crud\AdminRead();
        $listCurso->fullRead("SELECT * FROM curso WHERE nomeCurso LIKE '%{$key}%'
                                                        or subtituloCurso LIKE '%{$key}%' 
                                                        or descricao LIKE '%{$key}%'
                                                        or objetivos LIKE '%{$key}%'
                                                        or requisitos LIKE '%{$key}%'");
        $this->resultBd = $listCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }

    private function verifyUser(): bool
    {
        if ($_SESSION['user_tipoUsuario'] == 'administrador') {
            return true;
        } else if ($_SESSION['user_tipoUsuario'] == 'professor') {
            return false;
        }
    }
}
