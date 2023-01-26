<?php

namespace Public\Controllers;

/**
 * Controller da página de listagem de aulas.
 */
class ListAulas
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
        $this->data['viewCurso'] = $id;

        $listCursos = new \Public\Models\PublicListAulas();
        $listCursos->listAulas($id);

        if ($listCursos->getResult()) {
            $this->data['listAulas'] = $listCursos->getResultBd();
        } else {
            $this->data['listAulas'] = [];
        }

        $aulasAssistidas = new \Public\Models\PublicAulaAssistida();
        $this->data['aulasAssistidas'] = $aulasAssistidas->getAulasAssistidas();

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
        $loadView = new \Core\ConfigView('Views/aulas/listAulas', $this->data);
        $loadView->loadView();
    }
}
