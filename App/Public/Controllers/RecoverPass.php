<?php

namespace Public\Controllers;

/**
 * Controller da página recuperação de senha.
 */
class RecoverPass
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
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
        if (!empty($this->dataForm['Enviar'])) {
            unset($this->dataForm['Enviar']);
            $recoverPass = new \Public\Models\PublicRecoverPass();
            $recoverPass->recoverPass($this->dataForm);

            if ($recoverPass->getResult()) {
                $urlRedirect = URL;
                header("Location: $urlRedirect");
            } else {
                $this->data['form'] = $this->dataForm;
                $this->recoverPass();
            }
        } else {
            $this->recoverPass();
        }
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER.
     * Passa os dados a serem carregados na VIEW.
     * 
     * @return void
     */
    private function recoverPass(): void
    {
        $loadView = new \Core\ConfigView("Views/usuario/recoverPass", $this->data);
        $loadView->loadViewForms();
    }
}
