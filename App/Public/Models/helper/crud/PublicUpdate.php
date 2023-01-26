<?php

namespace Public\Models\helper\crud;

use PDOException;

/**
 * Classe genérica para editar registro no banco de dados
 */
class PublicUpdate extends PublicConn
{
    /** @var string $table Recebe o nome da tabela no banco de dados*/
    private string $table;

    private string|null $terms;

    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array $data;
    private array $value = [];

    /** @var string|null $result Retorna os dados do cadastro*/
    private string|null|bool $result;

    private object $update;

    /** @var string $query Recebe a QUERY*/
    private string $query;

    /** @var object $conn Receba a conexão com o banco de dados*/
    private object $conn;

    private $params;

    /**
     * Retorna para quem intansciou a criação dos registros o resultado da ação. Se foi ou não possível
     * realiza-la.
     *
     * @return string|null|bool
     */
    public function getResult(): string|null|bool
    {
        return $this->result;
    }

    public function executeUpdate(string $table, array $data, string|null $terms = null, string|null $parseString = null, array $params = []): void
    {
        $this->table = $table;
        $this->data = $data;
        $this->terms = $terms;
        $this->params = $params;
        parse_str($parseString, $this->value);

        $this->exeReplaceValues();
    }

    /**
     * Cria a QUERY e os links da mesma
     * São utilizadas as funções para transformar as informações do $data em links, para serem adicionados à QUERY
     *
     * @return void
     */
    private function exeReplaceValues(): void
    {
        foreach ($this->data as $key => $value) {
            $values[] = $key . "=:" . $key;
        }

        $values = implode(', ', $values);

        $this->query = "UPDATE {$this->table} SET {$values} {$this->terms}";

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
        try{
            foreach ($this->params as $key => $value) {
                $this->update->bindValue(":" . $key, $value);
            }
            $this->update->execute(array_merge($this->data, $this->value));
            $this->result = true;
        }catch(PDOException $err){
            $this->result = null;
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
        $this->update = $this->conn->prepare($this->query);
        var_dump($this->query);
    }
}
