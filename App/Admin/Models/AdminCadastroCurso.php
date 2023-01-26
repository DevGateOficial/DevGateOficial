<?php

namespace Admin\Models;

/**
 * Classe responsável no cadastro de cursos no banco de dados
 */
class AdminCadastroCurso
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result;

    /** @var int|string|null $idCurso Recebe o id do curso*/
    private array|string|null $idCurso;

    /** @var array|null $fileInfo Recebe o array de informações sobre o arquivo da atividade*/
    private array|null $fileInfo;

    /** @var array|null $directory Recebe o caminho do diretório que o arquivo deve ser salvo*/
    private string|null $directory;

    /** @var array|null $fileName Recebe o nome do arquivo da atividade*/
    private string|null $fileName;

    /** @var array|null $tmpName Recebe o caminho temporário de onde o arquivo está localizado*/
    private string|null $tmpName;

    /**
     * Retorna a situação do cadastro para quem o instanciar.
     * Caso execute com sucesso retorna true, caso de algum problema, retorna false
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Recebe os dados da controller e instancia os métodos de verificação dos dados.
     *
     * @param array|null $data
     * @return void
     */
    public function create(array $data = null): void
    {
        $this->data = $data;

        $this->fileInfo = $this->data['imagem'];
        $slug =  new \Admin\Models\helper\AdminSlug();
        $this->data['imagem'] = $slug->slug($this->data['imagem']['name']);


        $valEmptyField = new \Admin\Models\helper\AdminValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            $this->validateInput();
        } else {
            $this->result = false;
        }
    }

    /**
     * Instancia os Models responsáveis em verificar o nomeCurso e idResponsável do curso a ser cadastrado.
     *
     * @return void
     */
    private function validateInput(): void
    {
        $validadeCurso = new \Admin\Models\helper\AdminValCurso();
        $validadeCurso->validadeCurso($this->data['nomeCurso']);

        if ($validadeCurso->getResult()) {
            $this->add();
        } else {
            $this->result = false;
        }
    }

    /**
     * Instancia o método genérico de criação de registros no banco de dados, passandos os dados referentes ao curso a ser cadastrado.
     * Caso execute com sucesso, atrubiu uma mensagem de sucesso e retorna true.
     * Caso a execução encontre algum erro, atribui uma mensagem de errro e retorna false.
     *
     * @return void
     */
    private function add(): void
    {
        var_dump($this->data);
        var_dump($this->fileInfo);

        $cadastrarCurso = new \Admin\Models\helper\crud\AdminCreate();
        $cadastrarCurso->executeCreate("curso", $this->data);

        if ($cadastrarCurso->getResult()) {
            $this->idCurso = $cadastrarCurso->getResult();
            $this->uploadFile();
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Curso não cadastrado!</p>";
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
        $this->directory ='app/assets/data/cursos/' . $this->idCurso . '/';

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