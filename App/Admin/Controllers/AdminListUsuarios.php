<?php

namespace Admin\Controllers;

class AdminListUsuarios
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
        $listUsuarios = new \Admin\Models\AdminListUsuarios();
        
        if (!empty($this->dataForm['pesquisa'])){
            $key = $this->dataForm['pesquisa'];
            $listUsuarios->usuarioSearch($key);
        }else{    
            $listUsuarios->viewUsuarios();
        }
        
        if ($listUsuarios->getResult()) {
            $this->data['listUsuarios'] = $listUsuarios->getResultBd();
        } else {
            $this->data['listUsuarios'] = [];
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
        $loadView = new \Core\ConfigViewAdm("/Views/usuarios/listUsuarios", $this->data);
        $loadView->loadView();
    }
}
