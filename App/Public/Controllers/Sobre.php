<?php

namespace Public\Controllers;

class Sobre
{

    public function index()
    {
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
        $loadView = new \Core\ConfigView("Views/sobre/sobre", null);
        $loadView->loadViewLog();
    }
}
