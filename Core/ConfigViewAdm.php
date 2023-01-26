<?php

namespace Core;

// Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
if (!defined('D3V3G4T3')) {
    //header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Carrega as páginas da View
 */
class ConfigViewAdm
{
    /**
     * Recebe o endereço da View e os dados
     *
     * @param string $nameView Endereoço da View que deve ser carregada
     * @param array|string|null $data Dados que a View deve receber
     */
    public function __construct(private string $nameView, private array|string|null $data)
    {
    }

    /**
     * Carrega a View
     * Verifica se o arquivo existe, caso exista, o carrega e se não existir para o carregamento
     *
     * @return void
     */
    public function loadView(): void
    {
        if (file_exists('App/admin/' . $this->nameView . '.php')) {
            include 'app/admin/Views/include/header.php';
            include 'app/admin/Views/include/menu.php';
            include 'app/admin/' . $this->nameView . '.php';
            include 'app/admin/Views/include/footer.php';
        } else {
            die("Erro na VIEW: Por favor tente novamente. Caso o problema persista, entre em contato com o suporte: " . EMAILADM);
        }
    }

    /**
     * Carrega a View dos formulários
     * Verifica se o arquivo existe, caso exista, o carrega e se não existir para o carregamento
     *
     * @return void
     */
    public function loadViewForms(): void
    {
        if (file_exists('app/admin/' . $this->nameView . '.php')) {
            include 'app/admin/Views/include/header.php';
            include 'app/admin/Views/include/menu.php';
            include 'app/admin/' . $this->nameView . '.php';
            include 'app/admin/Views/include/footer.php';
        } else {
            die("Erro na VIEW: Por favor tente novamente. Caso o problema persista, entre em contato com o suporte: " . EMAILADM);
        }
    }
}
