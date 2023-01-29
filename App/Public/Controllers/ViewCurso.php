<?php

namespace Public\Controllers;

class ViewCurso
{
    /** @var array|string|null $data Recebe os dados que devem ser enviadoa a VIEW*/
    private array|string|null $data = [];

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $idCurso;

    /**
     * Instancia a classe responsável em carregar a View. 
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(int|string|null $id = null): void
    {
        if (!empty($id)) {
            $this->idCurso = (int) $id;

            // Lista de aulas do curso
            $listAulas = new \Public\Models\PublicListAulas();
            $listAulas->listAulas($this->idCurso);

            $this->data['listAulas'] = $listAulas->getResultBd();

            $aulasAssistidas = new \Public\Models\PublicAulaAssistida();
            $this->data['aulasAssistidas'] = $aulasAssistidas->getAulasAssistidas($id);

            $this->viewUser();

            // if ($viewCurso->getResult()) {
            //     $this->data['viewCurso'] = $viewCurso->getResultBd();
            //     $this->viewUser();
            // } else {
            //     $urlRedirect = URL . "list-cursos/index";
            //     header("Location: $urlRedirect");
            // }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não encontrado!</p>";

            $urlRedirect = URL . "list-cursos/index";
            header("Location: $urlRedirect");
        }
    }

    public function viewCursoAJAX(int|string|null $id = null)
    {
        $this->idCurso = (int) $id;
        $viewCurso = new \Public\Models\PublicViewCurso();
        $viewCurso->viewCurso($this->idCurso);

        header('Content-Type: application/json');
        echo json_encode($viewCurso->getResultBd());
        exit;
    }


    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function viewUser(): void
    {
        $loadView = new \Core\ConfigView("/Views/cursos/viewCurso", $this->data);
        $loadView->loadViewLog();
    }
}
