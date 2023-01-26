<?php

namespace Admin\Controllers;

class AdminListSolicitacoes
{
        /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
        private array|string|null $data = [];

        /** @var array|null $dataForm Recebe os dados do formulário*/
        private array|null $dataForm;
        
        /**
         * Instancia a classe responsável em carregar a View.
         * Enviar os dados para a View. 
         * 
         * @return void
         */
        public function index(): void
        {
            $listSolicitacoes = new \Admin\Models\AdminListSolicitacoes();
            $listSolicitacoes->viewSolicitacoes();

            $this->data['listSolicitacoes'] = $listSolicitacoes->getResultBd();
    
            $this->loadView();
        }
    
        /**
         * Método responsável em carregar a VIEW referente ao CONTROLLER
         * Passa os dados a serem carregados na VIEW.
         *
         * @return void
         */
        private function loadView(): void
        {
            $loadView = new \Core\ConfigViewAdm("/Views/usuarios/listSolicitacoes", $this->data);
            $loadView->loadView();
        }
}