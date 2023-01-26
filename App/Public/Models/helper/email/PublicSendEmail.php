<?php

namespace Public\Models\helper\email;

use LDAP\Result;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Classe responsável em enviar o email para usuário.
 * 
 *
 */
class PublicSendEmail
{
    /** @var array $data Receber as informações do conteúdo do e-mail */
    private array $data;

    /** @var array $dataInfoEmail Recebe as credenciais do e-mail */
    private array $dataInfoEmail;

    /** @var array|null $resultBd Recebe os registros do banco de dados */
    private array|null $resultBd;

    /** @var bool $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /** @var string $fromEmail Recebe o e-mail do remetente */
    private string $fromEmail = EMAILADM;

    /** @var int $optionConfEmail Recebe o id do e-mail */
    private int $optionConfEmail;
    
    /**
     * Retorna o resultado da validação, caso ocorra com sucesso, retorna true
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * @return string Retorna o e-mail do remetente
     */
    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    /**
     * Undocumented function
     *
     * @param array $data
     * @param integer $optionConfEmail
     * @return void
     */
    public function sendEmail(array $data, int $optionConfEmail): void
    {
        $this->optionConfEmail = $optionConfEmail;
        $this->data = $data;

        $this->infoPHPMailer();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function infoPHPMailer(): void
    {
        $confEmail = new \Public\Models\helper\crud\PublicRead();
        $confEmail->fullRead("SELECT name, email, host, username, password, smtpsecure, port FROM 
                            adms_email WHERE idEmail=:id LIMIT :limit", "id={$this->optionConfEmail}&limit=1");
        $this->resultBd = $confEmail->getResult();
        
        if($this->resultBd){ 
            $this->dataInfoEmail['host'] = $this->resultBd[0]['host'];
            $this->dataInfoEmail['fromEmail'] = $this->resultBd[0]['email'];
            $this->fromEmail = $this->dataInfoEmail['fromEmail'];
            $this->dataInfoEmail['fromName'] = $this->resultBd[0]['name'];
            $this->dataInfoEmail['username'] = $this->resultBd[0]['username'];
            $this->dataInfoEmail['password'] = $this->resultBd[0]['password'];
            $this->dataInfoEmail['smtpsecure'] = $this->resultBd[0]['smtpsecure'];
            $this->dataInfoEmail['port'] = $this->resultBd[0]['port'];
            
            $this->sendEmailPhpMailer();
        }else{
            $this->result = false;
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function sendEmailPhpMailer(): void
    {
        $mail = new PHPMailer(true);
        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host       = $this->dataInfoEmail['host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $this->dataInfoEmail['username'];
            $mail->Password   = $this->dataInfoEmail['password'];
            $mail->SMTPSecure = $this->dataInfoEmail['smtpsecure'];
            $mail->Port       = $this->dataInfoEmail['port'];

            $mail->setFrom($this->dataInfoEmail['fromEmail'], $this->dataInfoEmail['fromName']);
            $mail->addAddress($this->data['toEmail'], $this->data['toName']);

            $mail->isHTML(true);                                
            $mail->Subject = $this->data['subject'];
            $mail->Body    = $this->data['contentHtml'];
            $mail->AltBody =  $this->data['contentText'];

            $mail->send();
            $this->result = true;
        } catch (Exception $e) {
            $this->result = false;
        }
    }
}
