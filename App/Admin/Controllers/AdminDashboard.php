<?php

namespace Admin\Controllers;

class AdminDashboard
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    public function index()
    {
        $dashboard = new \Admin\Models\AdminDashboard();
        $dashboard->getDataAlunos();
        $this->data = $dashboard->getResult();
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
        $loadView = new \Core\ConfigViewAdm('Views/dashboard/dashboard', $this->data);
        $loadView->loadView();
    }
}
