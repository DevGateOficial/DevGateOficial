<?php

namespace Public\Models;

class PublicCadastroUser
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    /** @var string $fromEmail Recebe o e-mail do remetente*/
    private string $fromEmail;

    /** @var string $firstName Recebe o primeiro nome do usuário*/
    private string $firstName;

    /** @var string $url Recebe a URL única de confirmação de e-mail */
    private string $url;

    /** @var array $emailData Recebe os dados do e-mail*/
    private array $emailData;

    /**
     * Retorna o resultado da validação, caso ocorra com sucesso, retorna true
     *
     * @return bool
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * 
     *
     * @param array|null $data
     * @return void
     */
    public function create(array $data = null)
    {
        $this->data = $data;

        $valEmptyField = new \Public\Models\helper\val\PublicValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->valInput();
        } else {
            $this->result = false;
        }
    }

    /**
     * Valida o email e senha do usuário. 
     * Verifica se o email é válido e se já existe no banco de dados.
     * Verifica se o nome de usuário ja existe no banco de dados.
     *
     * @return void
     */
    private function valInput(): void
    {
        //Instancia o método de verificação das informações do  usuário
        $valUserCad = new \Public\Models\helper\val\PublicValUser();

        //Valida se o forma do email é válido
        $valUserCad->validadeEmail($this->data['email']);

        //Validação do email e do nome de usuário
        $valUserCad->validadeUser($this->data['nomeUsuario'], $this->data['email']);

        //Validação da senha
        $valPassword = new \Public\Models\helper\val\PublicValPassword();
        $valPassword->validatePass($this->data['senha']);
        if (($valUserCad->getResultEmail()) and ($valUserCad->getResultUser()) and ($valPassword->getResult())) {
            $this->add();
        } else {
            $this->result = false;
        }
    }

    /**
     * Responsável pela criação do usuário 
     *
     * @return void
     */
    private function add(): void
    {
        $this->data['senha'] = password_hash($this->data['senha'], PASSWORD_DEFAULT);
        $this->data['confEmail'] = password_hash($this->data['senha'] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
        $this->data['imagem'] = 'profileImg' . rand(1,3) . ".png";
        
        $cadastrarUser = new \Public\Models\helper\crud\PublicCreate();
        $cadastrarUser->executeCreate("usuario", $this->data);

        var_dump($this->data, $cadastrarUser->getResult());

        if ($cadastrarUser->getResult()) {
            $this->sendEmail();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não cadastrado!</p>";
            $this->result = false;
        }
    }

    /**
     * Responsável pelo envio do e-mail de confirmação
     * Recebe as informações do e-mail do remetente
     * 
     * @return void
     */
    private function sendEmail(): void
    {
        $this->contentEmailHtml();
        $this->contentEmailText();

        $sendEmail = new \Public\Models\helper\email\PublicSendEmail();
        $sendEmail->sendEmail($this->emailData, 1);

        if ($sendEmail->getResult()) {
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso! Acesse a sua caixa de e-mail para confirmar o e-mail!</p>";
            $this->result = true;
        } else {
            $this->fromEmail = $sendEmail->getFromEmail();
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso. Houve erro ao enviar o e-mail de confirmação, entre em contato
                                                        com {$this->fromEmail} para mais informações!</p>";
            $this->result = false;
        }
    }

    /**
     * Define o conteúdo do e-mail a ser enviado 
     * Formato HMTL
     * @return void
     */
    private function contentEmailHtml(): void
    {
        $name = explode(" ", $this->data['nomeUsuario']);
        $this->firstName = $name[0];

        $this->emailData['toEmail'] = $this->data['email'];
        $this->emailData['toName'] = $this->data['nomeCompleto'];
        $this->emailData['subject'] = "Confirmar sua conta";
        $this->url = URL . "conf-email/index?key=" . $this->data['confEmail'];

        $this->emailData['contentHtml'] = "Prezado(a) {$this->firstName}<br><br>";
        $this->emailData['contentHtml'] .= "Clique no link a baixo para confirmar seu e-mail:<br><br>";
        $this->emailData['contentHtml'] .= "<a href='{$this->url}'>Clique aqui<br><br></a>";
    }

    /**
    * Define o conteúdo do e-mail a ser enviado 
    * Formato TXT
    * @return void
    */
    private function contentEmailText(): void
    {
        $url = URL . "conf-email/index?key=" . $this->data['confEmail'];
        $this->emailData['contentText'] = "Prezado(a) {$this->firstName}\n\n";
        $this->emailData['contentText'] .= "Clique no link a baixo para confirmar seu e-mail:\n\n";
        $this->emailData['contentText'] .= $this->url . "\n\n";
    }
}
