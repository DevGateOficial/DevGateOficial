<?php

namespace Admin\Controllers;

/**
 * Controller da página para deletar o curso.
 */
class AdminDeleteAula
{
    private string|int|null $idAula;
    private string|int|array|null $idCurso;

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $idAula): void
    {   
        $this->idAula = $idAula;
        
        $getIdCurso = new \Admin\Models\helper\crud\AdminRead();
        $getIdCurso->fullRead("SELECT idCurso FROM aula WHERE idAula =:id", "id={$this->idAula}");
        $this->idCurso = $getIdCurso->getResult()[0]['idCurso'];

        $delete = new \Admin\Models\AdminDeleteAula();
        $delete->getAtividades($idAula);

        if($delete->getResult()){
            $urlRedirect = URLADM . "view-curso/index/{$this->idCurso}";
            header("Location: $urlRedirect");
        }else{
            $_SESSION['msg'] = "<p style='color: red'>Erro: Aula não deletada!</p>";
            $urlRedirect = URLADM . "view-curso/index/{$this->idCurso}";
            header("Location: $urlRedirect");
        }
    }
}
