<?php

namespace Admin\Models;

/**
 * Classe responsável na visualização de registros do banco de dados
 */
class AdminView
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var string|null $data Recebe o id do registro*/
    private string|null $table;

    /** @var string|null $data Recebe o id do registro*/
    private string|null $sTable;

    /** @var int|string|null $data Recebe o id do registro*/
    private string|null $viewId;

    /** @var string|null $data Recebe o id do registro*/
    private string|null $sViewId;

    /** @var string|null $data Recebe o id do registro*/
    private string|null $sViewName;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

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

    public function view(int $id, string $table, string $sTable): void
    {
        $this->id = $id;
        $this->table = $table;
        $this->sTable = $sTable;

        $this->viewId = 'id' . ucwords($this->table);
        $this->sViewId = 'id' . ucwords($this->sTable);

        $this->sViewName = 'nome' . ucwords($this->sTable);

        $viewAtividade = new \Admin\Models\helper\crud\AdminRead();
        $viewAtividade->fullRead("SELECT * FROM {$this->table} WHERE {$this->viewId} =:id", "id={$this->id}");

        // $viewAtividade->fullRead("SELECT tab1.*, tab2.{$this->sViewName} 
        //                         FROM {$this->table} AS tab1 
        //                         INNER JOIN {$this->sTable} AS tab2 ON tab2.{$this->sViewId}=tab1.{$this->sViewId}
        //                         WHERE {$this->viewId} =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewAtividade->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Registro não encontrado!</p>";
            $this->result = false;
        }
    }
}
