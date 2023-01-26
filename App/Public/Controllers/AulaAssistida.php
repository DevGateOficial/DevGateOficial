<?php

namespace Public\Controllers;

class AulaAssistida
{
    public function index($idAula)
    {
        $aulaAssistidaModel = new \Public\Models\PublicAulaAssistida();
        $aulaAssistidaModel->addAulaAssistida($idAula);
    }
}