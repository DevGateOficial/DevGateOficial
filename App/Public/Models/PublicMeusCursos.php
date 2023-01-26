<?php

namespace Public\Models;

class PublicMeusCursos
{
    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    private array|null $resultBd;

    /** @var int|string|null $idUsuario Recebe o ID do usuario que esta realizando o registro*/
    private int|string|null $idUsuario;

    /** @var array|null $idCurso Recebe o ID do Curso em que o usuário será registrdo*/
    private array|null $listCursos;

    private array|null $cursosData = [];

    private int|string $i = 0;

    public function getResult(): bool
    {
        return $this->result;
    }

    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    public function viewRegisteredCursos(): void
    {
        $this->idUsuario = $_SESSION['user_idUsuario'];

        $viewCursos = new \Public\Models\helper\crud\PublicRead();
        $viewCursos->fullRead("SELECT curso_idCurso FROM usuario_has_curso WHERE usuario_idUsuario =:idUsuario", "idUsuario={$this->idUsuario}");

        $this->listCursos = $viewCursos->getResult();

        if ($this->listCursos) {
            $this->getCursos();
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }

    private function getCursos(): void
    {
        $getCursos = new \Public\Models\helper\crud\PublicRead();

        foreach($this->listCursos as $curso){
            $getCursos->fullRead("SELECT * FROM curso WHERE idCurso =:idCurso", "idCurso={$curso['curso_idCurso']}");
            array_push($this->cursosData, $getCursos->getResult());
        }

        $this->resultBd = $this->cursosData;

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }
}
