<?php

namespace Publics\Models\helper\email;

/**
 * Classe responsável em validar o email do usuário.
 * Valida se o email utilizado no cadastro é num formato válido.]
 * Confere se o email a ser cadastrado já existe no banco de dados, caso exista, não permite o cadastro.
 */
class PublicValEmailSingle
{
    /** @var string $email Recebe o email do formulário de cadastro do usuário*/
    private string $email;

    /** @var string $nomeUsuario Recebe o nomeUsuario do formulário de cadastro do usuário*/
    private string $nomeUsuario;

    /** @var string $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /** @var string $edit */
    private bool|null $edit;

    /** @var string $idUsuario Recebe o id do usuário que possui o email cadastrado*/
    private int|null $idUsuario;

    /** @var string $resultBd Retorna o id do usuário que possui o email cadastrado*/
    private array|null $resultBd;

    /**
     * Retorna o resultado da validação, caso ocorra com sucesso, retorna true
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Recebe o email do cadastro e confere se o email ja está cadastrado no banco de dados.
     * Caso já esteja cadastrado, não realizada o cadastro do novo usuário.
     *
     * @param string $email
     * @param boolean|null|null $edit
     * @param integer|null|null $idUsuario
     * @return void
     */
    public function validadeEmailSingle(string $email, string $nomeUsuario, bool|null $edit = null, int|null $idUsuario = null): void
    {
        $this->email = $email;
        $this->nomeUsuario = $nomeUsuario;
        $this->edit = $edit;
        $this->idUsuario = $idUsuario;

        $valEmailSingle = new \Public\Models\helper\crud\PublicRead();
        if (($this->edit == true) and (!empty($this->idUsuario))) {
            $valEmailSingle->fullRead(
                "SELECT idUsuario FROM usuario WHERE (email =:email OR nomeUsuario =:nomeUsuario) AND idUsuario <>:idUsuario LIMIT :limit",
                "email={$this->email}&nomeUsuario={$this->nomeUsuario}&idUsuario={$this->idUsuario}&limit=1");
        } else {
            $valEmailSingle->fullRead("SELECT idUsuario FROM usuario WHERE email =:email LIMIT :limit", "email={$this->email}&limit=1");
        }

        $this->resultBd = $valEmailSingle->getResult();

        if (!$this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Email já cadastrado!</p>";
            $this->result = false;
        }
    }
}
