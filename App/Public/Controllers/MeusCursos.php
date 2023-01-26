<?php

namespace Public\Controllers;

class MeusCursos
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /**
     * Instancia a classe responsável em carregar a View.
     * Enviar os dados para a View. 
     * 
     * @return void
     */
    public function index(): void
    {
        $listCursos = new \Public\Models\PublicMeusCursos();
        $listCursos->viewRegisteredCursos();

        if ($listCursos->getResult()) {
            $this->data['meusCursos'] = $listCursos->getResultBd();
        } else {
            $this->data['meusCursos'] = [];
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
        $loadView = new \Core\ConfigView("/Views/cursos/meusCursos", $this->data);
        $loadView->loadViewLog();
    }
}
