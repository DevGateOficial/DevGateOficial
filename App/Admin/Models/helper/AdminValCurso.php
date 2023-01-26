<?php

namespace Admin\Models\helper;

/**
 * Classe responsável em validar o curso.
 * Somente um cadastro pode utilizar o nomeCurso.
 */
class AdminValCurso
{
    /** @var string $usuario Recebe o nome do curso do formulário de cadastro de curso*/
    private string $nomeCurso;

    /** @var string $usuario Recebe o nome do curso do formulário de cadastro de curso*/
    private string $idResponsavel;

    /** @var bool $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /** @var string $edit Recebe a informação que é utilizada para verificar se é para validar o usuario para o cadastro ou edição*/
    private bool|null $edit;

    /** @var string $idCurso Recebe o id do usuário que possui o nomeCurso cadastrado*/
    private int|null $idCurso;

    /** @var string $resultBd Recebe os registros do banco de dados*/
    private array|null $resultBd;

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
     * Responsável em fazer a validação do nome do nome do curso a ser registrado.
     * Confere na base de dados, a existencia de um nome igual, caso encontre, não realiza o cadastro.
     *
     * @param string $nomeCurso
     * @param boolean|null|null $edit
     * @param integer|null|null $idCurso
     * @return void
     */
    public function validadeCurso(string $nomeCurso, bool|null $edit = null, int|null $idCurso = null): void
    {
        $this->nomeCurso = $nomeCurso;
        $this->edit = $edit;
        $this->idCurso = $idCurso;

        $valCursoSingle = new \Admin\Models\helper\crud\AdminRead();
        if (($this->edit == true) and (!empty($this->idCurso))) {
            $valCursoSingle->fullRead(
                "SELECT idCurso FROM curso WHERE nomeCurso =:nomeCurso LIMIT :limit",
                "nomeCurso={$this->nomeCurso}&limit=1");
        } else {
            $valCursoSingle->fullRead("SELECT idCurso FROM curso WHERE nomeCurso =:nomeCurso AND idCurso<>:idCurso LIMIT :limit", 
                                            "nomeCurso={$this->nomeCurso}&idCurso={$this->idCurso}&limit=1");
        }

        $this->resultBd = $valCursoSingle->getResult();

        if (!$this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: O nome do curso já está em uso!</p>";
            $this->result = false;
        }
    }
}
