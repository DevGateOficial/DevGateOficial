<?php

session_start(); // Iniciar sessão
ob_start(); // Buffer de saída

//Constante que define que o usuário está acessando páginas internas através da página "index.php".
define('D3V3G4T3', true);

// Carrega o Composer
require './vendor/autoload.php';

// Instancia a classe ConfigController, responsável por tratar a URL
$url = new Core\ConfigController();

//Instancia o método para carregar a página/controller
$url->loadPage();
