<?php

namespace Public\Models\helper\val;

/**
 * Classe genérica para validar senha
 */

class PublicValPassword
{
    /** @var string $password Recebe a senha que deve ser validada */
    private string $password;

    /** @var bool $result Recebe true quando executar o processo com sucesso e false quando houver erro*/
    private bool $result;

    /** 
     * @return bool Retorna true quando executar o processo com sucesso e false quando houver erro
     *
    */
    function getResult(): bool
    {
        return $this->result;
    }

    public function validatePass(string $password): void
    {
        $this->password = $password;

        if(stristr($this->password, "'")){
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Caracter( ' ) utilizado na senha inválido!</p>";
            $this->result = false;
        }else{
            if(stristr($this->password, " ")){
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Não utilizar espaço em branco no campo senha!</p>";
                $this->result = false;
            }else{
                $this->valExtensPassword();
            }
        }
    }

    private function valExtensPassword(): void
    {
        if(strlen($this->password) < 8){
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: A Senha deve ter no mínimo 8 caracteres!</p>";
                $this->result = false;
        }else{
            $this->valValuePassword();
        }
    }

    private function valValuePassword(): void
    {
        if(preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-z0-9-@#$%;*]{8,}$/', $this->password)){
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: A Senha deve ter letras e números!</p>";
                $this->result = false;
        }
    }
}
