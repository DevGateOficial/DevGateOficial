<?php

namespace Public\Controllers;

class Login
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    public function index()
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['SendLogin'])){
            $validarLogin = new \Public\Models\PublicLogin();
            $validarLogin->login($this->dataForm);

            if($validarLogin->getResult()){
                $urlRedirect = URL . "home/index";
                header("Location: $urlRedirect");
            }else{
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
        $loadView = new \Core\ConfigView("Views/login/login", $this->data);
        $loadView->loadViewForms();
    }
}
