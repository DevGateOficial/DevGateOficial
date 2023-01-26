<?php

namespace Admin\Controllers;

/**
 * Controller da página de cadastro de curso.
 */
class AdminCadastroCurso
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW */
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /**
     * Instancia a classe responsável em carregar a View.
     * Envia os dados para a View. 
     * 
     * @return void 
     */
    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dataForm['Cadastrar'])) {
            unset($this->dataForm['Cadastrar']);

            $this->dataForm['imagem'] = $_FILES['imagem'] ? $_FILES['imagem'] : null;
            $createCadastroCurso = new \Admin\Models\AdminCadastroCurso();
            $createCadastroCurso->create($this->dataForm);

            $getIdCurso = new \Admin\Models\helper\crud\AdminRead();
            $getIdCurso->fullRead("SELECT idCurso FROM curso WHERE nomeCurso=:nome", "nome={$this->dataForm['nomeCurso']}");

            if ($createCadastroCurso->getResult()) {
                $_SESSION['msg'] = "<p style='color:red;'> Curso cadastrado com sucesso </p>";
                $urlRedirect = URLADM . "view-curso/index/" . $getIdCurso->getResult()[0]['idCurso'];
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
            }
        }

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
        $loadView = new \Core\ConfigViewAdm('Views/cursos/cadastroCurso', $this->data);
        $loadView->loadView();
    }
}
