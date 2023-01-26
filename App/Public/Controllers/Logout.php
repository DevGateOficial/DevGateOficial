<?php

namespace Public\Controllers;

/**
 * Controller de logout.
 */
class Logout
{
    /**
     * Destruir as sessões do usuário logado
     *
     * @return void
     */
    public function index(): void
    {
        unset($_SESSION['user_idUsuario'], $_SESSION['user_nomeCompleto'], $_SESSION['user_email'], $_SESSION['user_nomeUsuario']);

        $_SESSION['msg'] = "<p style='color: green'>Logout realizado com sucesso!</p>";
        $urlRedirect = URL . "login/index";
        header("Location: $urlRedirect");
    }
}