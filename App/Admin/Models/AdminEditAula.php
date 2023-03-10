<?php

namespace Admin\Models;

class AdminEditAula
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /**
     * Retorna true qwuando executar o processo com sucesso, retorna false quando ocorrer algum erro
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Retorna os registro do banco de dados
     *
     * @return array|null
     */
    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    public function viewAula(int $id): void
    {
        $this->id = $id;

        $viewAula = new \Admin\Models\helper\crud\AdminRead();
        $viewAula->fullRead("SELECT *
                                FROM aula
                                WHERE idAula =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewAula->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $this->result = false;
        }
    }

    public function update(array $data = null): void
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
        $updateCurso = new \Admin\Models\helper\crud\AdminUpdate();
        $updateCurso->executeUpdate("aula", $this->data, "WHERE idAula=:idAula", "idAula={$this->data['idAula']}");

        if ($updateCurso->getResult()) {
            $_SESSION['msg'] = "<p style='color: green;'> Aula atualizada com sucesso! </p>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: N??o foi poss??vel atualizar a aula!</p>";
            $this->result = false;
        }
    }
}