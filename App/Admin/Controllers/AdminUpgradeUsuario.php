<?php

namespace Admin\Controllers;

class AdminUpgradeUsuario
{
    /** @var int|string|null $data Recebe o id do registro.*/
    private int|string|null $id;

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     * 
     * @return void
     */
    public function index(int|string|null $id = null): void
    {
        var_dump($id);
        $upgrade = array(
            'tipoUsuario' => 'professor',
            'adms_user_sits' => 1
        );


        $aceitarSolicitacao = new \Admin\Models\helper\crud\AdminUpdate();
        $aceitarSolicitacao->executeUpdate("usuario", $upgrade, "WHERE idUsuario=:id", "id={$id}");

        $urlRedirect = URLADM . "list-solicitacoes";
        header("Location: $urlRedirect");
    }

    public function recusar(int|string|null $id = null): void
    {
        var_dump($id);
        $upgrade = array(
            'adms_user_sits' => 1
        );
        $recusarSolicitacao = new \Admin\Models\helper\crud\AdminUpdate();
        $recusarSolicitacao->executeUpdate("usuario", $upgrade, "WHERE idUsuario=:id", "id={$id}");

        $urlRedirect = URLADM . "list-solicitacoes/";
        header("Location: $urlRedirect");
    }


    // /**
    //  * Recebe os dados da VIEW, através de um formulário.
    //  * Instancia a MODEL responsável na edição do curso.
    //  * 
    //  * @return void
    //  */
    // private function editAula(): void
    // {
    //     if (!empty($this->dataForm['EditAula'])) {
    //         unset($this->dataForm['EditAula']);

    //         echo "Daniel";

    //         $editAula = new \Admin\Models\AdminEditAula();
    //         $editAula->update($this->dataForm);

    //         if ($editAula->getResult()) {
    //             $urlRedirect = URLADM . "view-aula/index/" . $this->dataForm['idAula'];
    //             header("Location: $urlRedirect");
    //         } else {
    //             $this->data['form'] = $this->dataForm;
    //             $this->loadView();
    //         }
    //     } else {
    //         $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não encontrado!</p>";
    //         $urlRedirect = URLADM . "list-cursos/index";
    //         header("Location: $urlRedirect");
    //     }
    // }
}
