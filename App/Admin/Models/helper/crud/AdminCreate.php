<?php

namespace Admin\Models\helper\crud;

use PDOException;


// Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
if(!defined('D3V3G4T3')){
    //header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Helper responsável em cadastrar registros no banco de dados.
 * É uma classe que pode ser utilizada para registro em qualquer tabela do banco de dados,
 * visto que recebe parâmetros para os registros, a tornando genérica.
 */
class AdminCreate extends AdminConn
{
    /** @var string $table Recebe o nome da tabela no banco de dados*/
    private string $table;

    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array $data;

    /** @var string|null $result Retorna os dados do cadastro*/
    private string|null $result = null;

    /** @var object $insert Recebe a query preparada*/
    private object $insert;

    /** @var string $query Recebe a QUERY*/
    private string $query;

    /** @var object $conn Receba a conexão com o banco de dados*/
    private object $conn;

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
     * Recebe a tabela e os dados a serem adicionados ao banco de dados.
     *
     * @param string $table
     * @param array $data
     * @return void
     */
    public function executeCreate(string $table, array $data): void
    {
        $this->table = $table;
        $this->data = $data;

        $this->executeReplaceValues();
    }

    /**
     * Cria a QUERY e os links da mesma
     * São utilizadas as funções para transformar as informações do $data em links, para serem adicionados à QUERY
     *
     * @return void
     */
    private function executeReplaceValues(): void
    {
        $columns =  implode(', ' , array_keys($this->data));
        $values = ' :' . implode(', :' , array_keys($this->data));
        $this->query = "INSERT INTO {$this->table} ($columns) VALUES ($values)";

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
            $this->insert->execute($this->data);
            $this->result = $this->conn->lastInsertId();
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
        $this->insert = $this->conn->prepare($this->query);
    }
}