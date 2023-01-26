<?php

namespace Admin\Controllers;

/**
 * Controller da página para deletar atividade.
 */
class AdminDeleteAtividade
{
    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(string|int|null $idAtividade): void
    {
        $viewAula = new \Admin\Models\helper\crud\AdminRead();
        $viewAula->fullRead("SELECT idAula FROM atividade WHERE idAtividade='$idAtividade'");

        $listAtividades = new \Admin\Models\helper\crud\AdminDelete();
        $listAtividades->executeDelete("atividade", $idAtividade);

        if ($listAtividades->getResult()) {
            $urlRedirect = URLADM . "view-aula/index/" . $viewAula->getResult()[0]['idAula'];
            header("Location: $urlRedirect");
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Atividade não deletada!</p>";
            $urlRedirect = URLADM . "view-aula/index" . $viewAula->getResult()[0]['idAula'];
            header("Location: $urlRedirect");
        }
    }
}
