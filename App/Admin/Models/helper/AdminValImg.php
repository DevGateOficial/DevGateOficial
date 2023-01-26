<?php

namespace Admin\Models\helper;

/**
 * Classe responsável em validar a imagem do curso.
 * Valida se a imagem enviada está em uma extensão válida.
 */
class AdminValImg
{
    /** @var string $mimeType Recebe o mimeType da imagem*/
    private string $mimeType;

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

    // 

    /**
     * Valida a extensão da imagem.
     * Recebe a extensão da imagem a ser validada.
     * Retorna TRUE quando a extensão é válida.
     * Retorna FALSE quando a extensão é inválida.
     *
     * @param string $mimeType Recebe o tipo da imagem que deve ser validada.
     * @return void
     */
    public function validadeImg(string $mimeType): void
    {
        $this->mimeType = $mimeType;
        var_dump($this->mimeType);

        switch ($this->mimeType) {
            case 'image/jpeg':
            case 'image/pjpeg':
                $this->result = true;
                break;

            case 'image/png':
            case 'image/x-png':
                $this->result = true;
                break;

            default:
                $_SESSION['msg'] = "<p style='color: red;'> Erro: Necessário selecionar uma imagem PNG ou JPEG!</p>";
                $this->result = false;
        }
    }
}
