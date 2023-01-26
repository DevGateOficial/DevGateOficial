<?php

namespace Public\Models;

/**
 * Classe responsável na visualização de cursos do banco de dados
 */
class PublicViewCurso
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
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */ 
    public function viewCurso(int $id): void
    {
        $this->id = $id;

        $viewCurso = new \Public\Models\helper\crud\PublicRead();
        $viewCurso->fullRead("SELECT cur.*, usr.nomeUsuario 
                                FROM curso AS cur 
                                INNER JOIN usuario AS usr ON usr.idUsuario=cur.idResponsavel
                                WHERE idCurso =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Curso não encontrado!</p>";
            $this->result = false;
        }
    }
}
