<?php

namespace Admin\Controllers;

/**
 * Controller responsavel em instanciar o método DELETE, para excluir o usuario em questão
 */
class AdminDeleteUsuario
{
    public function index(string|int|null $idUsuario): void
    {
        $deleteUser = new \Admin\Models\AdminDeleteUsuario();
        $deleteUser->deleteUsuario($idUsuario);

        if ($deleteUser->getResult()) {
            $urlRedirect = URLADM . "list-usuarios/index";
            header("Location: $urlRedirect");
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Usuarie não deletade!</p>";
            $urlRedirect = URLADM . "list-usuarios/index";
            header("Location: $urlRedirect");
        }
    }
}