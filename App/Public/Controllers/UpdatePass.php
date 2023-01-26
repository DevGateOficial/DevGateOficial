<?php

namespace Public\Controllers;

/**
 * Controller da página editar a senha.
 */
class UpdatePass
{
    /** @var string|null $key Recebe a chave para confirmar o e-mail*/
    private string|null $key;

    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    /** @var array|null $dataForm Recebe os dados do formulário*/
    private array|null $dataForm;

    /**
     * Filtra as informações do formulário e envia para validação.
     * 
     * @return void
     */
    public function index(): void
    {

        $this->key = filter_input(INPUT_GET, "key", FILTER_DEFAULT);
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if ((!empty($this->key)) and (empty($this->dataForm['UpdatePass']))) {
            $this->validateKey();
        } else {
            $this->updatePassword();
        }
    }

    /**
     * Método responsável em verificar a chave recebida.
     *
     * @return void
     */
    private function validateKey(): void
    {
        $valkey = new \Public\Models\PublicUpdatePass();
        $valkey->valKey($this->key);

        if ($valkey->getResult()) {
            $this->viewUpdatePass();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido! Solicite um novo link <a href='" . URL . "recover-pass/index'>Clique aqui!</a></p>";
            $urlRedirect = URL;
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em editar a senha no banco de dados.
     *
     * @return void
     */
    private function updatePassword(): void
    {
        if (!empty($this->dataForm['UpdatePass'])) {
            unset($this->dataForm['UpdatePass']);
            $this->dataForm['key'] = $this->key;
            $upPass = new \Public\Models\PublicUpdatePass();
            $upPass->editPass($this->dataForm);
            if ($upPass->getResult()) {
                $urlRedirect = URL;
                header("Location: $urlRedirect");
            } else {
                $this->viewUpdatePass();
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido! Solicite um novo link <a href='" . URL . "recover-pass/index'>Clique aqui!</a></p>";
            $urlRedirect = URL;
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em carregar a VIEW referente ao CONTROLLER
     * Passa os dados a serem carregados na VIEW.
     *
     * @return void
     */
    private function viewUpdatePass(): void
    {
        $loadView = new \Core\ConfigView("/Views/usuario/updatePass", $this->data);
        $loadView->loadViewForms();
    }
}
