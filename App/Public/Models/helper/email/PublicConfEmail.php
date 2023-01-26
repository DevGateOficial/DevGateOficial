<?php

namespace Public\Models\helper\email;

use Public\Models\helper\crud\PublicConn;

/**
 * Classe responsável sobre a confirmação de email do usuário
 */
class PublicConfEmail extends PublicConn
{
    /** @var string $key Recebe a chave de confirmação de e-mail*/
    private string $key;

    /** @var array $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private $result;

    /** @var array|null $resultBd Retorna os dados do registro do banco de dados*/
    private array|null $resultBd;

    private array $data;

    /**
     * Retorna a situação do cadastro para quem o instanciar.
     * Caso execute com sucesso retorna true, caso de algum problema, retorna false.
     *
     * @return boolean
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Método responsável em verificar se a chave correponde a um usuário.
     *
     * @param string $key
     * @return void
     */
    public function confEmail(string $key): void
    {
        $this->key = $key;
        if (!empty($this->key)) {
            $viewKeyConfEmail = new \Public\Models\helper\crud\PublicRead();
            $viewKeyConfEmail->fullRead("SELECT idUsuario FROM usuario WHERE confEmail =:confEmail LIMIT :limit", "confEmail={$this->key}&limit=1");

            $this->resultBd = $viewKeyConfEmail->getResult();
            if ($this->resultBd) {
                $this->updateSitUser();
            } else {
                $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
                $this->result = false;
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
            $this->result = false;
        }
    }

    /**
     * Método responsável em atualizar a situação do usuário.
     *
     * @return void
     */
    private function updateSitUser(): void
    {
        $confEmail = "";
        $adms_user_sits = (int) 1;

        $this->data = array(
            'confEmail' => $confEmail,
            'adms_user_sits' => $adms_user_sits
        );

        $updateSitUser = new \Public\Models\helper\crud\PublicUpdate();
        $updateSitUser->executeUpdate("usuario", $this->data, "WHERE idUsuario=:idUsuario", "idUsuario={$this->resultBd[0]['idUsuario']}");
        
        if ($updateSitUser->getResult()) {
            $_SESSION['msg'] = "<p style='color: green'>E-mail ativado com sucesso!</p>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Link inválido!</p>";
            $this->result = false;
        }
    }
}
