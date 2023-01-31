<?php

namespace Admin\Models;

/**
 * Classe responsável na edição de cursos do banco de dados
 */
class AdminEditCursos
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

    public function viewCurso(int $id): void
    {
        $this->id = $id;

        $viewCurso = new \Admin\Models\helper\crud\AdminRead();
        $viewCurso->fullRead("SELECT *
                                FROM curso
                                WHERE idCurso =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Curso não encontrado!</p>";
            $this->result = false;
        }
    }

    public function update(array $data = null): void
    {
        $this->data = $data;

        if(isset($this->data['imagem'])){
            $this->fileInfo = $this->data['imagem'];
            $slug =  new \Admin\Models\helper\AdminSlug();
            $this->data['imagem'] = $slug->slug($this->data['imagem']['name']);
        }

        $valEmptyField = new \Admin\Models\helper\AdminValEmptyField();
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
     *
     * @return void
     */
    private function valInput(): void
    {
        $valCurso = new \Admin\Models\helper\AdminValCurso();
        $valCurso->validadeCurso($this->data['nomeCurso'], true, $this->data['idCurso']);

        if ($valCurso->getResult()) {
            $this->edit();
        } else {
            $this->result = false;
        }
    }

    private function edit(): void
    {
        $updateCurso = new \Admin\Models\helper\crud\AdminUpdate();
        $updateCurso->executeUpdate("curso", $this->data, "WHERE idCurso=:idCurso", "idCurso={$this->data['idCurso']}");

        if ($updateCurso->getResult()) {
            $_SESSION['msg'] = "<p style='color: green;'> Curso atualizado com sucesso! </p>";

            if(isset($this->data['imagem'])){
                $this->uploadFile();
            } else {
                $this->result = true;
            }
            
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível atualizar o curso!</p>";
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
        $this->fileName = $this->data['imagem'];
        $this->tmpName = $this->fileInfo['tmp_name'];
        $this->directory = 'app/assets/data/cursos/' . $this->data['idCurso'] . '/';

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
