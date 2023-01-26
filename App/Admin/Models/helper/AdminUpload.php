<?php

namespace Admin\Models\helper;

/**
 * Classe genérica para upload de arquivos
 */
class AdminUpload
{
    /** @var string $result Retorna o resultado da validação, caso ocorra com sucesso, retorna true*/
    private bool $result;

    /** @var string $directory Recebe o diretódio onde o arquivo deve ser inserido*/
    private string $directory;

    /** @var string $tmpName Recebe o local temporário do arquivo*/
    private string $tmpName;

    /** @var string $name Recebe o nome do arquivo*/
    private string $name;

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
     * Recebe as informações para executar o upload dos arquivos.
     * Confere se o diretório informado é valido, caso seja, instancia o método de upload.
     * Caso seja inválido, retorna false.
     *
     * @param string $directory
     * @param string $tmpName
     * @param string $name
     * @return void
     */
    public function upload(string $directory, string $tmpName, string $name): void
    {
        $this->directory = $directory;
        $this->tmpName = $tmpName;
        $this->name = $name;

        if ($this->valDirectory()) {
            $this->uploadFile();
        } else {
            $this->result = false;
        }
    }

    /**
     * Verifica se o diretório passado é válido.
     * Caso seja, executa a sua criação;
     * Caso contrario, retorna false.
     *
     * @return boolean
     */
    private function valDirectory(): bool
    {
        if ((!file_exists($this->directory)) and (!is_dir($this->directory))) {
            mkdir($this->directory, 0755);

            if ((!file_exists($this->directory)) and (!is_dir($this->directory))) {
                $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível realizar o upload do arquivo!</p>";
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    /**
     * Realiza o upload do arquivo para o seu diretório.
     * Caso encontre algum erro, retorna false e uma mensagem de erro.
     *
     * @return void
     */
    private function uploadFile(): void
    {
        if (move_uploaded_file($this->tmpName, $this->directory . $this->name)) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível realizar o upload do arquivo!</p>";
            $this->result = false;
        }
    }
}
