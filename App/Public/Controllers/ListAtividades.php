<?php

namespace Public\Controllers;

/**
 * Controller da página de listagem de atividades.
 */
class ListAtividades
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|string|null $idAtividade Recebe o id da atividade que foi passada*/
    private int|string|null $idAtividade;

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $id): void
    {
        $this->data['viewAula'] = $id;

        $listAtividades = new \Public\Models\PublicList();
        $listAtividades->list($id, 'aula', 'atividade');

        if ($listAtividades->getResult()) {
            $this->data['listAtividades'] = $listAtividades->getResultBd();
        } else {
            $this->data['listAtividades'] = [];
        }

        $this->loadView();
    }

    public function listAtividadesAJAX(int|string|null $id = null)
    {
        $this->idAtividade = (int) $id;
        $listAtividades = new \Public\Models\PublicList();
        $listAtividades->list($this->idAtividade, "aula", "atividade");

        header('Content-Type: application/json');
        echo json_encode($listAtividades->getResultBd());
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
        $loadView = new \Core\ConfigView('Views/atividades/listAtividades', $this->data);
        $loadView->loadView();
    }
}
