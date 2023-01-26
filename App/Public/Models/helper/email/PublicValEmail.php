<?php

namespace Public\Models\helper\email;

/**
 * Classe responsável em validar o email do usuário.
 * Valida se o email utilizado no cadastro é num formato válido.
 * Confere se o email a ser cadastrado já existe no banco de dados, caso exista, não permite o cadastro.
 */
class PublicValEmail
{
    /** @var string $email Recebe o email do formulário de cadastro do usuário*/
    private string $email;

    /** @var string $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

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
     * Recebe o email do cadastro e confere se possui um formato válido
     *
     * @param string $email
     * @return void
     */
    public function validadeEmail(string $email): void
    {
        $this->email = $email;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Email Inválido!</p>";
            $this->result = false;
        }
    }
}
