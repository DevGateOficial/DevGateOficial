<?php

namespace Admin\Models;

class AdminEditEmailInfo
{
    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /**
     * Retorna true qwuando executar o processo com sucesso, retorna false quando ocorrer algum erro
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Retorna os registro do banco de dados
     * @return array|null
     */
    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    public function viewEmailInfo(): void
    {
        $viewEmail = new \Admin\Models\helper\crud\AdminRead();
        $viewEmail->executeRead("adms_email");

        $this->resultBd = $viewEmail->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Dados do email não encontrados!</p>";
            $this->result = false;
        }
    }

    public function updateEmail(array $data = null): void
    {
        $this->data = $data;

        $valEmptyField = new \Admin\Models\helper\AdminValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->edit();
        } else {
            $this->result = false;
        }
    }

    private function edit(): void
    {
        $updateEmail = new \Admin\Models\helper\crud\AdminUpdate();
        $updateEmail->executeUpdate("adms_email", $this->data);

        if ($updateEmail->getResult()) {
            $_SESSION['msg'] = "<p style='color: green;'> Informações atualizadas com sucesso! </p>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível atualizar as informações!</p>";
            $this->result = false;
        }
    }

}
