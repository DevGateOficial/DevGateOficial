<?php

namespace Admin\Controllers;

class AdminViewUsuario
{
    /** @var array|string|null $data Recebe os dados que devem ser enviadoa a VIEW*/
    private array|string|null $data = [];

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;


    /**
     * Instancia a classe responsável em carregar a View
     * Envia os dados para a View.
     *
     * @param integer|string|null|null $id
     * @return void
     */
    public function index(int|string|null $id = null): void
    {
        if (!empty($id)) {
            $this->id = (int) $id;

            $viewUser = new \Admin\Models\AdminViewUsuario();
            $viewUser->viewUser($this->id);

            if ($viewUser->getResult()) {
                $this->data['viewUser'] = $viewUser->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "list-users/index";
                header("Location: $urlRedirect");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Usuário não encontrado!</p>";

            $urlRedirect = URLADM . "list-users/index";
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigViewAdm('Views/usuarios/viewUsuario', $this->data);
        $loadView->loadView();
    }
}