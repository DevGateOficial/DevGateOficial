<?php

namespace Public\Controllers;

class Home
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data;

    public function index()
    {
        $urlRedirect = URL . "list-cursos/index";
        header("Location: $urlRedirect");
        // $home = new \Public\Models\PublicHome();
        // $this->data = $home->index();
        // $this->loadView();
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("Views/home/home", $this->data);
        $loadView->loadViewLog();
    }
}
