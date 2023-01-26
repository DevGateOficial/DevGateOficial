<?php

namespace Public\Models;

class PublicAulaAssistida
{
    private $idAula;
    private $idUsuario;
    private $idCurso;

    public function addAulaAssistida($idAula)
    {
        $this->idAula = $idAula;
        $this->idUsuario = $_SESSION['user_idUsuario'];

        $getCurso = new \Public\Models\helper\crud\PublicRead();
        $getCurso->executeRead("aula", "WHERE idAula =:idAula", "idAula={$this->idAula}");
        $this->idCurso = $getCurso->getResult()[0]['idCurso'];

        $read = new \Public\Models\helper\crud\PublicRead();
        $read->executeRead("usuario_has_curso", "WHERE usuario_idUsuario = :idUsuario AND curso_idCurso = :idCurso", "idUsuario={$this->idUsuario}&idCurso={$this->idCurso}");
        $data = $read->getResult();
        $aulasAssistidas = unserialize($data[0]['aulas_assistidas'] ?? '');

        if (!is_array($aulasAssistidas)) {
            $aulasAssistidas = array();
        }

        // Add new idAula to the list
        if (!in_array($this->idAula, $aulasAssistidas)) {
            array_push($aulasAssistidas, $this->idAula);
        }

        $update = new \Public\Models\helper\crud\PublicUpdate();
        $update->executeUpdate("usuario_has_curso", ['aulas_assistidas' => serialize($aulasAssistidas)], "WHERE usuario_idUsuario = :idUsuario AND curso_idCurso = :idCurso", "idUsuario={$this->idUsuario}&idCurso={$this->idCurso}");
    }

    public function getAulasAssistidas()
    {
        $idUsuario = $_SESSION['user_idUsuario'];

        $read = new \Public\Models\helper\crud\PublicRead();
        $read->executeRead("usuario_has_curso", "WHERE usuario_idUsuario = :idUsuario", "idUsuario={$idUsuario}");
        $data = $read->getResult();

        if(!empty($data[0]['aulas_assistidas'])){
            $aulasAssistidas = unserialize($data[0]['aulas_assistidas']);
        }else{
            $aulasAssistidas = array();
        }

        return $aulasAssistidas;
    }
}
