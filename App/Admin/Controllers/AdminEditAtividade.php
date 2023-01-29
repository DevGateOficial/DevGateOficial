<?php

namespace Admin\Controllers;

class AdminEditAtividade
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
    public function index(int|string|null $id = null): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if ((!empty($id)) and (empty($this->dataForm['EditAtividade']))) {
            $this->id = (int) $id;

            $viewAula = new \Admin\Models\AdminEditAula();
            $viewAula->viewAula($this->id);

            if ($viewAula->getResult()) {
                $this->data['form'] = $viewAula->getResultBd();
                $this->loadView();
            } else {
                $urlRedirect = URLADM . "list-cursos/index";
                header("Location: $urlRedirect");
            }
        } else {
            $this->editAula();
        }
    }


    /**
     * Recebe os dados da VIEW, através de um formulário.
     * Instancia a MODEL responsável na edição do curso.
     * 
     * @return void
     */
    private function editAula(): void
    {
        if (!empty($this->dataForm['EditAtividade'])) {
            unset($this->dataForm['EditAtividade']);

            if ($this->dataForm['tipoAtividade'] != 'videoAula') {
                $this->dataForm['url'] = $_FILES['url'] ? $_FILES['url'] : $this->dataForm['url'];
            }

            var_dump($this->dataForm);
            // $editAula = new \Admin\Models\AdminEditAula();
            // $editAula->update($this->dataForm);

            // if ($editAula->getResult()) {
            //     $urlRedirect = URLADM . "view-aula/index/" . $this->dataForm['idAula'];
            //     header("Location: $urlRedirect");
            // } else {
            //     $this->data['form'] = $this->dataForm;
            //     $this->loadView();
            // }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não encontrado!</p>";
            $urlRedirect = URLADM . "list-cursos/index";
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
        $loadView = new \Core\ConfigViewAdm("Views/aulas/editAula", $this->data);
        $loadView->loadView();
    }
}