<?php

namespace Public\Models\helper\val;

/**
 * Classe genérica responsável em verificar se todos os campos do formulário foram preenchidos
 */
class PublicValEmptyField
{
    /** @var array $data Recebe os dados do formulário que devem ser conferidos
    */
    private array|null $data;

    /** @var bool $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /**
     * Retorna o resultado da validação, caso ocorra com sucesso, retorna true
     *
     * @return boolean
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Recebe os campos do formulário e seus respectivos dados, e confere se todos os campos estão preenchidos.
     * Caso estejam, retorna true.
     * Caso algum campo não esteja preenchido, atribui uma mensagem de erro e retorna false.
     * 
     * @return void
     */
    public function valField(array $data = null): void
    {
        $this->data = $data;
        $this->data = array_map('strip_tags', $this->data);
        $this->data = array_map('trim', $this->data);

        if (in_array('', $this->data)) {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Necessário preencher todos os campos! </p>";
            $this->result = false;
        } else {
            $this->result = true;
        }
    }
}
