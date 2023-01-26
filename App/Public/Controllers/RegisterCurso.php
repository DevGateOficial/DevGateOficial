<?php

namespace Public\Controllers;

class RegisterCurso
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private int|string|null $idCurso;

    public function index(int|string|null $idCurso): void
    {
        if (!empty($idCurso)) {
            $this->idCurso = (int) $idCurso;

            $viewCurso = new \Public\Models\helper\crud\PublicRead();
            $viewCurso->fullRead("SELECT nomeCurso FROM curso WHERE idCurso =:idCurso", "idCurso={$this->idCurso}");

            if ($viewCurso->getResult()) {
                $register = new \Public\Models\PublicRegisterCurso();
                $register->getInfo($this->idCurso);

                if ($register->getResult()) {
                    $urlRedirect = URL . "meus-cursos/index";
                    header("Location: $urlRedirect");
                } else {
                    $_SESSION['msg'] == "Não foi possivel fazer o registro no curso";
                    $urlRedirect = URL . "list-cursos/index";
                    header("Location: $urlRedirect");
                }
            } else {
                $_SESSION['msg'] == "Curso não encontrado";
                $urlRedirect = URL . "list-cursos/index";
                header("Location: $urlRedirect");
            }
        } else {
            $urlRedirect = URL . "list-cursos/index";
            header("Location: $urlRedirect");
        }
    }
}
