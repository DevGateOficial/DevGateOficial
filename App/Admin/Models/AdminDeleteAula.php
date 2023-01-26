<?php

namespace Admin\Models;

/**
 * Model responsável por deletar aulas no banco de dados
 */
class AdminDeleteAula
{
    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    /** @var int|string|null $idCurso R ecebe o id do curso que deve ser deletado no banco e dados*/
    private int|string|null $idAula;

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
     * Classe responsável em pesquisar todas as atividades referentes à aula em questão.
     * Armazena od IDs das atividades em um array.
     *
     * @param [type] $idCurso
     * @return void
     */
    public function getAtividades($idAula): void
    {
        $this->idAula = $idAula;

        $viewAulas = new \Admin\Models\helper\crud\AdminRead();
        $viewAulas->fullRead("SELECT idAtividade
                                FROM atividade
                                WHERE idAula =:id", "id={$this->idAula}");

        $this->listAtividades = $viewAulas->getResult();

        var_dump($this->listAtividades);

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
        if($this->listAtividades){
            foreach($this->listAtividades as $atividade) {
                $idAtividade = (string) $atividade['idAtividade'];
                $deleteAtiv = new \Admin\Models\helper\crud\AdminDelete();
                $deleteAtiv->executeDelete("atividade", $idAtividade);
            }
        }

        $this->deleteAula();
    }

    /**
     * Instancia o método genérico para deletar registros no banco de dados.
     * Passa as informações referentes à aula, para que possa ser deletada.
     *
     * @return void
     */
    private function deleteAula(): void
    {
        $deleteAula = new \Admin\Models\helper\crud\AdminDelete();
        $deleteAula->executeDelete("aula", $this->idAula);

        if($deleteAula->getResult()){
            $this->result = true;
        } else{
            $this->result = false;
        }
    }
}