<?php

namespace Public\Controllers;

/**
 * Controller da página de cadastro de usuário
 */
class UpgradeUsuario
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /**
     * Instancia a classe responsável em carregar a View. 
     * E envia os dados para a View.
     *
     * @return void
     */
    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if ($_SESSION['user_tipoUsuario'] = 'aluno') {
            if (!empty($this->dataForm['UpgradeUsuario'])) {

                unset($this->dataForm['UpgradeUsuario']);

                $upgradeUser = new \Public\Models\PublicUpgradeUsuario;
                $upgradeUser->create($this->dataForm);

                if ($upgradeUser->getResult()) {
                    $_SESSION['msg'] = "<p style='color:green;'> Solicitação de upgrade realizado com sucesso </p>";
                    $urlRedirect = URL . "home";
                    header("Location: $urlRedirect");
                } else {
                    $_SESSION['msg'] = "<p style='color:green;'>Erro</p>";
                    $this->data['form'] = $this->dataForm;
                }
            }

            $this->loadView();
        } else {
            $urlRedirect = URL . 'home';
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function loadView(): void
    {
        $loadView = new \Core\ConfigView("Views/usuario/upgradeUsuario", $this->data);
        $loadView->loadViewForms();
    }
}
