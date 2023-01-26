<?php

namespace Admin\Models\helper\crud;

use PDO;
use PDOException;

/**
 * Classe genérica para selecionar registro no banco de dados
 */
class AdminRead extends AdminConn
{
    private string $select;
    private array $values = [];
    private array|null $result;
    private object $query;
    private object $conn;

    public function getResult(): array|null
    {
        return $this->result;
    }

    public function executeRead(string $table, string|null $terms = null, string|null $parseString = null): void
    {
        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }

        $this->select = "SELECT * FROM {$table} {$terms}";

        $this->executeInstruction();
    }

    public function fullRead(string $query, string|null $parseString = null): void
    {
        $this->select = $query;
        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }

        $this->executeInstruction();
    }

    private function executeInstruction(): void
    {
        $this->connection();
        
        try {
            $this->executeParameter();
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        } catch (PDOException $err) {
            $this->result = null;
        }
    }

    private function connection(): void
    {
        $this->conn = $this->connectDb();
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }

    private function executeParameter(): void
    {
        if ($this->values) {
            foreach ($this->values as $link => $value){ 
                if (($link == 'limit') or ($link == 'offset') or ($link == 'idUsuario')) {
                    $value = (int) $value;
                }

                $this->query->bindValue(":{$link}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}
