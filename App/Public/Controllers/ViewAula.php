<?php

namespace Public\Controllers;

class ViewAula
{
    /** @var array|string|null $data Recebe os dados que devem ser enviadoa a VIEW*/
    private array|string|null $data = [];

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $idAula;

    /**
     * Instancia a classe responsável em carregar a View
     * E envia os dados para a View.
     *
     * @param integer|string|null|null $id
     * @return void
     */
    public function index(int|string $id): void
    {
        if (!empty($id)) {
            $this->idAula = (int) $id;

            $viewAula = new \Public\Models\PublicView();
            $viewAula->view($this->idAula, "aula", "curso");

            if ($viewAula->getResult()) {
                $this->data['viewAula'] = $viewAula->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "list-aulas/index";
                header("Location: $urlRedirect");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Aula não encontrado!</p>";

            $urlRedirect = URLADM . "list-aulas/index";
            header("Location: $urlRedirect");
        }
    }

    public function viewAulaAJAX(int|string|null $id = null)
    {
        $this->idAula = (int) $id;
        $viewCurso = new \Public\Models\PublicView();
        $viewCurso->view($this->idAula, "aula", "curso");

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
    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("Views/aulas/viewAula", $this->data);
        $loadView->loadView();
    }
}