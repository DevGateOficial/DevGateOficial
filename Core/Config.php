<?php

namespace Core;

/**
 * Configurações básicas do site.
 *
 */
abstract class Config
{
    /**
     * Possui as constantes com as configurações.
     * Configurações de endereço do projeto.
     * Página principal do projeto.
     * Credenciais de acesso ao banco de dados
     * E-mail do administrador.
     * 
     * @return void
     */
    protected function config(): void
    {
        // URL padrão do sistema
        define('URL', 'http://localhost/DevGateOficial/');

        // URL para a área administrativa do sistema
        define('URLADM', 'http://localhost/DevGateOficial/admin-');

        //URL para a utilização de assets
        define('URLSRC', 'http://localhost/DevGateOficial/app/');

        //URL para as imagems de curso 
        define('URL_curso', 'http://localhost/DevGateOficial/app/assets/data/cursos/');

        //URL para as imagems de atividade
        define('URL_atividade', 'http://localhost/DevGateOficial/app/assets/data/atividades/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Login');

        //Credenciais do banco de dados
        define('DB', 'mysql');
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', 'root');
        define('DBNAME', 'devgate_database');
        define('PORT', 3306);

        //Credencias de contato
        define('EMAILADM', 'DevGateOficial@gmail.com');
    } 
}