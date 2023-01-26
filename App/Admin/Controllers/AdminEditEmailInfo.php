<?php

namespace Admin\Controllers;

class AdminEditEmailInfo
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW.*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário.*/
    private array|null $dataForm;

    /** @var int|string|null $data Recebe o id do registro.*/
    private int|string|null $id;

    /**
     * Instancia a classe responsável em carregar a View.
     * E envia os dados para a View.
     * 
     * @return void
     */
    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if ((empty($this->dataForm['EditEmail']))) {
            
            $viewEmailInfo = new \Admin\Models\AdminEditEmailInfo();
            $viewEmailInfo->viewEmailInfo();

            if ($viewEmailInfo->getResult()) {
                $this->data['form'] = $viewEmailInfo->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "erro/index";
                header("Location: $urlRedirect");
            }
        } else {
            $this->editEmailInfo();
        }
    }


    /**
     * Recebe os dados da VIEW, através de um formulário.
     * Instancia a MODEL responsável na edição do curso.
     * 
     * @return void
     */
    private function editEmailInfo(): void
    {
        if (!empty($this->dataForm['EditEmail'])) {
            unset($this->dataForm['EditEmail']);

            $editEmail = new \Admin\Models\AdminEditCursos();
            $editEmail->update($this->dataForm);

            if ($editEmail->getResult()) {
                $urlRedirect = URLADM . "view-curso/index/" . $this->dataForm['idCurso'];
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
                $this->loadView();
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não encontrado!</p>";
            $urlRedirect = URLADM . "erro/index";
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER.
     * Passa os dados a serem carregados na VIEW.
     * 
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigViewAdm("Views/email/editEmailInfo", $this->data);
        $loadView->loadView();
    }
}
