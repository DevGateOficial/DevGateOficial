<?php

namespace Admin\Controllers;

class AdminViewAtividade
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
    public function index(int|string|null $id = null): void
    {
        if (!empty($id)) {
            $this->id = (int) $id;

            $viewAtividade = new \Admin\Models\AdminView();
            $viewAtividade->view($this->id, "atividade", "aula");

            if ($viewAtividade->getResult()) {
                $this->data['viewAtividade'] = $viewAtividade->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "list-atividades/index";
                header("Location: $urlRedirect");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Atividade não encontrada!</p>";

            $urlRedirect = URLADM . "list-ativiades/index";
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
        $this->data['viewAtividade'][0]['url'] = str_replace("watch?v=", "embed/", $this->data['viewAtividade'][0]['url']);
        $loadView = new \Core\ConfigViewAdm("Views/atividades/viewAtividade", $this->data);
        $loadView->loadView();
    }
}