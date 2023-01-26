<?php

    namespace Public\Models;

    // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    class PublicHome
    {
        /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
        private array|null $data = null;

        /**
         * Retornar os cursos existentes no banco de dados
         *
         * @return array
         */
        public function index(): array|null
        {
            $viewCurso = new \Public\Models\helper\crud\PublicRead();
            $viewCurso->fullRead("SELECT idCurso, nomeCurso, descricao, objetivos, hiperlink FROM curso LIMIT :limit", "limit=3");
            $this->data = $viewCurso->getResult();
   
            return $this->data;
        }
    }