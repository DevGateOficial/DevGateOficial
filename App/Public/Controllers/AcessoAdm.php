<?php

namespace Public\Controllers;

/**
 * Controller do acesso à área ADM
 */
class AcessoAdm
{
    /**
     * Instanciar a classe responsável em carregar a View, e enviar os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        $validarTipo = new \Public\Models\PublicAcessoAdm();
        $validarTipo->acess();

        var_dump($validarTipo->getResult());

        if($validarTipo->getResult()){
            $urlRedirect = URLADM . "cadastro-curso/index";
            header("Location: $urlRedirect");
        } else{
            $urlRedirect = URL . "erro/index";
            header("Location: $urlRedirect");
        }
    }
}