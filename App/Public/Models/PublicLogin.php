<?php

namespace Public\Models;

/**
 * Classe responsável em realizar o login do usuário no sistema
 */
class PublicLogin
{
    /** @var array|null $data Recebe os dados do formulario de login*/
    private array|null $data;

    /** @var array|null $resultBd Recebe o resultado da busca do usuario no banco de dados*/
    private array|null $resultBd;

    /** @var bool $result Recebe TRUE ou FALSE para indicar se o processamento ocorreu com sucesso*/
    private $result;

    /**
     * Retorna para quem intansciou a criação dos registros o resultado da ação. Se foi ou não possível
     * realiza-la.
     *
     * @return string|null
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Realiza a pesquisa no banco de dados para encontrar um usuário com os dados referentes ao login.
     * Caso encontre, continua com as proximas etapas de validação.
     * Caso não, retorna false e exibe uma mensagem de erro.
     *
     * @param array|null $data
     * @return void
     */
    public function login(array|null $data = null): void
    {
        $this->data = $data;

        $viewUser = new \Public\Models\helper\crud\PublicRead();

        //Realiza a busca de informações do usuário indicado no banco de dados
        $viewUser->fullRead(
            "SELECT idUsuario, nomeCompleto, email, senha, nomeUsuario, dtNascimento, tipoUsuario, adms_user_sits, imagem FROM usuario WHERE email =:user OR nomeUsuario =:user LIMIT :limit",
            "user={$this->data['user']}&limit=1"
        );

        $this->resultBd = $viewUser->getResult();
        if ($this->resultBd) {
            $this->valEmailPerm();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Usuário ou senha incorreto! </p>";
            $this->result = false;
        }
    }

    /**
     * Verifica a situação do usuário no tocante à confirmação do email.
     * Se o usuário já tiver confirmado o email, segue com a validação.
     * Caso contrário, retorna falso e exibe uma mensagem de erro.
     *
     * @return void
     */
    private function valEmailPerm(): void
    {
        if (($this->resultBd[0]['adms_user_sits'] == 1 ) || ($this->resultBd[0]['adms_user_sits'] == 4) ) {
            $this->validarPassword();
        } elseif ($this->resultBd[0]['adms_user_sits'] == 3) {
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Necessário confirmar o e-mail! </p>";
            $this->result = false;
        }
    }

    /**
     * Verifica se a senha informada coincide com a salva no banco de dados.
     * Caso sim, valida o login e salva as informações do usuarios em variaveis globais.
     * Caso contrário, retorna falso e exibe uma mensagem de erro.
     *
     * @return void
     */
    private function validarPassword(): void 
    {
        if (password_verify($this->data['password'], $this->resultBd[0]['senha'])) {
            //$_SESSION['msg'] = "<p style='color: green'> Login realizado com sucesso! </p>";

            var_dump($this->resultBd[0]);
            $_SESSION['user_idUsuario'] = $this->resultBd[0]['idUsuario'];
            $_SESSION['user_nomeCompleto'] = $this->resultBd[0]['nomeCompleto'];
            $_SESSION['user_email'] = $this->resultBd[0]['email'];
            $_SESSION['user_nomeUsuario'] = $this->resultBd[0]['nomeUsuario'];
            $_SESSION['user_tipoUsuario'] = $this->resultBd[0]['tipoUsuario'];
            $_SESSION['user_imagem'] = $this->resultBd[0]['imagem'];
            $_SESSION['user_adms_user_sits'] = $this->resultBd[0]['adms_user_sits'];

            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'> Erro: Usuário ou senha incorreto! </p>";
            $this->result = false;
        }
    }
}
