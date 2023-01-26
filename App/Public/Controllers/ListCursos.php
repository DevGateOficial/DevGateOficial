<?php

namespace Public\Controllers;

class ListCursos
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    private string|null $key;

    /**
     * Instancia a classe responsável em carregar a View.
     * Enviar os dados para a View. 
     * 
     * @return void
     */
    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $listCursos = new \Public\Models\PublicListCursos();
        
        if (!empty($this->dataForm['pesquisa'])){
            $key = $this->dataForm['pesquisa'];
            $listCursos->cursoSearch($key);
        }else{    
            $listCursos->viewCursos();
        }
        if ($listCursos->getResult()) {
            $this->data['listCursos'] = $listCursos->getResultBd();
        } else {
            $this->data['listCursos'] = [];
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
        $loadView = new \Core\ConfigView("/Views/cursos/listCursos", $this->data);
        $loadView->loadViewLog();
    }
}
