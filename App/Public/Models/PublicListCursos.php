<?php

namespace Public\Models;

/**
 * Classe responsável na listagem de cursos do banco de dados
 */
class PublicListCursos
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
        $listCurso = new \Public\Models\helper\crud\PublicRead();
        $listCurso->fullRead("SELECT curso.* FROM curso
                                LEFT JOIN usuario_has_curso AS reg ON curso.idCurso = reg.curso_idCurso
                                AND reg.usuario_idUsuario =:idUsuario
                                WHERE reg.curso_idCurso IS NULL", "idUsuario={$_SESSION['user_idUsuario']}");


        $this->resultBd = $listCurso->getResult();

        if ($this->resultBd) {
            unset($_SESSION['msg']);
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }

    public function cursoSearch(string $key = null): void
    {
        $pesquisa = $key;
        $listCurso = new \Public\Models\helper\crud\PublicRead();
        $listCurso->fullRead("SELECT * FROM curso WHERE nomeCurso LIKE '%{$key}%'
                                                        or subtituloCurso LIKE '%{$key}%' 
                                                        or descricao LIKE '%{$key}%'
                                                        or objetivos LIKE '%{$key}%'
                                                        or requisitos LIKE '%{$key}%'");
        $this->resultBd = $listCurso->getResult();

        if ($this->resultBd) {
            unset($_SESSION['msg']);
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }
}
