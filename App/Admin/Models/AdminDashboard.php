<?php

namespace Admin\Models;

use LDAP\Result;

/**
 * Classe responsavel pela dashboard da area administrativa
 */
class AdminDashboard
{

    private array|object|null $getData;

    private array|string|null $result = [];

    public function getResult(): array|string|null
    {
        return $this->result;
    }

    function __construct()
    {
        $this->getData = new \Admin\Models\helper\crud\AdminRead();
    }

    public function getDataAlunos(): void
    {
        $this->getData->fullRead("SELECT idUsuario FROM usuario WHERE tipoUsuario=:tipo", "tipo=aluno");
        $this->result['alunos'] = count($this->getData->getResult());
        $this->getDataCursos();
    }

    public function getDataCursos(): void
    {
        $this->getData->fullRead("SELECT idCurso FROM curso WHERE idCurso > :id", "id=-1");
        $this->result['cursos'] = count($this->getData->getResult());
        $this->getDataProfessores();
    }

    public function getDataProfessores(): void
    {
        $this->getData->fullRead("SELECT idUsuario FROM usuario WHERE tipoUsuario=:tipo", "tipo=professor");
        $this->result['professores'] = count($this->getData->getResult());
        $this->getDataAdmin();
    }

    public function getDataAdmin(): void
    {
        $this->getData->fullRead("SELECT idUsuario FROM usuario WHERE tipoUsuario=:tipo", "tipo=administrador");
        $this->result['admin'] = count($this->getData->getResult());
    }
}
