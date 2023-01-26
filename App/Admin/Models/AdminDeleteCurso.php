<?php

namespace Admin\Models;

/**
 * Classe responsável em deletar cursos no banco de dados
 */
class AdminDeleteCurso
{
    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    /** @var int|string|null $idCurso R ecebe o id do curso que deve ser deletado no banco e dados*/
    private int|string|null $idCurso;

    /** @var array Undocumented variable*/
    private array $listAulas;

    /** @var array Undocumented variable*/
    private array $listAtividades = [];

    /**
     * Retorna a situação do cadastro para quem o instanciar.
     * Caso execute com sucesso retorna true, caso de algum problema, retorna false
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Classe responsável em pesquisar todas as aulas referentes ao curso em questão.
     * As armazena em um array.
     *
     * @param [type] $idCurso
     * @return void
     */
    public function getAulas($idCurso): void
    {
        $this->idCurso = $idCurso;

        $viewAulas = new \Admin\Models\helper\crud\AdminRead();
        $viewAulas->fullRead("SELECT idAula
                                FROM aula
                                WHERE idCurso =:id", "id={$this->idCurso}");

        $this->listAulas = $viewAulas->getResult();

        $this->getAtividades();
    }

    /**
     * Utilizando os IDs das aulas encontradas no curso, percorre o banco de dados, buscando todas as atividades que
     * possuem relação com o curso em questão, as armazenando em um array.
     *
     * @return void
     */
    public function getAtividades(): void
    {
        foreach ($this->listAulas as $aula) {

            $id = (string) $aula['idAula'];

            $viewAtividades = new \Admin\Models\helper\crud\AdminRead();
            $viewAtividades->fullRead("SELECT idAtividade
                                        FROM atividade
                                        WHERE idAula =:id", "id={$id}");

            $atividades = $viewAtividades->getResult();

            if ($atividades) {
                array_push($this->listAtividades, $atividades[0]['idAtividade']);
            }
        }

        $this->deleteAtividades();
    }

    /**
     * Instancia o método genérico para deletar registros no banco de dados.
     * Percorre o array que guardo o Id de todas as atividades referentes ao curso.
     * Deleta todas as atividades encontradas no array.
     *
     * @return void
     */
    private function deleteAtividades(): void
    {
        if ($this->listAtividades) {
            foreach ($this->listAtividades as $atividade) {
                $idAtividade = (string) $atividade;

                $deleteAtiv = new \Admin\Models\helper\crud\AdminDelete();
                $deleteAtiv->executeDelete("atividade", $idAtividade);
            }
        }

        $this->deleteAulas();
    }

    /**
     * Instancia o método genérico para deletar registros no banco de dados.
     * Percorre o array que guardo o Id de todas as aulas referentes ao curso.
     * Deleta todas as aulas encontradas no array.
     *
     * @return void
     */
    private function deleteAulas(): void
    {
        if ($this->listAulas) {
            foreach ($this->listAulas as $aula) {
                $idAula = (string) $aula['idAula'];

                $deleteAula = new \Admin\Models\helper\crud\AdminDelete();
                $deleteAula->executeDelete("aula", $idAula);
            }
        }

        $this->deleteRegisters();
    }

    private function deleteRegisters(): void
    {
        $deleteRegister = new \Admin\Models\helper\crud\AdminDelete();
        $deleteRegister->fullDelete("DELETE FROM usuario_has_curso WHERE curso_idCurso={$this->idCurso}");
    
        $this->deleteCurso();
    }
    /**
     * Instancia o método genérico para deletar registros no banco de dados.
     * Passa as informações referentes ao curso, para que possa ser deletado.
     *
     * @return void
     */
    private function deleteCurso(): void
    {
        $deleteCurso = new \Admin\Models\helper\crud\AdminDelete();
        $deleteCurso->executeDelete("curso", $this->idCurso);


        if ($deleteCurso->getResult()) {
            $this->result = true;
        } else {
            $this->result = false;
        }
    }
}
