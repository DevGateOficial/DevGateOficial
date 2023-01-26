<?php

namespace Admin\Controllers;

/**
 * Controller da página de listagem de atividades.
 */
class AdminListAtividades
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $id): void
    {
        echo "LIST ATIVIDADES <BR>";

        $this->data['viewAula'] = $id;

        $listAtividades = new \Admin\Models\AdminList();
        $listAtividades->list($id, 'aula', 'atividade');

        if ($listAtividades->getResult()) {
            $this->data['listAtividades'] = $listAtividades->getResultBd();
        } else {
            $this->data['listAtividades'] = [];
        }

        $this->loadView();
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigViewAdm('Views/atividades/teste', $this->data);
        $loadView->loadView();
    }
}
