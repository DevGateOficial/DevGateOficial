<?php

namespace Admin\Models;

class AdminEditAtividade
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var array|null $fileInfo Recebe o array de informações sobre o arquivo da atividade*/
    private array|null $fileInfo;

    /** @var array|null $directory Recebe o caminho do diretório que o arquivo deve ser salvo*/
    private string|null $directory;

    /** @var array|null $fileName Recebe o nome do arquivo da atividade*/
    private string|null $fileName;

    /** @var array|null $tmpName Recebe o caminho temporário de onde o arquivo está localizado*/
    private string|null $tmpName;

    /**
     * Retorna true qwuando executar o processo com sucesso, retorna false quando ocorrer algum erro
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Retorna os registro do banco de dados
     *
     * @return array|null
     */
    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    public function viewAtividade(int $id): void
    {
        $this->id = $id;

        $viewAtividade = new \Admin\Models\helper\crud\AdminRead();
        $viewAtividade->fullRead("SELECT *
                                FROM atividade
                                WHERE idAtividade =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewAtividade->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $this->result = false;
        }
    }

    public function update(array $data = null): void
    {
        $this->data = $data;

        if($this->data['tipoAtividade'] != 'videoAula'){
            $this->fileInfo = $this->data['url'];
            $slug =  new \Admin\Models\helper\AdminSlug();
            $this->data['url'] = $slug->slug($this->data['url']['name']);
        }

        $valEmptyField = new \Admin\Models\helper\AdminValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->edit();
        } else {
            $this->result = false;
        }
    }

    private function edit(): void
    {
        $updateCurso = new \Admin\Models\helper\crud\AdminUpdate();
        $updateCurso->executeUpdate("atividade", $this->data, "WHERE idAtividade=:idAtividade", "idAtividade={$this->data['idAtividade']}");

        if ($updateCurso->getResult()) {
            $_SESSION['msg'] = "<p style='color: green;'> Atividade atualizada com sucesso! </p>";
            $this->data != 'videoAula' ? $this->uploadFile() : $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível atualizar a atividade!</p>";
            $this->result = false;
        }
    }

    /**
     * Instancia a classe genérica responsável em fazer upload de arquivos.
     * Verifica se o upload ocorreu corrtamente:
     * caso sim, retorna true;
     * caso contrário, instancia a função responsável em deletar as informações da atividade do sistema.
     *
     * @return void
     */
    private function uploadFile(): void
    {
        $this->fileName = $this->data['url'];
        $this->tmpName = $this->fileInfo['tmp_name'];
        $this->directory = 'app/assets/data/atividades/' . $this->data['idAtividade'] . '/';

        var_dump($this->directory);

        $uploadFile = new \Admin\Models\helper\AdminUpload();
        $uploadFile->upload($this->directory, $this->tmpName, $this->fileName);

        if ($uploadFile->getResult()) {
            $_SESSION['msg'] = "<p style='color: #green;'>Curso cadastrado com sucesso!</p>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #red;'>Erro: Ocorreu um erro no upload do arquivo!</p>";
            $this->result = false;
        }
    }
}