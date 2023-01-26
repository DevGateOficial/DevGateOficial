<?php

namespace Admin\Controllers;

class AdminCadastroAtividade
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

        if ((!empty($id)) and (empty($this->dataForm['CadastrarAtividade']))) {
            $this->id = (int) $id;
            $viewAula = new \Admin\Models\AdminCadastroAtividade();
            $viewAula->viewAula($this->id);

            if ($viewAula->getResult()) {
                $this->data['form'] = $viewAula->getResultBd();
                $urlRedirect = URLADM . "view-aula/index";
                header("Location: $urlRedirect");
            } else {
                $urlRedirect = URLADM . "list-aulas/index";
                header("Location: $urlRedirect");
            }
        } else {
            $this->createAtividade();
        }
    }

    /**
     * Recebe os dados da VIEW, através de um formulário.
     * Instancia a MODEL responsável na edição da imagem.
     * 
     * @return void
     */
    private function createAtividade(): void
    {
        if (!empty($this->dataForm['CadastrarAtividade'])) {
            unset($this->dataForm['CadastrarAtividade']);

            if($this->dataForm['tipoAtividade'] != 'videoAula'){
                $this->dataForm['url'] = $_FILES['url'] ? $_FILES['url'] : $this->dataForm['url'];
            } 

            $createAtividade = new \Admin\Models\AdminCadastroAtividade();
            $createAtividade->create($this->dataForm);

            var_dump($createAtividade->getResult());

            if ($createAtividade->getResult()) {
                echo "CONTROLLER - FOI CERTO AMIGXS";
                $urlRedirect = URLADM . "view-aula/index/" . $this->dataForm['idAula'];
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Aula não encontrado!</p>";
            $urlRedirect = URLADM . "list-aulas/index";
            header("Location: $urlRedirect");
        }
    }
}