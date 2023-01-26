<?php

namespace Public\Models;

/**
 * Classe responsável na listagem de cursos do banco de dados
 */
class PublicList
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data = null;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os dados buscados no banco de dados*/
    private array|null $resultBd;

    // Tabela principal
    private int $id;
    private string $table;
    private string $secTable;

    // Tabela "mãe"
    private string $idName;

    /**
     * Retorna o resultado da validação, caso ocorra com sucesso, retorna true
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Retorna os dados vindos da busca no banco de dados.
     *
     * @return boolean
     */
    public function getResultBd(): array|null 
    {
        return $this->resultBd;
    }

    /**
     * Verifica se o curso informado realmente existe.
     * Caso exista, retorna true e os dados referentes ao curso.
     * Caso não exista, retorna false e uma mensagem de erro.
     *
     * @return void
     */
    public function list(int|string|null $id, string|null $table = null, string|null $sTable = null): void
    {
        // recebe o id da tabela mãe
        // pesquisa os registros (id e nome) da tabala filha

        $this->id = $id;
        $this->table = $table;
        $this->secTable = $sTable;

        $this->organizeParam();


        $list = new \Public\Models\helper\crud\PublicRead();
        $list->fullRead("SELECT * FROM {$this->secTable} WHERE {$this->idName} =:id", "id={$this->id}");

        $this->resultBd = $list->getResult();

        if($this->resultBd){
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: red;'>Nenhum registro encontrado!</p>";
            $this->result = false;
        }
    }

    private function organizeParam(): void
    {
        $this->idName = 'id' . ucwords($this->table);
    }
    
}