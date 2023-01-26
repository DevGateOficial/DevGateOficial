<?php

namespace Public\Controllers;

/**
 * Controller da página para confirmar e-mail.
 */
class ConfEmail
{
    /** @var string|null $key Recebe a chave de confirmação de e-mail*/
    private string|null $key;

    /**
     * Instancia a classe responsável em carregar a View.
     * Envia os dados para a View.
     * 
     * @return void
     */
    public function index(): void
    {
        $this->key = filter_input(INPUT_GET, "key", FILTER_DEFAULT);
        
    
        if (!empty($this->key)) {
            $this->valKey();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
            $urlRedirect = URL . "erro/index";
            header("Location: $urlRedirect");
        }
    }

    /**
     * Método responsável em verificar a chave recebida.
     * 
     * @return void
     */
    private function valKey(): void
    {
        $confEmail = new \Public\Models\helper\email\PublicConfEmail();
        $confEmail->confEmail($this->key);
        
        if ($confEmail->getResult()) {
            $urlRedirect = URL;
            header("Location: $urlRedirect");
        } else {
            $urlRedirect = URL;
            header("Location: $urlRedirect");
        }
    }
}
