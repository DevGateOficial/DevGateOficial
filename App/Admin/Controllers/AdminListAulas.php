<?php

namespace Admin\Controllers;

/**
 * Controller da página de listagem de aulas.
 */
class AdminListAulas
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
        echo "LIST AULAS <BR>";

        $this->data['viewCurso'] = $id;

        $listCursos = new \Admin\Models\AdminListAulas();
        $listCursos->viewAula($id);

        if ($listCursos->getResult()) {
            $this->data['listAulas'] = $listCursos->getResultBd();
        } else {
            $this->data['listAulas'] = [];
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
        $loadView = new \Core\ConfigViewAdm('Views/aulas/listAulas', $this->data);
        $loadView->loadView();
    }
}
