<?php

namespace Admin\Controllers;

/**
 * Controller da página de cadastro de aula.
 */
class AdminCadastroAula
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW */
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    private int|string|null $id;

    /**
     * Instancia a classe responsável em carregar a View.
     * Envia os dados para a View. 
     * 
     * @return void 
     */
    public function index(int|string|null $id = null): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if ((!empty($id)) and (empty($this->dataForm['CadastrarAula']))) {
            var_dump($this->dataForm);

            $this->id = (int) $id;
            $viewCurso = new \Admin\Models\AdminCadastroAula();
            $viewCurso->viewCurso($this->id);

            if ($viewCurso->getResult()) {
                $this->data['form'] = $viewCurso->getResultBd();
            } else {
                $urlRedirect = URL . "admin-list-cursos/index";
                // header("Location: $urlRedirect");
            }
        } else {
            $this->createAula();
        }
    }

    /**
     * Recebe os dados da VIEW, através de um formulário.
     * Instancia a MODEL responsável na edição da imagem.
     * 
     * @return void
     */
    private function createAula(): void
    {
        if (!empty($this->dataForm['CadastrarAula'])) {
            unset($this->dataForm['CadastrarAula']);

            var_dump($this->dataForm);

            $this->id = $this->dataForm['idCurso'];

            $createAula = new \Admin\Models\AdminCadastroAula();
            $createAula->create($this->dataForm);

            if ($createAula->getResult()) {
                $urlRedirect = URL . "admin-view-curso/index/" . $this->id;
                header("Location: $urlRedirect");
            } else {
                $urlRedirect = URL . "admin-list-cursos/index";
                // header("Location: $urlRedirect");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Curso não encontrado!</p>";
            $urlRedirect = URL . "admin-list-cursos/index";
            // header("Location: $urlRedirect");
        }
    }
}