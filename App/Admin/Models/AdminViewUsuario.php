<?php

namespace Admin\Models;

class AdminViewUsuario
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

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

    /**
     * Faz a leitura do usuário correspondente ao id que é recebido através da controller
     *
     * @param integer $id
     * @return void
     */
    public function viewUser(int $id): void
    {
        $this->id = $id;

        $viewCurso = new \Admin\Models\helper\crud\AdminRead();
        $viewCurso->fullRead("SELECT usr.*, edc.* 
                                FROM usuario AS usr 
                                LEFT JOIN endereco AS edc ON edc.idEndereco=usr.endereco
                                WHERE idUsuario =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Usuario não encontrado!</p>";
            $this->result = false;
        }
    }
}