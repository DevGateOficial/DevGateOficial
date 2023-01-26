<?php

namespace Admin\Models\helper\crud;

use Admin\Models\helper\crud\AdminConn;

use PDOException;

/**
 * Classe generica para deletar registros no banco de dados
 */
class AdminDelete extends AdminConn
{
    /** @var string $table Recebe o nome da tabela no banco de dados*/
    private string $table;

    /** @var string $id Recebe o id do registro que deve ser deletado do banco de dados*/
    private string $id;

    /** @var string|null $result Retorna os dados*/
    private string|null $result = null;

    /** @var object $delete Recebe a query preparada*/
    private object $delete;

    /** @var string $query Recebe a QUERY*/
    private string $query;

    /** @var object $conn Receba a conexão com o banco de dados*/
    private object $conn;

    private string $column;

    /**
     * Retorna para quem intansciou a criação dos registros o resultado da ação. Se foi ou não possível
     * realiza-la.
     *
     * @return string|null
     */
    function getResult(): string|null
    {
        return $this->result;
    }

    /**
     * Recebe a tabela e os dados a serem excluídos do banco de dados.
     *
     * @param string $table
     * @param array $data
     * @return void
     */
    public function executeDelete(string $table, string $id): void
    {
        $this->table = $table;
        $this->id = $id;
        $this->column = "id" . ucwords($this->table);
        $this->query = "DELETE FROM {$this->table} WHERE {$this->column} = {$this->id} ";
        $this->executeInstruction();
    }

    public function fullDelete(string $query, string|null $parseString = null)
    {
        $this->query = $query;
        $this->executeInstruction();
    }

    /**
     * Executa a QUERY
     * Se executado corretamente, retorna o ultimo Id inserido, caso contrário retorna null.
     *
     * @return void
     */
    private function executeInstruction(): void
    {
        $this->connection();
        try {
            $this->delete->execute();
            $this->result = "deletou.";
        } catch (PDOException $err) {
            $this->result = "não deletou.";
        }
    }

    /**
     * Recebe a conexão com o banco de dados da classe pai "Conn".
     * Prepara uma instrução para execução e retorna um objeto de instrução.
     *
     * @return void
     */
    private function connection(): void
    {
        $this->conn = $this->connectDb();
        $this->delete = $this->conn->prepare($this->query);
    }
}
