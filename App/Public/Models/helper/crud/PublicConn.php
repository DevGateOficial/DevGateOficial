<?php

    namespace Public\Models\helper\crud;

    use PDO;
    use PDOException;

    // Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
    if (!defined('D3V3G4T3')) {
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    /**
     * Guarda as credenciais do banco de dados e realiza a conexão com o mesmo
     */
    abstract class PublicConn
    {
        /** @var string $db Informa qual o banco de dados utilizado*/
        private string $db = DB;
        
        /** @var string $host Informa qual o local do banco de dados*/
        private string $host = HOST;

        /** @var string $user Informa qual o usuário do banco de dados*/
        private string $user = USER;

        /** @var string $pass Informa qual a senha do banco de dados*/
        private string $pass = PASS;

        /** @var string $dbname Informa qual o local da base de dados*/
        private string $dbname = DBNAME;

        /** @var int|string $port Informa qual a porta de conexão do banco de dados*/
        private int|string $port = PORT;
        
        /** @var object $connect Guarda a conexão com o banco de dados*/
        private object $connect;

        /**
         * Utiliza das credenciais previamente declaradas para realizar a conexão com o banco de dados
         *
         * @return object
         */
        public function connectDb(): object
        {
            try{
                $this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname,
                        $this->user, $this->pass);
                //echo "Conexão realizada com sucesso<br>";
                return $this->connect;

            }catch (PDOException $err){
                die('Ocorreu um erro na conexão com o banco de dados! Por gentileza tente novamente. Caso o problema persista, entre em contato com o suporte');
            }
        }

    }   