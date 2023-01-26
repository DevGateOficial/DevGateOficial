<?php

namespace Public\Models;

/**
 * Solicitar novo link para cadastrar nova senha
 * 
 */
class PublicRecoverPass
{
    /** @var array|null $data Recebe as informações do formulário */
    private array|null $data;

    /** @var bool $result Recebe true quando executar o processo com sucesso e false quando houver erro */
    private bool $result;

    /** @var array|null $resultBd Recebe os registros do banco de dados */
    private array|null $resultBd;

    /** @var string $firstName */
    private string $firstName;

    /** @var array $emailData */
    private array $emailData;

    /** @var string $fromEmail */
    private string $fromEmail;

    /** @var array $dataSave */
    private array $dataSave;

    /**
     * @var string
     */
    private string $url;

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * 
     * @return void
     */

    public function recoverPass(array $data = null): void
    {
        $this->data = $data;
        $valEmptyField = new \Public\Models\helper\val\PublicValEmptyField();
        $valEmptyField->valField($this->data);
        if($valEmptyField->getResult()){
            $this->valUser();
        }else{
            $this->result = false;
        }
    }

    private function valUser(): void
    {
        $newConfEmail = new \Public\Models\helper\crud\PublicRead();
        $newConfEmail->fullRead("SELECT idUsuario, nomeUsuario, email FROM usuario WHERE email=:email LIMIT :limit", "email={$this->data['email']}&limit=1");
        
        $this->resultBd = $newConfEmail->getResult();
        if($this->resultBd){
            $this->valConfEmail();
        }else{
            $_SESSION['msg'] = "<p style='color: #f00;'> Erro: E-mail não cadastro! </p>";
            $this->result = false;
        }
    }

    private function valConfEmail(): void
    {
        $this->dataSave['recoverPass'] = password_hash(date("Y-m-d H:i:s") . $this->resultBd[0]['idUsuario'], PASSWORD_DEFAULT);
        
        $upNewConfEmail = new \Public\Models\helper\crud\PublicUpdate();
        $upNewConfEmail->executeUpdate("usuario", $this->dataSave, "WHERE idUsuario=:idUsuario", "idUsuario={$this->resultBd[0]['idUsuario']}");
        if($upNewConfEmail->getResult()){
            $this->resultBd[0]['recoverPass'] = $this->dataSave['recoverPass'];
            $this->sendEmail();
        }else{
            $_SESSION['msg'] = "<p style='color: #f00;'> Erro: Link não enviado, tente novamente! </p>";
            $this->result = false;
        }
    }

    private function sendEmail(): void
    {
        $sendEmail = new \Public\Models\helper\email\PublicSendEmail();
        $this->emailHTML();
        $this->emailText();
        $sendEmail->sendEmail($this->emailData, 2);

        if($sendEmail->getResult()){
            $_SESSION['msg'] = "<p style='color: green;'>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>";
            $this->result = true;
        }else{
            $this->fromEmail = $sendEmail->getFromEmail();
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Link não enviado, tente novamente ou entre em contato com o e-mail{$this->fromEmail}!</p>";
            $this->result = false; 
        }

    }

    private function emailHTML(): void
    {
        $name = $this->resultBd[0]['nomeUsuario'];
        $this->firstName = $name;

    
        $this->emailData['toEmail'] = $this->resultBd[0]['email'];
        $this->emailData['toName'] = $this->resultBd[0]['nomeUsuario'];
        $this->emailData['subject'] = "Recuperar senha";
        $this->url = URL . "update-pass/index?key=" . $this->resultBd[0]['recoverPass'];
        
        $this->emailData['contentHtml'] = "Prezado(a) {$this->firstName}<br><br>" ;
        $this->emailData['contentHtml'] .= "Clique no link a baixo para fazer a recuperação de senha:<br><br>";
        $this->emailData['contentHtml'] .= "<a href='{$this->url}'>Clique aqui<br><br></a>";
    }

    private function emailText(): void
    {
        $url = URL . "conf-email/index?key=" . $this->resultBd[0]['recoverPass'];
        $this->emailData['contentText'] = "Prezado(a) {$this->firstName}\n\n" ;
        $this->emailData['contentText'] .= "Clique no link a baixo para fazer a recuperação de senha:\n\n";
        $this->emailData['contentText'] .= $this->url . "\n\n";
    }

}