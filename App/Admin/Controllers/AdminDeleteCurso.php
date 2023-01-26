<?php

namespace Admin\Controllers;

/**
 * Controller da página para deletar o curso.
 */
class AdminDeleteCurso
{
    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $idCurso): void
    {   
        $delete = new \Admin\Models\AdminDeleteCurso();
        $delete->getAulas($idCurso);

        if($delete->getResult()){
            $urlRedirect = URLADM . "list-cursos/index/";
            header("Location: $urlRedirect");
        }else{
            $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não deletado!</p>";
            $urlRedirect = URLADM . "view-curso/index/{$idCurso}";
            header("Location: $urlRedirect");
        }
    }
}
