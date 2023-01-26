<?php

namespace Admin\Controllers;

class AdminViewAula
{
    /** @var array|string|null $data Recebe os dados que devem ser enviadoa a VIEW*/
    private array|string|null $data = [];

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

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
            $this->id = (int) $id;

            $viewAula = new \Admin\Models\AdminView();
            $viewAula->view($this->id, "aula", "curso");

            $listAtividades = new \Admin\Models\AdminList();
            $listAtividades->list($this->id, 'aula', 'atividade');

            if ($viewAula->getResult()) {
                $this->data['viewAula'] = $viewAula->getResultBd();
                $this->data['listAtividades'] = $listAtividades->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "view-curso/index";
                header("Location: $urlRedirect");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Aula não encontrado!</p>";

            $urlRedirect = URLADM . "list-aulas/index";
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigViewAdm("Views/aulas/viewAula", $this->data);
        $loadView->loadView();
    }
}