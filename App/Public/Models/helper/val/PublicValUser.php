<?php

namespace Public\Models\helper\val;

/**
 * Classe responsável na validação das informações do usuário.
 * 
 * Confere se o nome do usuário é unico no sistema.
 * Valida se o email utilizado no cadastro é num formato válido.
 * Confere se o email a ser cadastrado já existe no banco de dados, caso exista, não permite o cadastro.
 */
class PublicValUser
{
    /** @var string $email Recebe o email do formulário de cadastro do usuário*/
    private string $email;

    /** @var string $usuario Recebe o usuario do formulário de cadastro do usuário*/
    private string $nomeUsuario;

    /** @var string $idUsuario Recebe o id do usuário que possui o email cadastrado*/
    private int|null $idUsuario;

    /** @var string $edit Recebe a informação que é utilizada para verificar se é para validar o usuario para o cadastro ou edição*/
    private bool|null $edit;

    /** @var string $resultBd Recebe os registros do banco de dados*/
    private array|null $resultBd;

    /** @var string $result Retorna o resultado da validação do nome do usuario, caso ocorra com sucesso, retorna true*/
    private bool $resultUser = false;

    /** @var string $resultEmail Retorna o resultado da validação do email, caso ocorra com sucesso, retorna true*/
    private bool $resultEmail;

    /** @var string $resultEmailSingle Retorna o resultado da validação se o email é único, caso ocorra com sucesso, retorna true*/
    private bool $resultEmailSingle;

    /**
     * Retorna o resultado da validação do email, caso ocorra com sucesso, retorna true
     *
     * @return boolean
     */
    public function getResultEmail(): bool
    {
        return $this->resultEmail;
    }

    /**
     * Retorna o resultado da validação do nome do usuário e do email, caso ocorra com sucesso, retorna true
     *
     * @return boolean
     */
    public function getResultUser(): bool
    {
        return $this->resultUser;
    }

    /**
     * Recebe o email do cadastro e confere se possui um formato válido
     *
     * @param string $email
     * @return void
     */
    public function validadeEmail(string $email): void
    {
        $this->email = $email;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->resultEmail = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Email Inválido!</p>";
            $this->resultEmail = false;
        }
    }

    /**
     * Recebe o nome de usuário do cadastro, e confere se ja está cadastrado no banco de dados.
     * Recebe o email do cadastro e confere se ja está cadastrado no banco de dados.
     * Caso o nome de usuário ou o email já esteja cadastrado, não realizada o cadastro do novo usuário.
     *
     * @param string $usuario
     * @param string $email
     * @param boolean|null|null $edit
     * @param integer|null|null $idUsuario
     * @return void
     */
    public function validadeUser(string $usuario, string $email, bool|null $edit = null, int|null $idUsuario = null): void
    {
        $this->nomeUsuario = $usuario;
        $this->idUsuario = $idUsuario;
        $this->email = $email;
        $this->edit = $edit;

        $valUserSingle = new \Public\Models\helper\crud\PublicRead();

        if (($this->edit == true) and (!empty($this->idUsuario))) {
            $valUserSingle->fullRead(
                "SELECT idUsuario FROM usuario WHERE (email =: email OR nomeUsuario =:nomeUsuario) AND idUsuario <>:idUsuario LIMIT :limit",
                "nomeUsuario={$this->nomeUsuario}&idUsuario={$this->idUsuario}&limit=1");
        } else {
            $valUserSingle->fullRead("SELECT idUsuario FROM usuario WHERE nomeUsuario =:nomeUsuario LIMIT :limit", "nomeUsuario={$this->nomeUsuario}&limit=1");
        }

        $this->resultBd = $valUserSingle->getResult();

        if (!$this->resultBd) {
            $this->resultUser = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Nome de usuário já cadastrado!</p>";
            $this->resultUser = false;
        }
    }
}
